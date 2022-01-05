<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

//  $row_num = $_POST['rn'];
  $title = $_POST['title'];
  $body = $_POST['body'];
  $file = $_POST['attached_file'];
  date_default_timezone_set('Asia/Seoul');
  $date = date('Y-m-d');
//  $date = DATE_FORMAT(now(), '%Y-%m-%d');
  $title = addslashes($title);
  $body = addslashes($body);
  $file = addslashes($file);

  include ("../../authentication/dbconn.php");

  $sql = "SELECT * FROM notice ORDER BY NID DESC LIMIT 1";
  $res = mysqli_query($conn, $sql);
  $notice = mysqli_fetch_assoc($res);
  $nid = $notice['NID'];
  if (!isset($notice['NID'])) {
       $index = 1;
  } else { 
       $index = $notice['NID'] + 1;
  }
//  echo $index;

  if (isset($_FILES['attached_file']['tmp_name'])) {
    $cnt = count($_FILES['attached_file']['name']);
    $target_dir = '../../upload/'.$index.'/';
    // upload 하위 폴더(공지) 생성
    chdir('../../');
    $target_path = './upload/'.$index.'/';
    if (!is_dir($target_path)) {
      mkdir($target_path, 0777, true);
    }
    chdir('./menu/notice/');

    for ($i = 0; $i < $cnt; $i++) {
      if (isset($_FILES['attached_file']['name'][$i]) && $_FILES['attached_file']['size'][$i] > 0) {
        $tmp_file =  $_FILES['attached_file']['tmp_name'][$i];
        $ori_name = $_FILES['attached_file']['name'][$i];
        $filename = iconv("UTF-8", "EUC-KR", $_FILES['attached_file']['name'][$i]); 
        $file_path = $target_dir.$ori_name;
        move_uploaded_file($tmp_file, $file_path); /*
        $file_upload = move_uploaded_file($tmp_file, $file_path);
    		// 업로드 성공 여부 확인
    		if(isset($file_upload)){
          echo("<script>alert('파일 업로드 성공');</script>");
    		}else{
          echo("<script>alert('파일 업로드 실패');</script>");
    		} */
      } else {
        $ori_name = NULL;
      }
    }
  }

  $dup_check = "SELECT * FROM notice WHERE NTITLE='$title' and NBODY='$body'";
  $chk_res = mysqli_query($conn, $dup_check);
  $rowNum = mysqli_num_rows($chk_res);
  if($rowNum >= 1) {
    echo("<script>
            alert('중복된 공지는 등록할 수 없습니다.');
            history.back();
          </script>");
  }
  else {
    $ori_name = addslashes($ori_name);
    $sql = "INSERT INTO notice(NTITLE, NBODY, NDATE, NHIT, NFILE) VALUES('$title', '$body', '$date', 0, '$ori_name')";
    $res = mysqli_query($conn, $sql);
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
