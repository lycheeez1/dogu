<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();

  if(!isset($_SESSION['ADMIN'])) {
    echo("<script>
            alert('글 삭제 권한이 없습니다.');
            location.href='http://dogu.or.kr';
          </script>");
    exit();
  }

  include ("../../authentication/dbconn.php");
  
  $sql = "SELECT * FROM notice ORDER BY NID DESC LIMIT 1";
  $res = mysqli_query($conn, $sql);
  $notice = mysqli_fetch_assoc($res);
  $nid = $notice['NID'];
  if (!isset($notice['NID'])) {
    $index = 1;
  } 
  else {
    $index = $notice['NID'] + 1;
  }
  
  $idx = $_GET['nid'];
  $target_dir = '/home/project/dogu/upload/'.$idx;     //absolute path
  $target_dir2 = '/home/project/dogu/uploadImg/'.$idx;
  
  function unlink_all($dir) {
    $handle = opendir($dir);
    while ($file = readdir($handle)) {
      unlink($dir.'/'.$file);
    }
    closedir($handle);
  }
  
  $sql = "DELETE FROM notice WHERE NID='$idx'";
  $res = mysqli_query($conn, $sql);
  if ($res) {
    if (is_dir($target_dir)) {
      unlink_all($target_dir);
    }
    if (is_dir($target_dir2)) {
      unlink_all($target_dir2);
    }
    echo("<script>
            alert('공지가 삭제되었습니다.');
            location.href='../noticeList.php';
          </script>");
    $sql2 = "ALTER TABLE notice AUTO_INCREMENT=$nid";
    mysqli_query($conn, $sql2);
  }
  else {
    echo("<script>
	    alert('Fail');
            location.href='../noticeList.php';
          </script>");
  }
?>
