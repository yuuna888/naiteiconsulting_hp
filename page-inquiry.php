<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T3C6XRB');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="内定コンサルに関するご相談・お問い合わせを承っております。当社サービスに関してお気付きの点がございましたらお問い合わせください。">
    <title>お問い合わせ - 【公式】内定コンサル</title>
    <meta property="og:url" content="http://naireikonsaru.local/inquiry/ ">
    <meta property="og:title" content="お問い合わせ - 【公式】内定コンサル">
    <meta property="og:image" content="https://naitei-consulting.com/wp-content/themes/naitei-consulting/img/main-visual-sp.png">
    <meta property="og:type" content="website">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon.png" type="image/png">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() ); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() ); ?>/inquiry/css/style.css">
    <!-- Google reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Lch_5IrAAAAAGeGJsNvKP9mmI69HqovlCCNKubb"></script>
    <?php wp_head(); ?>
</head>


<body>  
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3C6XRB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <main>
  <?php get_header(); ?>
      <section class="breadcrumb-nav">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?php echo esc_url( get_site_url()); ?>">ホーム</a></li>
            <li>お問い合わせ</li>
          </ol>
        </nav>
      </section>

      <section class="top-title">
        <h1>お問い合わせ</h1>
      </section>


     <section class="single-section">
      <div class="container">
        <p style="text-align: center;">サービスに関するご相談・お問い合わせを<br class="sp">下記の通り承っております。<br><br class="sp">
          当社サービスに関して<br class="sp">お気付きの点がございましたら、<br class="sp">下記までお問い合わせください。
        </p>

        <div class="blue-title">
          <h3>相談窓口</h3>
        </div>
        <div class="board">
          <div class="middle-container">
            <p style="text-align: center;">こちらのフォームに必要事項を記載の上、<br class="sp">お問い合わせください。<br><br class="sp">
              当社で内容を確認後、３営業日以内に<br class="sp">担当者よりご連絡させていただきます。
            </p>
            <form id="inquiry-form" method="post" action="<?php echo get_template_directory_uri(); ?>/inquiry/send-inquiry.php">
            <!-- ハニーポット（スパムボット対策） -->
            <input type="text" name="fax" style="display:none;" autocomplete="off">
            <!-- CSRFトークン -->
            <?php wp_nonce_field('inquiry_form_nonce', 'inquiry_nonce'); ?>
            <!-- reCAPTCHA トークン用 -->
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
            <!-- 入力画面 -->
            <div id="input-area">
              <label>氏名<span class="annotation">※必須</span></label>
              <input type="text" name="name" class="input-field" />
              <div class="error-message"></div>

              <label>振り仮名<span class="annotation">※必須</span></label>
              <input type="text" name="furigana" class="input-field" />
              <div class="error-message"></div>

              <label>メールアドレス<span class="annotation">※必須</span></label>
              <input type="email" name="email" class="input-field" />
              <div class="error-message"></div>

              <label>電話番号<span class="annotation2">任意</span></label>
              <input type="tel" name="tel" class="input-field" />
              <div class="error-message"></div>

              <label>お問い合わせ内容<span class="annotation">※必須</span></label>
              <textarea name="message" class="input-field"></textarea>
              <div class="error-message"></div>

              <div class="sub-button">
                <button type="button" id="confirm-button">内容を確認</button>
              </div>
            </div>

            <!-- 確認画面（最初は非表示） -->
            <div id="confirm-area" style="display:none;">
              <label>氏名</label>
              <input type="text" id="confirm-name" name="confirm-name" class="input-field confirm-field" readonly>

              <label>振り仮名</label>
              <input type="text" id="confirm-furigana" name="confirm-furigana" class="input-field confirm-field" readonly>

              <label>メールアドレス</label>
              <input type="email" id="confirm-email" name="confirm-email" class="input-field confirm-field" readonly>

              <label>電話番号</label>
              <input type="tel" id="confirm-tel" name="confirm-tel" class="input-field confirm-field" readonly>

              <label>お問い合わせ内容</label>
              <textarea id="confirm-message" name="confirm-message" class="input-field confirm-field" readonly></textarea>

              <div class="sub-button" style="display:flex; gap:10px;">
                <button type="button" id="edit-button">修正</button>
                <button type="submit" id="submit-button">送信</button>
              </div>
            </div>



          </form>


          </div>
        </div>
      </div>
     </section>

     <script>
           document.getElementById('confirm-button').addEventListener('click', function() {
  const form = document.getElementById('inquiry-form');
  let isValid = true;

  // 入力欄一覧
  const fields = [
    {name: 'name', required: true},
    {name: 'furigana', required: true},
    {name: 'email', required: true},
    {name: 'tel', required: false},
    {name: 'message', required: true},
  ];

  fields.forEach(field => {
    const input = form.elements[field.name];
    const errorDiv = input.nextElementSibling; // エラーメッセージdiv
    if (field.required && !input.value.trim()) {
      isValid = false;
      input.style.backgroundColor = '#fff';
      input.style.borderColor = '#0170BF';
      errorDiv.textContent = '必須項目を記入してください';
    } else {
      input.style.backgroundColor = '#EDF3FB';
      input.style.borderColor = 'transparent';
      errorDiv.textContent = '';
    }
  });

  if (!isValid) {
    return;
  }

  // 確認画面に値をセット
// 「内容を確認」ボタン押下時の処理の中で、
document.getElementById('confirm-name').value = form.elements['name'].value;
document.getElementById('confirm-furigana').value = form.elements['furigana'].value;
document.getElementById('confirm-email').value = form.elements['email'].value;
document.getElementById('confirm-tel').value = form.elements['tel'].value;
document.getElementById('confirm-message').value = form.elements['message'].value;


  // 入力エリアを非表示、確認エリアを表示
  document.getElementById('input-area').style.display = 'none';
  document.getElementById('confirm-area').style.display = 'block';
});

document.getElementById('edit-button').addEventListener('click', function() {
  document.getElementById('confirm-area').style.display = 'none';
  document.getElementById('input-area').style.display = 'block';
});

// reCAPTCHA v3の実装
document.getElementById('submit-button').addEventListener('click', function(e) {
  e.preventDefault();
  
  grecaptcha.ready(function() {
    grecaptcha.execute('6Lch_5IrAAAAAGeGJsNvKP9mmI69HqovlCCNKubb', {action: 'submit'}).then(function(token) {
      document.getElementById('recaptcha_token').value = token;
      document.getElementById('inquiry-form').submit();
    });
  });
});
     </script>
     <?php get_footer(); ?>