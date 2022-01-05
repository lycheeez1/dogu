<?php
  $host = "db-dogu-secure.cp7xc1lpexpz.ap-northeast-2.rds.amazonaws.com";
  $user = "dogu";
  $pwd = "lycheeez1";
  $dbName = "dogu";

  $conn = mysqli_connect($host, $user, $pwd, $dbName);
  mysqli_query($conn, "set names utf8");  // 한글 깨짐 방지

  // Check connection
  if (mysqli_connect_errno()) {
    echo "[Error00] Database connection failed : " . mysqli_connect_error();
  }

  /*
  $conn = new mysqli($host, $user, $pwd, $dbName);
  $conn -> set_charset("utf8");

  // mysqli_query와 같은 동작 방식의 함수 mq
  function mq($sql) {
    global $conn;
    return $conn -> query($sql);
  } */

?>
