<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();

  if(!isset($_SESSION['ADMIN'])) {
    echo("<script>
            alert('글 삭제 권한이 없습니다.');
            location.href='../../index.php';
          </script>");
    exit();
  }

  include ("../../authentication/dbconn.php");


  $index = $_GET['nid'];

  $sql = "DELETE FROM notice WHERE NID='$index'";
  $res = mysqli_query($conn, $sql);
  echo("<script>
          alert('공지가 삭제되었습니다.');
          location.href='../noticeList.php';
        </script>");

?>
