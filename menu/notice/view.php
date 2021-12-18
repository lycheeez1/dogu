<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

  include ("../../authentication/dbconn.php");

  session_start();

  $index = $_GET['nid'];   // 제목 클릭 시 넘겨받음

  $sql = "SELECT * FROM notice WHERE NID='$index'";
  $cnt_hits = "UPDATE notice SET NHIT=NHIT+1 where NID=$index";
  $conn->query($cnt_hits);
  $res = mysqli_query($conn, $sql);
  $notice = mysqli_fetch_assoc($res);
  $title = $notice['NTITLE'];
  $date = $notice['NDATE'];
  $body = $notice['NBODY'];
  $body = nl2br($body);
  $hits = $notice['NHIT'];

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
  <meta property="og:site_name" content="사단법인 도구(Dogu)">
  <meta property="og:description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" />
  <meta property="og:image" content="../../img/rsz_dogu1.png">
  <meta name="twitter:image" content="../../img/rsz_dogu1.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../img/dogu2.png">

  <title>도구(Dogu) | 사단법인 도구(Dogu)</title>
  <link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-round.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/common.css">
  <link rel="stylesheet" type="text/css" href="../../css/common-menu.css"> <!--
  <link rel="stylesheet" type="text/css" href="../../css/notice.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="../../js/scroll.js"></script>
  <script type="text/javascript" src="../../js/click.js"></script>
  <script type="text/javascript">
    $(function(){
      $(".read_check").click(function(){
        var action_url = $(this).attr("data-action");
        $(location).attr("href", action_url);
      });
    });

    $(function(){
      $(".btn-del").click(function(){
        if (!confirm('공지를 삭제하시겠습니까?')) {
          return false;
        } else {
          location.href='./delete.php?nid=<?=$index?>';
        }
      });
    });
  </script>
  <style type="text/css">
    body {
      font-family: 'NanumSquareRound';
    }
    #gnb-menu-d1-03 > a {
      color: gray;
      border-color: #7fd87d;
    }
    .notice-article {
      width: 90%;
      margin: 20px 0;
      padding: 20px 0;
      border: 5px;
      border-style: solid;
      border-style: solid hidden;
      font-size: 14px;
      border-image: linear-gradient(to right, #b9e66a, #F9E480, #7FD87D, #F9E480);
      border-image-slice: 1;
      font-family: 'NanumSquareRound';
    }
    td {
      max-width: 75px;
      padding: 8%;
      white-space: pre-line;
    }
    button {
      padding: 5px 10px;
      font-size:14px;
      border-color: transparent;
      border-radius: 8%
    }
    button:hover {
      cursor:pointer
    }
    .btn-cont {
      float: right;
      padding:10px 10%;
    }
    .notice-title td {
      font-size: 20px;
      font-weight: bold;
      padding: 0 10px;
      height:100px;
    }
    .notice-body {
      border-top: 1px solid #ddddda;
      line-height: 24px;
    }
    .notice-item {
      color: gray;
      font-size: 12px;
      line-height: 40px;
      padding: 5px;
    }
    .btn-tolist {
      float: right;
      margin:10px 10%;
      font-size: 15px;
    }

    /* 모바일에서 */
    @media all and (max-width:559px) {
      .main-col2 {
        width: 100%;
        margin: 0;
      }
      .notice-title td {
        font-size: 18px;
        padding: 0 10px;
        height:60px;
      }
      td {
        padding: 10% 5%;
      }
      .btn-cont {
        margin: 10px 0;
      }
      .notice-article {
        width: 100%;
        font-size: 16px;
      }
      .notice-item {
        line-height: 20px;
      }
      .btn-cont {
       padding:10px;
      }
      .btn-tolist {
        margin: 0 auto;
      }
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

    $attfile = $notice['NFILE'];
    if(isset($attfile)) {
      echo '<style type="text/css">
              #attached-tr {display:block;}
            </style>';
    } else {
      echo '<style type="text/css">
              #attached-tr {display:none;}
            </style>';
    }
  ?>
  <div class="user-cont">
    <div class="btn-login"><a href="../../authentication/login.html">로그인</a></div>
    <div class="btn-logout"><a href="../../authentication/logout.php">로그아웃</a></div>
    <div class="greeting"><?=$admin;?> 계정 접속 중</div>
  </div>
  <!-- 최상단 로그인 영역 end -->
  <!-- gnb 영역 -->
  <div class="gnb-cont">
    <div class="gnb-logo">
      <a href="../../index.php" title="메인으로 이동">
        <img src="../../img/rsz_dogu1.png" alt="로고">
      </a>
    </div>
    <div class="gnb">
      <ul>
        <li class="gnb-menu-d1">
          <a href="../intro.php">도구(Dogu)</a>
          <ul class="gnb-menu-d2" id="gnb-menu-d2-dogu">
            <li><a href="menu/intro.php">인사말</a></li>
            <li><a href="menu/intro.php">연혁</a></li>
            <li><a href="menu/intro.php">함께하는 사람들</a></li>
            <li><a href="menu/intro.php">오시는 길</a></li>
          </ul>
        </li>
  			<li class="gnb-menu-d1">
          <a href="../business.php">사업안내</a>
          <ul class="gnb-menu-d2" id="gnb-menu-d2-biz">
            <li><a href="menu/business.php">교육</a></li>
            <li><a href="menu/business.php">문화예술</a></li>
            <li><a href="menu/business.php">심리정서</a></li>
          </ul>
        </li>
  			<li class="gnb-menu-d1" id="gnb-menu-d1-03">
          <a href="../noticeList.php">소식</a>
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
        <li><li><span>소식</span>
          <ul>
            <li><a href="../noticeList.php">공지사항</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="main-col1">
      &nbsp
    </div>
    <div class="main-col2">
      <a id="anc-notice-01"></a>
      <div class="main-col2-row1">
        <span class="main-chap">공지사항</span><br> <!--
        <span>사단법인 도구에서 공지합니다.</span> <br><br> -->
        <!-- 글 수정/삭제 버튼 -->
        <?php
          if(isset($_SESSION['ADMIN']) && !empty($_SESSION['ADMIN'])) {
            echo '<style type="text/css">
                    .btn-cont {display:block;}
                  </style>';
          } else {
            echo '<style type="text/css">
                    .btn-cont {display:none;}
                  </style>';
          }
        ?>
        <div class="btn-cont">
          <button class="btn-mod" onclick="location.href='./modify.php?nid=<?=$index?>'">수정</button>
          <button class="btn-del" onclick="">삭제</button>
        </div>
        <!-- 글 수정/삭제 버튼 end -->
        <!-- 공지 내용 영역 -->
        <table class="notice-article">
          <tr class="notice-title">
            <td colspan="5"><?=$notice['NTITLE']?></td>
          </tr>
          <tr style="float:left">
            <td class="notice-item">등록일</td>
            <td class="notice-item" id="notice-date"><?=$notice['NDATE']?></td>
            <td style="color:lightgray; font-weight:bold; padding:0 5px;"> | </td>
            <td class="notice-item">조회</td>
            <td class="notice-item" id="notice-hits"><?=$notice['NHIT']?></td>
          </tr>
          <tr id="attached-tr">
            <td>
            <a href="../../upload/<?=$notice['NFILE'];?>" download><?=$notice['NFILE']?></a>
          </td>
          </tr>
          <tr class="notice-body">
            <td colspan="5"><?=$notice['NBODY']?></td>
          </tr>
        </table>
        <!-- 공지 내용 영역 end -->
        <button class="btn-tolist" onclick="location.href='../noticeList.php'">목록</button>
      </div>
      <!-- 본문 영역 end -->
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
          <img src="dogu.jpg" alt="(로고 이미지)" style="margin: 0px;">
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

  <hr>
  <!-- 푸터 영영 -->
  <div class="footer">
    <div class="footer-col1">
      <div class="footer-col1-logo">
        <img src="../../img/dogu2.png" alt="로고">
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
          <img src="../../img/nts.jpg" alt="국세청">
        </a> <!--
        <button style="padding:5%;">국세청 바로가기</button> -->
      </div>
    </div>
  </div>

</body>
</html>
