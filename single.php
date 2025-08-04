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
            <li>
              <?php
                $title = get_the_title();
                if (mb_strlen($title) > 10) {
                  $title = mb_substr($title, 0, 10) . '…';
                }
                echo esc_html($title);
              ?>
            </li>
          </ol>
        </nav>
      </section>



     <section class="single-section">
        <div class="container">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
        <?php else: ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/img/thumbnail.png'); ?>" alt="サムネイル画像">
        <?php endif; ?>

        <div class="white-title">
          <h2><?php the_title(); ?></h2>
        </div>

        <div class="content">
          <?php the_content(); ?>
        </div>

        <a href="javascript:history.back()" class="back-button">
          BACK<span class="arrow"></span>
        </a>

        <?php endwhile; else: ?>
        <p>お探しの記事は見つかりませんでした。</p>
        <?php endif; ?>
        
        </div>
     </section>
     <?php get_footer(); ?>