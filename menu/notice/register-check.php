<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);

//  $index = $_GET['nid'];
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

/*
  $tmp_img =  $_FILES['img_file']['tmp_name'];
  // 파일타입 및 확장자 체크
  $file_type_ext = explode("/", $_FILES['img_file']['type']);
  $file_type = $file_type_ext[0];   // 파일 타입
  $file_ext = $file_type_ext[1];    // 파일 확장자

  $ext_status = false;
  switch($file_ext){
    case 'jpeg':
  	case 'jpg':
  	case 'gif':
  	case 'bmp':
  	case 'png':
  		$ext_status = true;
  		break;
  	default:
  		echo "jpg, bmp, gif, png 외에는 업로드 불가합니다.";
  		exit;
  		break;
  }

  if($file_type == 'image'){
  	// 허용할 확장자를 jpg, bmp, gif, png로 제한
  	if($ext_status){
  		// 임시 파일 옮길 디렉토리 및 파일명
  		$resFile = "../../img/{$_FILES['imgFile']['name']}";
  		// 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
  		$imageUpload = move_uploaded_file($tempFile, $resFile);

  		// 업로드 성공 여부 확인
  		if($imageUpload == true){
  			echo "파일이 정상적으로 업로드 되었습니다. <br>";
  			echo "<img src='{$resFile}' width='100' />";
  		}else{
  			echo "파일 업로드에 실패하였습니다.";
  		}
  	}	// end if - extStatus
  		// 확장자가 jpg, bmp, gif, png가 아닌 경우 else문 실행
  	else {
  		echo "파일 확장자는 jpg, bmp, gif, png 이어야 합니다.";
  		exit;
  	}
  }	// end if - filetype
  	// 파일 타입이 image가 아닌 경우
  else {
  	echo "이미지 파일이 아닙니다.";
  	exit;
  }

  $o_name = $_FILES['img_file']['name'];
  $img_name = iconv("UTF-8", "EUC-KR", $_FILES['img_file']['name']);
  $img_dir = "../../upload/".$filename;
  move_uploaded_file($tmp_file, $file_dir);
*/



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
