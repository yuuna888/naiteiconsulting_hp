<?php
// WordPressの関数を使えるようにする
require_once('../../../../wp-load.php');

// セッション開始（レート制限用）
if (!session_id()) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // 1. ハニーポットチェック（スパムボット対策）
  if (!empty($_POST['fax'])) {
    wp_die('不正なアクセスです。');
  }

  // 2. CSRFトークンチェック
  if (!isset($_POST['inquiry_nonce']) || !wp_verify_nonce($_POST['inquiry_nonce'], 'inquiry_form_nonce')) {
    wp_die('セキュリティチェックに失敗しました。');
  }

  // 3. reCAPTCHA v3の検証
  if (isset($_POST['recaptcha_token'])) {
    $recaptcha_secret = '6Lch_5IrAAAAAI6KkeT9j9pOxBqumopWrZMNyJcK'; // ここに秘密鍵を設定
    $recaptcha_response = $_POST['recaptcha_token'];
    
    $verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    $verify_data = array(
      'secret' => $recaptcha_secret,
      'response' => $recaptcha_response,
      'remoteip' => $_SERVER['REMOTE_ADDR']
    );
    
    // cURLを使用してSSL証明書エラーを回避
    $ch = curl_init($verify_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($verify_data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ローカル環境用：本番環境では true に設定
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ローカル環境用：本番環境では 2 に設定
    
    $verify = curl_exec($ch);
    curl_close($ch);
    
    $captcha_result = json_decode($verify);
    
    if (!$captcha_result->success || $captcha_result->score < 0.5) {
      wp_die('reCAPTCHA検証に失敗しました。');
    }
  }

  // 4. レート制限（同一IPからの連続送信防止）
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $rate_limit_key = 'inquiry_' . $ip_address;
  
  if (isset($_SESSION[$rate_limit_key])) {
    $last_submit_time = $_SESSION[$rate_limit_key];
    $current_time = time();
    
    // 5分以内の再送信を制限
    if (($current_time - $last_submit_time) < 300) {
      wp_die('送信間隔が短すぎます。5分後に再度お試しください。');
    }
  }
  
  $_SESSION[$rate_limit_key] = time();

  // 入力値の取得とサニタイズ
  $name = sanitize_text_field($_POST["name"]);
  $furigana = sanitize_text_field($_POST["furigana"]);
  $email = sanitize_email($_POST["email"]);
  $tel = sanitize_text_field($_POST["tel"]);
  $message = sanitize_textarea_field($_POST["message"]);

  // 5. サーバーサイドバリデーション
  $errors = array();
  
  if (empty($name)) {
    $errors[] = '氏名は必須です。';
  }
  
  if (empty($furigana)) {
    $errors[] = '振り仮名は必須です。';
  }
  
  if (empty($email) || !is_email($email)) {
    $errors[] = '有効なメールアドレスを入力してください。';
  }
  
  if (empty($message)) {
    $errors[] = 'お問い合わせ内容は必須です。';
  }
  
  // 電話番号の形式チェック（任意項目）
  if (!empty($tel) && !preg_match('/^[0-9\-]+$/', $tel)) {
    $errors[] = '電話番号は数字とハイフンのみ使用できます。';
  }
  
  if (!empty($errors)) {
    wp_die(implode('<br>', $errors));
  }

  // ▼ 管理者宛メール
  $admin_to = "findup1007@gmail.com"; // 管理者メールアドレスfindup1007@gmail.com
  $admin_subject = "【内定コンサル】お問い合わせが届きました";

  $admin_body = <<<EOD
以下の内容でお問い合わせがありました。

氏名：$name
ふりがな：$furigana
メールアドレス：$email
電話番号：$tel
お問い合わせ内容：
$message
EOD;

  $admin_headers = array(
    "Content-Type: text/plain; charset=UTF-8",
    "From: 内定コンサル <noreply@naitei-consulting.com>",
    "Reply-To: $name <$email>"
  );

  // ▼ お客様宛メール本文作成
  $auto_reply_text = "";
  $auto_reply_text .= "$name 様\n\n";
  $auto_reply_text .= "お問い合わせいただきありがとうございます。\n";
  $auto_reply_text .= "お問い合わせいただいた内容は\n";
  $auto_reply_text .= "当社で内容を確認後、３営業日以内に担当者よりご連絡させていただきます。\n";
  $auto_reply_text .= "━━━━━━━━━━━━━━━━━━━\n";
  $auto_reply_text .= "　以下の内容でメールを受け付けました\n";
  $auto_reply_text .= "━━━━━━━━━━━━━━━━━━━\n\n";
  $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n\n";
  $auto_reply_text .= "【お問い合わせ内容】\n";
  $auto_reply_text .= "氏名：$name\n";
  $auto_reply_text .= "ふりがな：$furigana\n";
  $auto_reply_text .= "メールアドレス：$email\n";
  $auto_reply_text .= "電話番号：$tel\n\n";
  $auto_reply_text .= "お問い合わせ内容：\n$message\n\n";
  $auto_reply_text .= "よろしくお願いいたします。\n\n";
  $auto_reply_text .= "内定コンサル運営事務局\n";

  $user_subject = "【内定コンサル】お問い合わせありがとうございます";
  $user_body = $auto_reply_text;
  $user_headers = array(
    "Content-Type: text/plain; charset=UTF-8",
    "From: 内定コンサル <noreply@naitei-consulting.com>",
    "Reply-To: 内定コンサル <findup1007@gmail.com>"
  );

  // メール送信
  wp_mail($admin_to, $admin_subject, $admin_body, $admin_headers);
  wp_mail($email, $user_subject, $user_body, $user_headers);




  // Google Apps ScriptのURL（取得したものに書き換えてください）
$gas_url = "https://script.google.com/macros/s/AKfycbzOAKGWB65TK_zknOhOSQtAt9GTY9xRh1nh8kDz0P52Hd5vMQHom71CvkNkZrm6AZGc6Q/exec";

// スプレッドシートに送るデータを連想配列にまとめる
$spreadsheet_data = array(
    "name" => $name,
    "furigana" => $furigana,
    "email" => $email,
    "tel" => $tel,
    "message" => $message
);

// JSONに変換
$json_data = json_encode($spreadsheet_data);

// cURLでPOST送信
$ch = curl_init($gas_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

// 実行
$response = curl_exec($ch);
curl_close($ch);


  // 完了後、サンクスページへ遷移
  wp_redirect(home_url('/thanks/'));
  exit;
}
?>