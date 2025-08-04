<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コーポレートサイトをリニューアルしました - 【公式】内定コンサル</title>
    <meta property="og:url" content="https://naitei-consulting.com/article/">
    <meta property="og:title" content="コーポレートサイトをリニューアルしました - 【公式】内定コンサル">
    <meta property="og:image" content="https://naitei-consulting.com/wp-content/themes/naitei-consulting/img/main-visual-sp.png">
    <meta property="og:type" content="website">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon.png" type="image/png">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() ); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() ); ?>/article/css/style.css">
    <?php wp_head(); ?>
</head>



<body>  
    <main>
    <?php get_header(); ?>
      <section class="breadcrumb-nav">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li><a href="<?php echo esc_url(get_template_directory_uri() ); ?>/index.html">ホーム</a></li>
            <!-- <li><a href="<?php echo esc_url(get_template_directory_uri() ); ?>/news/news.html">新着情報</a></li> -->
            <li>コーポレートサイトをリニューアルしました</li>
          </ol>
        </nav>
      </section>

     <section class="single-section">
      <div class="container">
        <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/thumbnail.png" alt="">
        <div class="white-title">
          <h2>コーポレートサイトを<br class="sp">リニューアルしました</h2>
        </div>
        <div class="content">
          <p>日頃より「内定コンサルティング」のホームページをご覧いただき、誠にありがとうございます。<br>
          <br>
              この度、ホームページを全面的にリニューアルいたしました。より使いやすいホームページを目指して、デザインとページの構成を見直し、新規機能を追加いたしました。<br>
              <br>
              またスマートフォンやタブレットでの表示に対応しましたので、デバイスを問わずにいつでも閲覧いただけます。<br>
              <br>
              これまで以上に、お客様に有益なサービスをお届けできるように努めて参ります。今後とも、どうぞよろしくお願い申し上げます。
            </p>
        </div>
        <a href="javascript:history.back()" class="back-button">
          BACK<span class="arrow"></span>
        </a>
      </div>
     </section>
     <?php get_footer(); ?>