<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

  $title = $_POST['title'];
  $body = $_POST['body'];
  date_default_timezone_set('Asia/Seoul');
  $date = date('Y-m-d');
//  $date = DATE_FORMAT(now(), '%Y-%m-%d');

  include ("../../authentication/dbconn.php");

  if ($_FILES['attached_file']['tmp_name']) {
    $tmp_file =  $_FILES['attached_file']['tmp_name'];
    $ori_name = $_FILES['attached_file']['name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['attached_file']['name']);
    $file_dir = "../../upload/".$filename;
    move_uploaded_file($tmp_file, $file_dir);
  } else {
    $ori_name = NULL;
  }

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
    $sql = "INSERT INTO notice(NTITLE, NBODY, NDATE, NHIT, NFILE) VALUES('$title', '$body', '$date', 0, '$ori_name')";
    $res = mysqli_query($conn, $sql);
    echo("<script>alert('hello2');</script>");
    if ($res) {
      echo("<script>
              alert('공지가 정상적으로 등록되었습니다.');
              location.href='../noticeList.php';
            </script>");
    } else {
      echo("<script>
              alert('비정상적인 접근입니다.');
              location.href='./register.php';
            </script>");
    }
  }

?>
