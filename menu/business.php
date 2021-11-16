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
  <meta property="og:description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" /> <!--
  <meta property="og:url" content="https://www.dogu.or.kr"> -->
  <meta property="og:image" content="../img/rsz_dogu1.png">
  <meta name="twitter:image" content="../img/rsz_dogu1.png"> <!--
  <link rel="canonical" href="https://www.dogu.or.kr"> -->
  <link rel="shortcut icon" type="image/x-icon" href="../img/dogu2.png">

  <title>도구(Dogu) | 사단법인 도구(Dogu)</title>
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <link rel="stylesheet" type="text/css" href="../css/common-menu.css">
  <link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-round.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="../js/scroll.js"></script>
  <script type="text/javascript" src="../js/click.js"></script>
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
            </style>';
    } else {
      echo '<style type="text/css">
              .btn-login {display:block;}
              .greeting {display:none;}
            </style>';
    }
  ?>
  <div class="user-cont">
    <div class="btn-login"><a href="../authentication/login.html">로그인</a></div>
    <div class="greeting"><?=$admin;?> 계정 접속 중</div>
  </div>
  <!-- 최상단 로그인 영역 end -->
  <!-- gnb 영역 -->
  <div class="gnb-cont">
    <div class="gnb-logo">
      <a href="../index.php" title="메인으로 이동">
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
      <a href="#" title="전체 메뉴 보기">
        <div class="gnb-btn">
          <div class="gnb-btn-line"></div>
          <div class="gnb-btn-line"></div>
          <div class="gnb-btn-line"></div>
        </div>
      </a>
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
        <span> KB국민은행- 『KB라스쿨』 </span> <br>
        <img src="https://modo-phinf.pstatic.net/20210826_37/1629944985313cXfhx_PNG/mosaet84Jh.png" alt="KB라스쿨"> <br>
        <span>
          KB국민은행에서 후원하는 전국 온라인 교육 플랫폼 KB라스쿨! <br>
          실시간 온라인 강의와 1:1 멘토링, 추가 학습 지원 등 포괄적인 교육을 제공합니다. <br>
          KB라스쿨은 아이들이 '스스로, 즐겁게' 공부하는 플랫폼을 지향하며 비대면 자습실, 자체 Ladio 등, 다양한 컨텐츠를 개발하여 자연스러운 학습을 유도합니다. <br><br>

          KB라스쿨은 전국 모든 아이들의 빛나는 첫걸음을 응원합니다! <br>
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
        <span>TEL 070-8095-3607 &nbsp; | &nbsp; FAX 02-468-0601 &nbsp; <br/>
        <span>사단법인 도구 &nbsp; | &nbsp; EMAIL <a href="mailto:nanum@dogu.or.kr">nanum@dogu.or.kr</a></span> <br/>
        <span>서울시 성동구 아차산로7나길 18 에이팩센터 507호</span> <br/>
        <span>Copyright &copy; 2021 Livewith All rights reserved.</span>
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
