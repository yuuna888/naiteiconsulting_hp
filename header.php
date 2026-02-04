<?php wp_head(); ?>
<header>
<div class="menu-basis">
    <div class="pc-header">
      <div style="display: flex; align-items: center; justify-content: space-between;">
    
        <div class="logo">
          <a href="<?php echo esc_url( get_site_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/logo.png" alt="FindUP" /></a>
        </div>
    
        <nav style="display: flex; gap: 15px; align-items: center;">
        <ul>
          <li><a href="<?php echo esc_url( get_site_url().'/job-offer-consulting' ); ?>">内定コンサルとは</a></li>
          <div class="line"></div>
          <li>
            <a href="<?php echo esc_url( get_site_url().'/support-details' ); ?>">サポート詳細</a>
          </li>
          <div class="line"></div>

          <?php if ( false ) : ?>
            <li>
            <a href="<?php echo esc_url( home_url('/course') ); ?>">コース紹介</a>
          </li>
          <div class="line"></div>
          <?php endif; ?>

          <li>
          <a href="<?php echo esc_url( get_site_url().'/supporter' ); ?>">サポーター紹介</a>
          </li>
          <div class="line"></div>
          <li>
            <a href="<?php echo esc_url( get_site_url().'/achievements' ); ?>">内定体験談</a>
          </li>
          <li class="custom-button-forparents">
            <a href="<?php echo esc_url( get_site_url().'/for-parents' ); ?>" class="custom-button">
              <span class="button-inner">保護者の方へ</span>
            </a>
          </li>
          <li class="custom-button-explanation">
            <a href="<?php echo esc_url( get_site_url().'/counseling' ); ?>" class="custom-button">
              <span class="button-inner">無料相談</span>
            </a>
          </li>
        </ul>
        </nav>
      </div>
    </div>

    <div class="sp-header">
      <div class="logo">
      <a href="<?php echo esc_url( get_site_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/logo.png" alt="FindUP" /></a>
      </div>
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <nav class="menu">
      <ul>
        <li><a href="<?php echo esc_url( get_site_url().'/job-offer-consulting' ); ?>">内定コンサルとは</a></li>
        <li><a href="<?php echo esc_url( get_site_url().'/support-details' ); ?>">サポート詳細</a></li>

        <?php if ( false ) : ?>
          <li><a href="<?php echo esc_url( get_site_url().'/course' ); ?>">コース紹介</a></li>
        <?php endif; ?>

        <li><a href="<?php echo esc_url( get_site_url().'/supporter' ); ?>">サポーター紹介</a></li>
        <li><a href="<?php echo esc_url( get_site_url().'/achievements' ); ?>">内定体験談</a></li>
      </ul>
      <div style="display: flex; margin-top: 50px; align-self: start;">
        <div class="custom-button-explanation">
          <a href="<?php echo esc_url( get_site_url().'/counseling' ); ?>" class="custom-button">
            <span class="button-inner">無料相談</span>
          </a>
        </div>
        <div class="custom-button-forparents">
          <a href="<?php echo esc_url( get_site_url().'/for-parents' ); ?>" class="custom-button">
            <span class="button-inner">保護者の方へ</span>
          </a>
        </div>
      </div>
    </nav>
  </div>

    <?php if(!is_front_page()): ?>
        <?php if ( function_exists( 'bcn_display' ) ) : ?>
            <nav class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/" aria-label="現在のページ">
                    <?php bcn_display(); ?>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</header>