<?php
session_start();
$res = session_destroy(); //모든 세션 변수 지우기
if($res) {
  echo("<script>
          alert('로그아웃되었습니다.');
          history.back();
        </script>");
}
?>
