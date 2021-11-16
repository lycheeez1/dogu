<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

//  $index = $_GET['nid'];
  $index = $_POST['idx'];
  $title = $_POST['title'];
  $body = $_POST['body'];

  include ("../../authentication/dbconn.php");


  $dup_check = "SELECT * FROM notice WHERE NTITLE='$title' and NBODY='$body'";
  $chk_res = mysqli_query($conn, $dup_check);
  $rowNum = mysqli_num_rows($chk_res);
  if($rowNum >= 1) {
    echo("<script>
            alert('중복된 공지는 등록되지 않습니다.');
            location.href='./register.php';
          </script>");
  }
  else {
    $sql = "UPDATE notice SET NTITLE='$title', NBODY='$body' WHERE NID='$index'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      echo("<script>
              alert('공지가 정상적으로 수정되었습니다.');
              location.href='./view.php?nid=$index';
            </script>");
    } else {
      echo('<script>
              alert("Fail");
            </script>');
    }
  }

?>
