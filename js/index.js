// アコーディオン
// 初期状態ですべてのアコーディオン内容を非表示にする
$('.aco-block .a').hide();
$('.aco-block .vertical-dots').hide();
$('.aco-block.open .a').show();
$('.aco-block.open .vertical-dots').show();
$('.aco-block.open .q-down').addClass('close');

// ▼ 下に出すアコーディオン（従来：.q）
$('.q-down').on('click', function () {
  const $thisBlock = $(this).closest('.aco-block');
  const $content = $thisBlock.find('.a');
  const $dots = $thisBlock.find('.vertical-dots');

  if ($thisBlock.hasClass('open')) {
    $content.slideUp();
    $dots.slideUp();
    $(this).removeClass('close');
    $thisBlock.removeClass('open');
  } else {
    $content.slideDown();
    $dots.slideDown();
    $(this).addClass('close');
    $thisBlock.addClass('open');
  }
});

// ▼ 上に出すアコーディオン（新スタイル：.q2）
$('.q-up').on('click', function () {
  var findElm = $(this).prev('.a'); // 直前の要素を取得（上に出す）
  $(findElm).slideToggle();         // アコーディオンの開閉

  $(this).toggleClass('close');     // closeクラスをトグル
});


// タブ切り替え

$(function() {
  let tabs = $(".tab"); // tabのクラスを全て取得し、変数tabsに配列で定義
  $(".tab").on("click", function() { // tabをクリックしたらイベント発火
    $(".tab-active").removeClass("tab-active"); // activeクラスを消す
    $(this).addClass("tab-active"); // クリックした箇所にactiveクラスを追加
    const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
    $(".tab-content-item").removeClass("tab-show").eq(index).addClass("tab-show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
  })
})


// classをフックにしたポップアップ

$(document).ready( function(){
  // ページ下部固定ボタン表示非表示
      $(window).on('load resize',function(){
          btnOffset = $('.btn-appear').offset().top;
          winH = $(window).height();
      });
      $(function() {
          var fixedbtn = $('.fixed__btn');
          fixedbtn.hide();
          $(window).scroll(function () {
            if ($(this).scrollTop() > btnOffset - winH) {
              fixedbtn.fadeIn();
            } else {
              fixedbtn.fadeOut();
            }
          });
        });
      });


      jQuery(function($){
        $('.open-image-modal').on('click', function(e){
          e.preventDefault();
          const imageUrl = $(this).data('image');
          $('#modalSupporterImg').attr('src', imageUrl);
          $('#supporterImageModal').fadeIn();
        });
      
        $('#supporterImageModal .video-close, #supporterImageModal .video-modal-bg').on('click', function(){
          $('#supporterImageModal').fadeOut(function(){
            $('#modalSupporterImg').attr('src', ''); // 非表示になった後にリセット！
          });
        });
      });
