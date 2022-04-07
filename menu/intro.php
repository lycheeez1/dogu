<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes">
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
  <script type="text/javascript" src="../js/click.js"></script><!--
  <script type="text/javascript" src="../js/common.js"></script>-->
  <style type="text/css">
    #gnb-menu-d1-01 > a {
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
  			<li class="gnb-menu-d1" id="gnb-menu-d1-01">
          <a href="intro.php">도구(Dogu)</a>
        </li>
  			<li class="gnb-menu-d1">
          <a href="business.php">사업안내</a>
          <ul class="gnb-menu-d2" id="gnb-menu-d2-biz">
            <li><a href="business.php#anc-business-01">교육</a></li>
            <li><a href="business.php#anc-business-02">문화예술</a></li>
            <li><a href="business.php#anc-business-03">심리정서</a></li>
          </ul>
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

  <!-- bg lock -->
  <div class="blurbg"></div>
  <!-- 전체 메뉴 팝업창 -->
  <div class="popup-win">
    <!-- popup header -->
    <div class="popup-header">
      <div class="popup-title">
        <img src="../img/dogu2.png" alt="(로고 이미지)">
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

  <div class="main">
    <div class="sideMenu">
      <ul>
        <li><span>도구(Dogu)</span>
          <ul>
            <li><a href="#anc-dogu-01">인사말</a></li>
            <li><a href="#anc-dogu-05">미션과 비전</a></li>
            <li><a href="#anc-dogu-02">연혁</a></li>
            <li><a href="#anc-dogu-03">함께하는 사람들</a></li>
            <li><a href="#anc-dogu-04">오시는 길</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="main-col1">&nbsp</div>
    <div class="main-col2">
      <a id="anc-dogu-01"></a><br>
      <div class="main-col2-row1">
        <span class="main-chap">인사말</span>
        <span>
          우리 아이들은 태어나서 자라나는 모든 순간에 여러 모양의 자양분과 도움이 필요합니다. <br>
          한 아이마다의 고유한 가치와 속도에 맞춰 자양분을 심어주고 <br>
          그 과정을 함께 걸으며 <br>
          아이들에게 귀 기울이고, 필요한 것을 찾아주고, 소중한 존재임을 깨닫게 해주고 싶습니다. <br><br>

          또한, 아이들 스스로가 무한한 가능성을 깨닫고, 꽃 피울 수 있도록! <br>
          능동적인 주체로써 살아갈 수 있도록! <br>
          아이가 자라나는 순간순간 마다 각자의 필요에 꼭 맞는 모양의 도구로 쓰이고 싶습니다. <br><br>

          아이들의 한 걸음, 한 걸음을 함께 응원해 주신다면, <br>
          그 걸음들이 긍정적이고 맑은 마중물이 되고, 건강한 어른으로 성장할 것입니다. <br><br>

          우리 아이들이 첫 걸음을 힘차게 내 딛을 수 있도록 최선을 다하겠습니다. <br><br>

          감사합니다. <br><br>

          사단법인 도구 대표 정현아
        </span>
      </div>

      <a id="anc-dogu-05"></a><br><br>
      <div class="main-col2-row5">
        <span class="main-chap">미션과 비전</span>
        <div class="main-col2-row5-01">
          <span class="main-subchap">미션</span>
          <span>모든 아동이 나다움을 온전히 누리고, 더불어 살아가는 건강한 사회를 만듭니다.</span>
        </div>
        <!-- <hr class="hr-main"> -->
        <div class="main-col2-row5-02">
          <span class="main-subchap">비전</span>
            <span>삶 통합 멘토링 지원을 통해 원하는 것을 마음껏 누리며, 나다움·너다움·우리다움을 알아가는 세상을 꿈꿉니다.<span>
        </div>
        <br>
        <div class="main-col2-row5-03">
          <span class="main-subchap">핵심가치</span>
          <div class="main-corevalue">
            <span class="corevalue"> 전문성 </span>
              <span>삶 통합 멘토링의 특화되고 체계적인 서비스와 <br>
                질적 향상을 위해 끊임없이 노력합니다.</span>
          </div>
          <div class="main-corevalue">
            <span class="corevalue"> 안정 </span>
            <span>아동을 삶의 주체로 인정하고, <br>
              아동 관점에서 주체적 참여 방식을 생각합니다. <span>
          </div>
          <div class="main-corevalue">
            <span class="corevalue"> 연대 </span>
             <span>유관 기관과 유연하고, 새로운 방식으로 연대하여 <br>
               혁신적인 변화를 이끌어냅니다.</span>
          </div>
          <div class="main-corevalue">
            <span class="corevalue"> 존중 </span>
            <span>현장 전문가의 전문성을 존중하며, <br>
              다양한 방법으로 전문성을 지지합니다. </span>
          </div>
        </div>
      </div>

      <a id="anc-dogu-02"></a><br><br>
      <div class="main-col2-row2">
        <span class="main-chap">연혁</span>
        <img src="../img/dogu_history.png"  alt="연혁_2021">
      </div>

      <a id="anc-dogu-03"></a><br><br>
      <div class="main-col2-row3">
        <span class="main-chap">함께하는 사람들</span>
        <img src="../img/dogu_org.png" alt="함께하는_사람들_조직도"><br><br>
        <img src="../img/dogu_with.png" alt="함께하는_사람들_이사회">
      </div>

      <a id="anc-dogu-04"></a><br><br>
      <div class="main-col2-row4">
        <span class="main-chap">오시는 길</span> <!--
        <p>구글맵</p>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6326.786995350529!2d127.05160192524144!3d37.545791925760874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca4be13ed1519%3A0x74e7e141c9030a18!2z7JeQ7J207Yyp7IS87YSw!5e0!3m2!1sko!2skr!4v1635359504065!5m2!1sko!2skr"
            allowfullscreen="" loading="lazy"></iframe>
        </div>
        <br>
        <p>카카오맵</p> -->
        <div class="map">
          <a href="https://map.kakao.com/?urlX=512762&urlY=1124549&urlLevel=3&map_type=TYPE_MAP&map_hybrid=false" target="_blank">
            <img src="https://map2.daum.net/map/mapservice?FORMAT=PNG&SCALE=2.5&MX=512762&MY=1124549&S=0&IW=504&IH=310&LANG=0&COORDSTM=WCONGNAMUL&logo=kakao_logo">
          </a> <!--
          <div class="hide">
            <div>
              <a href="https://map.kakao.com/?urlX=512762&urlY=1124549&urlLevel=3&map_type=TYPE_MAP&map_hybrid=false" target="_blank">
                서울특별시 성동구 성수동2가 289-5 908호
              </a>
            </div>
          </div> -->
        </div>
        <div class="map-descrption">
          <span>
          - 주소: 서울시 성동구 아차산로7나길 18 성수 에이팩센터 908호 <br>
          - 전화: 02-3409-7477 <br>
          - 팩스: 02-3409-7478 <br>
          - 이메일: <a href="mailto:nanum@dogu.or.kr">nanum@dogu.or.kr</a> <br><br>

          성수역 2번출구에서 도보 8분 (523m) <br>
          * 건물에 주차 가능
          </span>
        </div>
      </div>
      <div class="btn-top">
        <a href="javascript:window.scrollTo(0, 0);">Top</a>
      </div>
    </div>
  </div>
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
        <span>서울시 성동구 아차산로7나길 18 에이팩센터 908호</span> <br/>
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
