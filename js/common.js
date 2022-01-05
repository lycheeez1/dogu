$(document).ready(function(){
	  var w = $(window).width();
	  $("#gnb-logo-mobile").width(w/5);
	  $("#gnb-logo-mobile").css("margin-left", w/3);

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
		      $("body").css("overflow", "hidden");
		    });

	  $(".popup-exit").click(function(){
		      var w = $(window).width();
		      if (w > 559) {
			            $("body").css("margin-right", "0");
			          }
		      $("body").css("overflow", "auto");
		      $(".popup-win").fadeOut(200);
	  });

	$(window).resize(function(){
		  var w = $(window).width();
		  var h = $(window).height();
		  $(".blurbg").width(w).height(h);
	});


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
