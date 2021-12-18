<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();

  // 30분 후 세션 만료
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    unset($_SESSION["ADMIN"]);
//    session_unset();
//    session_destroy();
  }
  $_SESSION['LAST_ACTIVITY'] = time();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="사단법인 도구(Dogu)">
  <meta property="og:url" content="http://dogu.or.kr">
  <meta property="og:image" content="img/rsz_dogu1.png">
  <meta name="twitter:image" content="img/rsz_dogu1.png">
  <meta property="og:description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" />
  <link rel="canonical" href="http://dogu.or.kr">
  <link rel="shortcut icon" type="image/x-icon" href="img/dogu2.png">

  <title>도구(Dogu) | 사단법인 도구(Dogu)</title>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-round.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="http://fatlinesofcode.github.io/jquery.smoothwheel/src/jquery.smoothwheel.js"></script>
  <script>
    $(document).ready(function(){
      $("body").smoothWheel()
    });
  </script>
  <!--
  <script type="text/javascript" src="js/scroll.js"></script> -->
  <script type="text/javascript" src="js/click.js"></script>
</head>
<body>
  <!--
  <div class="user-gnb-wrap"> -->
    <!-- 최상단 로그인 영역 -->
    <?php
    $admin = $_SESSION['ADMIN'];
    if(isset($admin) && !empty($admin)) {
      echo '<style type="text/css">
              .btn-login {display:none;}
              .greeting {display:block;}
              .btn-logout {display:block;}
            </style>';
    } else {
      echo '<style type="text/css">
              .btn-login {display:block;}
              .greeting {display:none;}
              .btn-logout {display:none;}
            </style>';
    }
  ?>
  <div class="user-cont">
    <div class="btn-login"><a href="../authentication/login.html">로그인</a></div>
    <div class="btn-logout"><a href="../authentication/logout.php">로그아웃</a></div>
    <div class="greeting"><?=$admin;?> 계정 접속 중</div>
  </div>
    <!-- 최상단 로그인 영역 end -->
    <!-- gnb 영역 -->
    <div class="gnb-cont">
      <div class="gnb-logo">
        <a href="index.php" title="메인으로 이동"> <!--
          <img class="logo-mobile" src="img/dogu2.png" style="display:none;"> -->
          <img class="logo-pc" src="img/rsz_dogu1.png" alt="로고">
        </a>
      </div>
      <div class="gnb">
        <ul>
    			<li class="gnb-menu-d1">
            <a href="menu/intro.php">도구(Dogu)</a>
            <ul class="gnb-menu-d2 01" id="gnb-menu-d2-dogu">
              <li><a href="menu/intro.php">인사말</a></li>
              <li><a href="menu/intro.php#anc-dogu-02">연혁</a></li>
              <li><a href="menu/intro.php#anc-dogu-03">함께하는 사람들</a></li>
              <li><a href="menu/intro.php#anc-dogu-04">오시는 길</a></li>
            </ul>
          </li>
    			<li class="gnb-menu-d1">
            <a href="menu/business.php">사업안내</a>
            <ul class="gnb-menu-d2 02" id="gnb-menu-d2-biz">
              <li><a href="menu/business.php">교육</a></li>
              <li><a href="menu/business.php#anc-business-02">문화예술</a></li>
              <li><a href="menu/business.php#anc-business-03">심리정서</a></li>
            </ul>
          </li>
    			<li class="gnb-menu-d1">
            <a href="menu/noticeList.php">소식</a>
            <ul class="gnb-menu-d2 03" id="gnb-menu-d2-notice">
              <li><a href="menu/noticeList.php">공지사항</a></li>
            </ul>
          </li>
    		</ul>
      </div>
      <div class="gnb-btn-box">
        <a href="#whole-menu" title="전체 메뉴 보기">
          <div class="gnb-btn">
            <div class="gnb-btn-line"></div>
            <div class="gnb-btn-line"></div>
            <div class="gnb-btn-line"></div>
          </div>
        </a>
      </div>
  	</div>
    <!-- gnb 영역 end-->
<!--
</div> -->
  <!-- bg lock -->
  <div class="blurbg"></div>
  <!-- 전체 메뉴 팝업창 -->
  <div class="popup-win">
    <!-- popup header -->
    <div class="popup-header">
      <div class="popup-title">
        <img src="img/dogu2.png" alt="(로고 이미지)" style="margin: 0px;">
        <span>전체 메뉴</span>
      </div>
      <div class="popup-exit"><a href=""> X </a></div>
    </div>
    <!--
    <hr>
    <br> -->
    <!-- popup body -->
    <div class="popup-body">
      <div class="gnb-pop">
        <ul>
    			<li class="gnb-pop-d1">
            <a href="menu/intro.php">도구(Dogu)</a>
            <ul class="gnb-pop-d2">
              <li><a href="menu/intro.php">인사말</a></li>
              <li><a href="menu/intro.php#anc-dogu-02">연혁</a></li>
              <li><a href="menu/intro.php#anc-dogu-03">함께하는 사람들</a></li>
              <li><a href="menu/intro.php#anc-dogu-04">오시는 길</a></li>
            </ul>
          </li>
    			<li class="gnb-pop-d1">
            <a href="menu/business.php">사업안내</a>
            <ul class="gnb-pop-d2">
              <li><a href="menu/business.php">교육</a></li>
              <li><a href="menu/business.php#anc-business-02">문화예술</a></li>
              <li><a href="menu/business.php#anc-business-03">심리정서</a></li>
            </ul>
          </li>
    			<li class="gnb-pop-d1">
            <a href="menu/noticeList.php">소식</a>
            <ul class="gnb-pop-d2">
              <li><a href="menu/noticeList.php">공지사항</a></li>
            </ul>
          </li>
    		</ul>
      </div>
    </div>
   </div>
   <!-- 전체 메뉴 팝업창 end -->

   <div class="main_contents">
     <img src="https://modo-phinf.pstatic.net/20210826_37/1629944985313cXfhx_PNG/mosaet84Jh.png" alt="메인 이미지">
   </div>

  <hr>
  <!-- 푸터 영영 -->
  <div class="footer">
    <div class="footer-col1">
      <div class="footer-col1-logo">
        <img src="img/dogu2.png" alt="로고">
      </div>
      <div class="footer-col1-info">
        <span>TEL 070-8095-3607 &nbsp; | &nbsp; FAX 02-468-0601 &nbsp; <br/>
        <span>사단법인 도구 &nbsp; | &nbsp; EMAIL <a href="mailto:nanum@dogu.or.kr">nanum@dogu.or.kr</a></span> <br/>
        <span>서울시 성동구 아차산로7나길 18 에이팩센터 507호</span> <br/>
        <span>Copyright &copy; 2021 Livewith All rights reserved.</span>
      </div>
    </div>
    <div class="footer-col2">
      <div class="footer-col2-nts">
        <a href="https://www.nts.go.kr" title="국세청 바로가기" target="_blank">
          <img src="img/nts.jpg" alt="국세청">
        </a>
        <a href="https://www.nts.go.kr" title="국세청 바로가기" target="_blank">
          <span>국세청 바로가기 ▶</span>
        </a>
        <!--
        <a href="https://www.nts.go.kr" title="국세청 바로가기" target="_blank">
          <button style="padding:5px">국세청 바로가기</button>
        </a> -->
      </div>
    </div>
  </div>
  <!-- 푸터 영영 end -->
  <div class="btn-top">
    <a href="javascript:window.scrollTo(0, 0);">Top</a>
  </div>
</body>

</html>
