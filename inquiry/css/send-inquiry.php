<?php
// WordPressの関数を使えるようにする
require_once('../../../../wp-load.php');

// スパム対策：すべて空なら終了
if (
  empty(trim($_POST['confirm-name'])) &&
  empty(trim($_POST['confirm-furigana'])) &&
  empty(trim($_POST['confirm-email'])) &&
  empty(trim($_POST['confirm-message']))
) {
  exit; // 空送信は無視
}
if (!empty($_POST['fax'])) {
  exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // 入力値の取得とサニタイズ
  $name = sanitize_text_field($_POST["confirm-name"]);
  $furigana = sanitize_text_field($_POST["confirm-furigana"]);
  $email = sanitize_email($_POST["confirm-email"]);
  $tel = sanitize_text_field($_POST["confirm-tel"]);
  $message = sanitize_textarea_field($_POST["confirm-message"]);

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

  $admin_headers = array("Content-Type: text/plain; charset=UTF-8");

  // ▼ お客様宛メール本文作成
  $auto_reply_text = "";
  $auto_reply_text .= "$name 様\n\n";
  $auto_reply_text .= "お問い合わせいただきありがとうございます。\n";
  $auto_reply_text .= "お問い合わせいただいた内容は\n";
  $auto_reply_text .= "当社で内容を確認後、３営業日以内に担当者よりご連絡させていただきます。\n";
  $auto_reply_text .= "\n";
  $auto_reply_text .= "このメールアドレスは送信専用となっております。\n";
  $auto_reply_text .= "ご返信いただいても対応ができかねますので、あらかじめご了承ください。\n";
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
  $user_headers = array("Content-Type: text/plain; charset=UTF-8");

  // メール送信
  wp_mail($admin_to, $admin_subject, $admin_body, $admin_headers);
  wp_mail($email, $user_subject, $user_body, $user_headers);

  // 完了後、サンクスページへ遷移
  wp_redirect(home_url('/thanks/'));
  exit;
}
?>