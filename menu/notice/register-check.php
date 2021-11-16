<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

  $title = $_POST['title'];
  $body = $_POST['body'];
  date_default_timezone_set('Asia/Seoul');
  $date = date('Y-m-d');
//  $date = DATE_FORMAT(now(), '%Y-%m-%d');

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
    $sql = "INSERT INTO notice(NTITLE, NBODY, NDATE, NHIT) VALUES('$title', '$body', '$date', 0)";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      echo("<script>
              alert('공지가 정상적으로 등록되었습니다.');
              location.href='../noticeList.php';
            </script>");
    }
  }

?>
