/*
$(document).ready(function() {
  var floatPos = parseInt($(".sideMenu").css('top'));   // 배너 기본 위치(top)값 (숫자만)
  // scroll 인식
  $(window).scroll(function() {
    var currentTop = $(this).scrollTop();
    var bannerTop = currentTop + floatPos + "px";
    // 이동 애니메이션
    $(".sideMenu").stop().animate({
      "top" : bannerTop
    }, 600);
    // 애니메이션 없이
//    		 $(".sideMenu").css('top', floatPos);
  }).scroll();
});
*/
$(window).scroll(function() {
  if ($(this).scrollTop() > 500) {
    $('.btn-top').fadeIn();
  } else {
    $('.btn-top').fadeOut();
  }
});

window.onscroll = function() {progressBar()};

function progressBar() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("progress-bar-id").style.width = scrolled + "%";
}

/*
const top = 1000;
const speed = 500;

$('html, body').animate({
      scrollTop: top
   }, speed);
const btn = document.querySelectorAll('.button>li>a');
const target = document.querySelector('.a1');
const target_top = target.getBoundingClientRect().height;

btn.forEach(_btn =>{
  _btn.addEventListener('click', (e)=>{
    e.preventDefault();

    const num = _btn.innerText;

    $('html, body').animate({
          scrollTop: ((num-1)*target_top)
        }, 400);
  })
})*/
