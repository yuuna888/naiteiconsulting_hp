<footer>
      <div class="free-consultation-margin"></div>
      <div class="container">
        <div class="footer-flex">
          <div class="logo-sns">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/logo.png" alt="FindUP" class="logo"></a>
            <div style="display: flex; gap: 15px;">
              <a href="https://x.com/syosyaman1114" class="circle-button" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/X.png" alt="X"></a>
              <a href="https://www.instagram.com/syukatsu_1114/" class="circle-button" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/Instagram.png" alt="Instagram"></a>
              <a href="https://www.tiktok.com/@syukatsunaitei" class="circle-button" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/TikTok.png" alt="TikTok"></a>
            </div>
          </div>
          <div class="footer-button">

            <div class="custom-button-explanation">
              <p>無料の就活相談はこちら</p>
              <a href="<?php echo esc_url( get_site_url().'/counseling' ); ?>" class="custom-button">
                <span class="button-inner">無料相談</span>
              </a>
            </div>
            <div class="custom-button-forparents">
              <p>保護者の方はこちら</p>
              <a href="<?php echo esc_url( get_site_url().'/for-parents' ); ?>" class="custom-button">
                <span class="button-inner">保護者の方へ</span>
              </a>
            </div>
            <div class="custom-button-inquiry">
              <p>その他のお問合せはこちら</p>
              <a href="<?php echo esc_url( get_site_url().'/inquiry' ); ?>" class="custom-button">
                <span class="button-inner">お問合せ</span>
              </a>
            </div>

          </div>
        </div>
        <div class="line"></div>
        <div class="footer-links pc">
            <a href="<?php echo esc_url( get_site_url().'/company' ); ?>">運営会社</a>
            <a href="<?php echo esc_url( get_site_url().'/news' ); ?>">新着情報</a>
            <a href="<?php echo esc_url( get_site_url().'/privacy-policy' ); ?>">プライバシーポリシー</a>
            <a href="<?php echo esc_url( get_site_url().'/legal' ); ?>">特定商取引法に基づく表示</a>
        </div>
        <div class="footer-links sp" style="margin: 10px 0 60px;">
          <a href="<?php echo esc_url( get_site_url().'/company' ); ?>">運営会社</a>
          <a href="<?php echo esc_url( get_site_url().'/news' ); ?>">新着情報</a>
          <a href="<?php echo esc_url( get_site_url().'/privacy-policy' ); ?>">プライバシー<br>ポリシー</a>
          <a href="<?php echo esc_url( get_site_url().'/legal' ); ?>">特定商取引法に<br>基づく表示</a>
        </div>
        <p>©内定コンサル.&nbsp;All&nbsp;Rights&nbsp;Reserved.</p>
      </div>
    </footer>
    </main>

    <script>
      $(function() {
        $('.hamburger').click(function() {
          $('.menu').toggleClass('open');
          $(this).toggleClass('active');
        });
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo esc_url(get_template_directory_uri() ); ?>/js/index.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri() ); ?>/js/hamburger.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri() ); ?>/js/cal.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
const swiper = new Swiper('.swiper', {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  centeredSlides: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    // 480px以下は1枚表示に切り替え
    0: {
      slidesPerView: 1,
      centeredSlides: true,
      spaceBetween: 10,
    },
    // 481px以上は3枚表示
    481: {
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 30,
    }
  }
});

    </script>
    <!-- カルーセルスクリプト -->


    <script>
  jQuery(function($){
    $('.open-video').on('click', function(e){
      e.preventDefault();
      const videoUrl = $(this).data('video') + '?autoplay=1';
      $('#youtubeFrame').attr('src', videoUrl);
      $('#videoModal').fadeIn();
    });

    $('.video-close, .video-modal-bg').on('click', function(){
      $('#youtubeFrame').attr('src', '');
      $('#videoModal').fadeOut();
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".doubt-flex-item");

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          // 遅延させて順番に表示
          setTimeout(() => {
            entry.target.classList.add("is-visible");
          }, index * 300); // 0.3秒ずつ遅らせる
          observer.unobserve(entry.target); // 一度表示したら解除
        }
      });
    }, {
      threshold: 0.3
    });

    items.forEach(item => observer.observe(item));
  });
</script>

<script>
  jQuery(function($){
    $('#openImageModal').on('click', function(e){
      e.preventDefault();
      $('#imageModal').fadeIn();
    });

    $('#imageModal .video-close, #imageModal .video-modal-bg').on('click', function(){
      $('#imageModal').fadeOut();
    });
  });
</script>
 

</body>

</html>