<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

  include ("../authentication/dbconn.php");

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

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="사단법인 도구(Dogu)">
  <meta property="og:description" content="아이가 아이답게 자랄 수 있는 세상을 만듭니다" />
  <meta property="og:image" content="../img/rsz_dogu1.png">
  <meta name="twitter:image" content="../img/rsz_dogu1.png">
  <link rel="shortcut icon" type="image/x-icon" href="../img/dogu2.png">

  <title>도구(Dogu) | 사단법인 도구(Dogu)</title>
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <link rel="stylesheet" type="text/css" href="../css/common-menu.css">
  <link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-round.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="../js/scroll.js"></script>
  <script type="text/javascript" src="../js/click.js"></script>
  <script type="text/javascript">
    $(function(){
      $(".read-notice").click(function(){
        var action_url = $(this).attr("data-action");
        $(location).attr("href", action_url);
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
    .search-cont {
      float:right;
      margin: 10px 10%;
    }
    .search-cont input {
      width:120px;
      line-height:20px;
      padding: 0 5px;
      font-size: 13px;
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
    .btn-logout>a {
      display: inline-block;
      padding: 2px 4px;
      margin:5px 0;
      background-color: lightgray;
      border-radius: 8%
    }
    .notice_board {
      user-select: none;
      text-align:center;
      width: 90%;
      border: 5px;
      border-style: solid;
      border-style: solid hidden;
      font-size: 14px;
      border-image: linear-gradient(to right, #b9e66a, #F9E480, #7FD87D, #F9E480);
      border-image-slice: 1;
    }
    th {
      line-height: 50px;
      border-bottom: 2px solid;
      border-image: linear-gradient(to right, #b9e66a, #F9E480, #b9e66a);
      border-image-slice: 1;
    }
    td {
      line-height: 40px;
      max-width: 75px;
      text-overflow:ellipsis;
      white-space:nowrap;
      word-wrap:normal;
      overflow:hidden;
      border-collapse: collapse;
      border-bottom: 1px solid;
      border-color: rgba(221, 221, 218, 0.4)
    }
    #th-num {
      max-width: 20px;
    }
    #th-date {
      max-width: 30px;
    }
    .board-title {
      text-align: left;
      padding: 0 10px;
    }
    .read-notice:hover {
      color: green;
      text-decoration-line: underline;
      text-underline-position: under;
      cursor:pointer;
    }
    .board-item {
      font-size: 13px;
      max-width: 25px;
    }
    .page-cont {
      text-align: center;
      margin: 2% auto;
      margin-right: 10%;
    }
    .page-cont span {
      color: green;
      font-weight: bold;
      text-decoration-line: underline;
      text-underline-position: under;
    }
    .page-cont a {
      color: black;
      opacity: 0.7;
    }
    /* 모바일에서 */
    @media all and (max-width:559px) {
      .search-cont {
        margin: 10px 0;
      }
      .notice_board {
        width: 100%;
      }
      .page-cont {
        margin-right: 0;
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
  			<li class="gnb-menu-d1">
          <a href="business.php">사업안내</a>
          <ul class="gnb-menu-d2" id="gnb-menu-d2-biz">
            <li><a href="business.php">교육</a></li>
            <li><a href="business.php#anc-business-02">문화예술</a></li>
            <li><a href="business.php#anc-business-03">심리정서</a></li>
          </ul>
        </li>
  			<li class="gnb-menu-d1" id="gnb-menu-d1-03">
          <a href="noticeList.php">소식</a>
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
            <li><a href="noticeList.php">공지사항</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="main-col1" style="user-select:none">
      &nbsp
    </div>
    <div class="main-col2">
      <a id="anc-notice-01"><br></a>
      <div class="main-col2-row1">
        <span class="main-chap">공지사항</span> <!--
        <span style="font-size:13px;color:#8C968D;">사단법인 도구에서 공지합니다.</span> <br><br> -->
        <!-- 글쓰기 버튼 -->
        <?php
          if(isset($_SESSION['ADMIN']) && !empty($_SESSION['ADMIN'])) {
            echo '<style type="text/css">
                    .btn-write {display:block;}
                  </style>';
          } else {
            echo '<style type="text/css">
                    .btn-write {display:none;}
                  </style>';
          }
        ?>
        <div class="btn-write">
          <button onclick="location.href='notice/register.php'">글쓰기</button>
        </div>
        <!-- 글쓰기 버튼 end -->
        <!-- 검색 영역 -->
        <div class="search-cont">
          <input type="text" size=15>
          <button class="btn-search" onclick="">검색</button>
        </div>
        <!-- 검색 영역 end -->
        <!-- 공지 리스트 -->
        <table class="notice_board">
          <thead>
            <tr>
              <th id="th-num">번호</th>
              <th id="th-title">제목</th>
              <th id="th-date">등록일</th>
              <th id="th-num">조회수</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if (isset($_GET["pageNo"])){
              $page = $_GET["pageNo"];
            } else {
              $page = 1;
            }

            $select_all = "SELECT * FROM notice";
            $res = mysqli_query($conn, $select_all);
            $row_num = mysqli_num_rows($res);

            $list = 10;    // 한 페이지에 10개씩
            $block_cnt = 5;  // 블록당 보여줄 페이지 개수
            $block_num = ceil($page / $block_cnt);  // 현재 페이지 블록
            $block_start = (($block_num - 1) * $block_cnt) + 1;   // 블록의 시작 번호
            $block_end = $block_start + $block_cnt - 1;   // 블록의 마지막 번호
            $total_page = ceil($row_num / $list);   // 전체 페이지 수

            if ($block_end > $total_page) {
              $block_end = $total_page;
            }
            $total_block = ceil($total_page / $block_cnt);
            $start_num = ($page - 1) * $list;

            $sql = "SELECT * FROM notice ORDER BY NID DESC LIMIT $start_num, $list";
            $res2 = mysqli_query($conn, $sql);
            $rowNum = mysqli_num_rows($res2);

            $arri = 0;
            $prev_num = [];
            $prev_num = $rowNum; // 배열에 값 삽입
//            array_unshift($prev_num, $rowNum);  // 배열의 맨처음에 요소 추가
            if ($page >= 2) {
              $row_num = $row_num - ($prev_num[$arri] + ($page - 1) * $list);
            }

            while ($notice = mysqli_fetch_assoc($res2)) {
              $title = $notice['NTITLE'];
              $index = $notice['NID'];
              $date = $notice['NDATE'];
              $hits = $notice['NHIT'];
          ?>
            <tr>
              <td class="board-item"><?=$row_num;?></td>
              <td class="board-title">
                <span class="read-notice" data-action="./notice/view.php?nid=<?=$index?>"><?=$title;?></span>
              </td>
              <td class="board-item"><?=$date;?></td>
              <td class="board-item"><?=$hits;?></td>
            </tr>
            <?php
              $row_num--;   // == NID (글삭제 시 번호 갱신을 위해)
            }
            $arri++;  // 배열 인덱스 ++
            ?>
          </tbody>
        </table>
        <!-- 공지 리스트 end -->
        <!-- 페이징 영역 -->
        <div class="page-cont">
          <?php
            if ($page <= 1) {
            } else {
              echo("<a href='./noticeList.php?pageNo=1'> << </a>");
              $prev = $page - 1;
              echo("<a href='./noticeList.php?pageNo=$prev'> ◀ </a>");
            }
            for ($i = $block_start; $i <= $block_end; $i++) {
              if ($page == $i) {
                echo("<span> $i </span>");
              } else {
                echo("<a href='./noticeList.php?pageNo=$i'> $i </a>");
              }
            }
            if ($page >= $total_page) {
            } else {
              $next = $page + 1;
              echo("<a href='./noticeList.php?pageNo=$next'> ▶ </a>");
              echo("<a href='./noticeList.php?pageNo=$total_page'> >> </a>");
            }
          ?>
        </div>
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
