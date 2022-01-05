<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  include ("../../authentication/dbconn.php");

  $index = $_POST['idx'];
  $title = $_POST['title'];
  $body = $_POST['body'];
  $del_file = $_POST['del-check'];
  $title = addslashes($title);
  $body = addslashes($body);

  /*
  $target_dir = '../../upload/'.$index.'/';

  for ($i = 0; $i < count($del_file); $i++) {
    if (is_dir($target_dir)) {
      chdir('../../');
      unlink('./upload/'.$index.'/'..$del_file[$i]);
      echo $target_dir.$del_file[$i];
      chdir('./menu/notice/');
    } 
    else {
       echo ("<script>alert('File removal fail.');</script>");
    }
  } */

  if (isset($_FILES['attached_file']['tmp_name'])) {
    $cnt = count($_FILES['attached_file']['name']);
    $target_dir = '../../upload/'.$index.'/';

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
        move_uploaded_file($tmp_file, $file_path);/*
        $file_upload = move_uploaded_file($tmp_file, $file_path);

    		// 업로드 성공 여부 확인
    		if(isset($file_upload)){
          echo("<script>
                  alert('파일 업로드 성공');
                </script>");
    		}else{
          echo("<script>
                  alert('파일 업로드 실패');
                </script>");
		}*/
      } 
      else {
        $ori_name = NULL;
      }
    }
  }

/*
  $dup_check = "SELECT * FROM notice WHERE NTITLE='$title' and NBODY='$body'";
  $chk_res = mysqli_query($conn, $dup_check);
  $rowNum = mysqli_num_rows($chk_res);
  if($rowNum >= 1) {
    echo("<script>
            alert('중복된 공지는 등록되지 않습니다.');
            location.href='./register.php';
          </script>");
  }
  else {*/
    $ori_name = addslashes($ori_name);
    $sql = "UPDATE notice SET NTITLE='$title', NBODY='$body', NFILE='$ori_name' WHERE NID='$index'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      echo("<script>
              alert('공지가 정상적으로 수정되었습니다.');
	      location.href='./view.php?nid=$index';
            </script>");
    } else {
      echo("<script>
              alert('Fail');
              location.href='./view.php?nid=$index';
            </script>");
    }
//  }

?>
