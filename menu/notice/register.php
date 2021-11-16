<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();

  if(!isset($_SESSION['ADMIN'])) {
    echo("<script>
            alert('글 작성 권한이 없습니다.');
            location.href='../noticeList.php';
          </script>");
  }
?>

<html>
<head>
  <title>관리자 페이지 - 공지사항 등록</title>
  <style type="text/css">
    @font-face {
        font-family: 'NanumSquareRound';
        src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_two@1.0/NanumSquareRound.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
    body {
      text-align: center;
      margin: 30px;
      font-family: 'NanumSquareRound';
    }
    form {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 60%;
      height : 60%;
      max-width: 850px;
      max-height: 550px;
    }
    .toolbar {
      padding: 10px;
    }
    input[type=text], textarea {
      white-space: pre-line;
      font-family: 'NanumSquareRound';
    }
    input[type=text] {
      display: inline-block;
      width: 100%;
      padding: 5px 10px;
      margin: 5px 0;
      line-height: 32px;
      font-size: 22px;
    }
    textarea {
      width: 100%;
      height: 350px;
      padding: 10px;
      line-height: 18px;
      font-size: 15px;
    }
    button {
      width: 100px;
      margin-top: 10px;
      padding: 10px;
      border: none;
      border-radius: 2px;
      color: white;
      background-color: green;
      cursor: pointer;
      font-family: 'NanumSquareRound';
      font-size: 12pt;
    }
    button:hover {
      background-color: #7FD87D;
    }
    .btn-cancel:hover {
      background-color: red;
    }
    footer {
      font-size: 10px;
      font-family: 'NanumSquareRound';
    }
    /* 모바일에서 */
    @media all and (max-width:559px) {
      form {
        width: 75%;
        margin: 0;
      }
    }
    </style>
</head>
<body>
  <h2>공지사항 등록</h2>

  <form method="POST" action="register-check.php">
    <div class="form-area">
      <div class="toolbar">
        툴바 영역
      </div>
      <div>
        <input type="text" placeholder="제목" name="title" required>
        <textarea placeholder="내용" name="body" required></textarea>
      </div>
      <button type="submit">등록</button> <!--
      <button class="btn-cancel" type="button">취소</button> -->
    </div>
  </form>


</body>
</html>
