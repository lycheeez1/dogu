<?php
  include ("../../authentication/dbconn.php");

  // 용량 체크
  if($_FILES['summerfile']['size'] > 10240000) {
    echo("<script>
            alert('10MB 이내의 파일만 첨부할 수 있습니다.');
          </script>");
  }
  // 파일 타입 체크 (이미지만)
  $ext = substr(strrchr($_FILES['summerfile']['name'],"."), 1);
  $ext = strtolower($ext);
  if ($ext != "jpg" and $ext != "png" and $ext != "jpeg" and $ext != "gif") {
    echo("<script>
            alert('이미지 파일 확장자(.jpg, .png, .jepg, .gif)만 등록 가능합니다.');
          </script>");
  }

  // 서버에 파일 업로드
  if (isset($_FILES['summerfile']['name'])) {
    if (!$_FILES['summerfile']['error']) {
      $sql = "SELECT * FROM notice ORDER BY NID DESC LIMIT 1";
      $res = mysqli_query($conn, $sql);
      $notice = mysqli_fetch_assoc($res);
      if (!isset($notice['NID'])) {
	  $index = 1;
      } else {
	  $index = $notice['NID'] + 1;
      }

      $target_dir = '../../uploadImg/'.$index.'/';
      // upload 하위 폴더(공지) 생성
      chdir('../../');
      $target_path = './uploadImg/'.$index.'/';
      if (!is_dir($target_path)) {
        mkdir($target_path, 0777, true);
      }
      chdir('./menu/notice/');

      $tmp_file =  $_FILES['summerfile']['tmp_name'];
      $ori_name = $_FILES['summerfile']['name'];
      $filename = iconv("UTF-8", "EUC-KR", $_FILES['summerfile']['name']);
      $file_dir = $target_dir.$ori_name;
      move_uploaded_file($tmp_file, $file_dir);

      echo $file_dir;
    }
    else {
      echo("<script>alert('File Error');</script>");
    }
  }

/*
  $sql = "SELECT * FROM notice ORDER BY NID DESC LIMIT 1";
  $res = mysqli_query($conn, $sql);
  $notice = mysqli_fetch_assoc($res);
  $index = $notice['NID'] + 1;

  echo("<script>alert('Hi');</script>");


  // 서버에 파일 업로드
  if ($_FILES['summerfile']['name']) {
    if (!$_FILES['summerfile']['error']) {
      $cnt = count($_FILES['summerfile']['name']);
      $target_dir = '../../uploadImg/'.$index.'/';
      // upload 하위 폴더(공지) 생성
      chdir('../../');
      $target_path = './uploadImg/'.$index.'/';
      if (!is_dir($target_path)) {
        mkdir($target_path, 0777, true);
      }
      chdir('./menu/notice/');

      for ($i = 0; $i < $cnt; $i++) {
        if (isset($_FILES['summerfile']['name'][$i]) && $_FILES['summerfile']['size'][$i] > 0) {
          $tmp_file =  $_FILES['summerfile']['tmp_name'][$i];
          $name = $_FILES['summerfile']['name'][$i];
          $filename = iconv("UTF-8", "EUC-KR", $_FILES['summerfile']['name'][$i]);
          $file_dir = $target_dir.$filename;
          move_uploaded_file($tmp_file, $file_dir);
        }
      }
    }else {
      echo("<script>alert('File Error');</script>");
    }
  } */

?>
