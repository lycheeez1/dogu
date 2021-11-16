
// 팝업 버튼 클릭 이벤트
$(document).ready(function(){
  $("body").smoothWheel()
  // 전체 메뉴 버튼 클릭 이벤트
  $(".gnb-btn").click(function(){
    $(".sideMenu").hide();
    var w = $(window).width();
    var h = $(window).height();
    $(".blurbg").width(w);
    $(".blurbg").height(h);
    $(".blurbg").fadeTo(200, 0.3);
    $(".popup-win").stop().fadeIn(100);
    if (w > 559) {
      $("body").css("margin-right", "18px");
    }
    $("body").css("overflow", "hidden");  // 스크롤 방지
  });
  // 닫기 버튼 클릭 이벤트
  $(".popup-exit").click(function(){
    var w = $(window).width();
    if (w > 559) {
      $("body").css("margin-right", "0");
    }
    $("body").css("overflow", "auto");
    $(".popup-win").fadeOut(200);
    $(".blurbg").fadeOut(300);
  });
});
// 윈도우 리사이징 시
$(window).resize(function(){
  var w = $(window).width();
  var h = $(window).height();
  $(".blurbg").width(w).height(h);
});
