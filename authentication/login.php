<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

  $id = $_POST['aid'];
  $pw = $_POST['apw'];
//  $pw = password_hash($_POST['apw'], PASSWORD_DEFAULT);

  include ("./dbconn.php");

  $sql = "SELECT * FROM admin WHERE adminID='$id' and adminPW='$pw'";
  $res = mysqli_query($conn, $sql);
//  $res = $conn -> query($sql);
  $rowNum = mysqli_num_rows($res);

  if($rowNum == 1) {
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if($row['adminPW'] == $pw) {
      if (!isset($_SESSION)) {
          session_start();
      }
      $_SESSION['ADMIN'] = $row['adminID'];

      if(isset($_SESSION['ADMIN'])) {
        echo("<script>
                history.go(-2);
              </script>");
        // location.href='../menu/notice/board.php' 공지사항으로 가게
      } else {
        echo("<script>
                alert('Login denied.');
                location.href='./login.html';
              </script>");
      }
      exit();
    }
  }
  else {
    echo("<script>
            alert('아이디 또는 비밀번호가 잘못 입력되었습니다.');
            history.go(-1);
          </script>");
    exit();
  }

?>
