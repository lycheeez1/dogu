<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();

  if(!isset($_SESSION['ADMIN'])) {
    echo("<script>
            alert('글 수정 권한이 없습니다.');
            location.href='../../authentication/login.html';
          </script>");
  }

  include ("../../authentication/dbconn.php");


  $index = $_GET['nid'];

  $sql = "SELECT * FROM notice WHERE NID='$index'";
  $res = mysqli_query($conn, $sql);
  $notice = mysqli_fetch_assoc($res);
  $title = $notice['NTITLE'];
  $body = $notice['NBODY'];
?>

<html>
<head>
  <title>관리자 페이지 - 공지사항 등록</title>
  <style type="text/css">
    body {
      text-align: center;
      margin: 30px;
      font-family: "나눔스퀘어_ac", "나눔고딕";
    }
    form {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 80%;
      height : 80%;
      max-width: 850px;
      max-height: 550px;
      background-color: lightgreen;
    }
    .toolbar {
      padding: 10px;
    }
    .form-table {
      text-align: center;
      margin: 0 auto;
      margin-top: 10px;
      background-color: green;
      width: 90%;
      padding:10px;
    }
    table td {
      border-bottom: 2px solid #ccc;
      padding: 5px 0;
    }
    table input {
      display: inline-block;
      width: 100%;
      padding: 5px 10px;
      margin: 5px 0;
      font-family: "나눔스퀘어_ac", "나눔고딕";
    }
    textarea {
      width: 100%;
      height: 350px;
      padding: 10px;
      font-family: "나눔스퀘어_ac", "나눔고딕";
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
      font-family: "나눔스퀘어_ac","나눔바른고딕";
      font-size: 12pt;
    }
    button:hover {
      background-color: lightgreen;
    }
    footer {
      font-size: 10px;
      font-family: "나눔바른고딕";
    }
    </style>
</head>
<body>
  <h2>공지사항 등록</h2>

  <form method="POST" action="modify-check.php">
    <div class="toolbar">
      툴바 영역
    </div>
    <table class="form-table">
      <tr>
        <td>제목</td>
        <td><input type="text" name="title" value="<?=$title;?>" required></td>
      </tr>
      <tr>
        <td>내용</td>
        <td><textarea name="body" required><?=$body;?></textarea></td>
    </table>
    <input type="hidden" name="idx" value="<?=$index;?>">
    <button type="submit">등록</button> <br/>
    <!--
    <td><button type="button" href="../../menu/notice.php">취소</button></td>
    [취소] 눌렀을 때 뒤로 돌아갈지 팝업창 띄우기 -->
  </form>


</body>
</html>
