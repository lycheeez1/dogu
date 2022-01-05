<?php
  $index = $_GET['nid'];
  $attfile = $_POST['delfile'];

  $dir = '../../upload/'.$index;
  if (is_dir($dir)) {
     unlink($dir.'/'.$attfile);
  }
  echo("<scrpit>history.back();</script>");
?>
