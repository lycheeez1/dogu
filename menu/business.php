<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta property="og:type" content="website">
  <meta property="og:title" content="사단법인 도구(Dogu) - 도구(Dogu)">
  <meta property="og:site_name" content="사단법인 도구(Dogu)">
  <meta property="og:description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" />
  <meta property="og:image" content="../img/rsz_dogu1.png">
  <meta name="twitter:image" content="../img/rsz_dogu1.png">
  <link rel="shortcut icon" type="image/x-icon" href="../img/dogu2.png">
  <title>사업안내 | 사단법인 도구(Dogu)</title>
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <link rel="stylesheet" type="text/css" href="../css/common-menu.css">
  <link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-round.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="http://fatlinesofcode.github.io/jquery.smoothwheel/src/jquery.smoothwheel.js"></script>
  <script type="text/javascript" src="../js/scroll.js"></script>
  <script type="text/javascript" src="../js/click.js"></script>
  <script>
    $(document).ready(function(){
      $("body").smoothWheel()
    });
  </script>
  <style type="text/css">
    #gnb-menu-d1-02 > a {
      color: gray;
      border-color: #7fd87d;
    }
  </style>
</head>
<body>
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
<div class="header">
  <div class="progress-cont">
    <div class="progress-bar" id="progress-bar-id"></div>
  </div>
  <div class="user-cont">
    <div class="gnb-logo" id="gnb-logo-mobile">
      <a href="http://dogu.or.kr" title="dogu">
        <img src="../img/rsz_dogu1.png" alt="logo">
      </a>
    </div>
    <div class="btn-login"><a href="../authentication/login.html">로그인</a></div>
    <div class="btn-logout"><a href="../authentication/logout.php">로그아웃</a></div>
    <div class="greeting"><?=$admin;?> 접속</div>
  </div>
  <!-- 최상단 로그인 영역 end -->
  <!-- gnb 영역 -->
  <div class="gnb-cont">
    <div class="gnb-logo">
      <a href="http://dogu.or.kr" title="메인으로 이동">
        <img src="../img/rsz_dogu1.png" alt="로고">
      </a>
    </div>
    <div class="gnb">
      <ul>
        <li class="gnb-menu-d1">
          <a href="intro.php">도구(Dogu)</a>
          <ul class="gnb-menu-d2" id="gnb-menu-d2-dogu">
            <li><a href="intro.php">인사말</a></li>
            <li><a href="intro.php#anc-dogu-02">연혁</a></li>
            <li><a href="intro.php#anc-dogu-03">함께하는 사람들</a></li>
            <li><a href="intro.php#anc-dogu-04">오시는 길</a></li>
          </ul>
        </li>
  			<li class="gnb-menu-d1" id="gnb-menu-d1-02">
          <a href="business.php">사업안내</a>
        </li>
  			<li class="gnb-menu-d1">
          <a href="noticeList.php">소식</a>
          <ul class="gnb-menu-d2" id="gnb-menu-d2-notice">
            <li><a href="noticeList.php">공지사항</a></li>
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
</div>
  <div class="main">
    <div class="sideMenu">
      <ul>
        <li><li><span>사업 안내</span>
          <ul>
            <li><a href="#anc-business-01">교육</a></li>
            <li><a href="#anc-business-02">문화예술</a></li>
            <li><a href="#anc-business-03">심리정서</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="main-col1">
      &nbsp
    </div>
    <div class="main-col2">
      <a id="anc-business-01"><br></a>
      <div class="main-col2-row1">
        <span class="main-chap">교육</span>
        <span> KB라스쿨(La School) </span> <br>
        <img src="https://modo-phinf.pstatic.net/20210826_37/1629944985313cXfhx_PNG/mosaet84Jh.png" alt="KB라스쿨"> <br>
        <span>
	  온라인 교육 플랫폼으로 스타 강사의 실시간 온라인 강의, 1:1 맞춤 멘토링, 자기주도학습 역량 강화 프로그램 지원을 통해 <br>
	  균등한 교육 기회와 학습 능력 향상의 기회를 제공<br><br>
        </span>
      </div>
      <div class="main-col2-row1">
        <span> KB국민은행 IT아카데미 IT’s Your Life </span> <br>
        <img src="https://modo-phinf.pstatic.net/20210826_37/1629944985313cXfhx_PNG/mosaet84Jh.png" alt="KB라스쿨"> <br>
        <span>
	  양질의 IT 교육 지원을 통한 디지털 역량 강화로 디지털 금융 개발자 양성, 진로 체험 기회 제공<br>
	  취업 역량 강화를 통한 취업 문제 해결 도움, 건강한 사회 구성원으로 성장 도움<br><br>
        </span>
      </div>
      <div class="main-col2-row1">
        <span> 두드림(Do Dream) </span> <br>
        <img src="https://modo-phinf.pstatic.net/20210826_37/1629944985313cXfhx_PNG/mosaet84Jh.png" alt="KB라스쿨"> <br>
        <span>
	  문화, 예술 분야를 전공하는 청소년 및 청년에게 <br>
	  전문 강사, 작품 창작 및 활동비 지원을 통해 미래 인재로 성장할 수 있는 기회 제공<br><br>
        </span>
      </div>

      <a id="anc-business-02"></a><br>
      <div class="main-col2-row2">
        <span class="main-chap">문화예술</span>
        <img src="">
        <span> 준비 중입니다. </span> <br>
      </div>

      <a id="anc-business-03"></a><br>
      <div class="main-col2-row3">
        <span class="main-chap">심리정서</span>
        <img src="">
        <span> 준비 중입니다. </span> <br>
      </div>

      <div class="btn-top">
        <a href="javascript:window.scrollTo(0, 0);">Top</a>
      </div>
    </div>
  </div>

  <!-- bg lock -->
  <div class="blurbg"></div>
  <!-- 전체 메뉴 팝업창 -->
  <div class="popup-win">
    <!-- popup header -->
    <div class="popup-header">
      <div class="popup-title">
        <img src="../img/dogu2.png" alt="(로고 이미지)" style="margin: 0px;">
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
            <a href="intro.php">도구(Dogu)</a>
            <ul class="gnb-pop-d2">
              <li><a href="intro.php">인사말</a></li>
              <li><a href="intro.php#anc-dogu-02">연혁</a></li>
              <li><a href="intro.php#anc-dogu-03">함께하는 사람들</a></li>
              <li><a href="intro.php#anc-dogu-04">오시는 길</a></li>
            </ul>
          </li>
          <li class="gnb-pop-d1">
            <a href="business.php">사업안내</a>
            <ul class="gnb-pop-d2">
              <li><a href="business.php">교육</a></li>
              <li><a href="business.php#anc-business-02">문화예술</a></li>
              <li><a href="business.php#anc-business-03">심리정서</a></li>
            </ul>
          </li>
          <li class="gnb-pop-d1">
            <a href="noticeList.php">소식</a>
            <ul class="gnb-pop-d2">
              <li><a href="noticeList.php">공지사항</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
   </div>
   <!-- 전체 메뉴 팝업창 end -->

  <hr>
  <!-- 푸터 영영 -->
  <div class="footer">
    <div class="footer-col1">
      <div class="footer-col1-logo">
        <img src="../img/dogu2.png" alt="로고">
      </div>
      <div class="footer-col1-info">
        <span>TEL 02-3409-7477 &nbsp; | &nbsp; FAX 02-3409-7478 &nbsp; <br/>
        <span>사단법인 도구 &nbsp; | &nbsp; EMAIL <a href="mailto:nanum@dogu.or.kr">nanum@dogu.or.kr</a></span> <br/>
        <span>서울시 성동구 아차산로7나길 18 에이팩센터 507호</span> <br/>
        <span>Copyright &copy; 2021 Dogu All rights reserved.</span>
      </div>
    </div>
    <div class="footer-col2">
      <div class="footer-col2-nts">
        <a href="https://www.nts.go.kr" title="국세청 바로가기" target="_blank">
          <img src="../img/nts.jpg" alt="국세청">
        </a> <!--
        <button style="padding:5%;">국세청 바로가기</button> -->
      </div>
    </div>
  </div>

</body>
</html>
