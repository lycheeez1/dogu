<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  header("Content-Type:text/html; charset=UTF-8");

  session_start();

  if(!isset($_SESSION['ADMIN'])) {
    echo("<script>
            alert('글 수정 권한이 없습니다.');
            location.href='../../authentication/login.html';
          </script>");
  }

  include ("../../authentication/dbconn.php");


  $index = $_GET['nid'];
  $sql = "SELECT * FROM notice WHERE NID='$index'";
  $res = mysqli_query($conn, $sql);
  $notice = mysqli_fetch_assoc($res);
  $title = $notice['NTITLE'];
  $body = $notice['NBODY'];
  $file = $notice['NFILE'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공지사항 등록</title>
  <!-- include libraries(jQuery, bootstrap) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        lang: 'ko-KR',
        height: 300,
        minHeight: null,
        maxHeight:null,
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert', ['picture', 'link']]
        ]
      });

      $("#btn-tolist").click(function(){
        location.href='../noticeList.php';
      });

      $(".del-check").click(function(){
//	if ($(".del-check").attr("checked")){
//	  alert("check success");
 //         $(".del-span").css("text-decoration":"line-through");
//	}
      });
    });

 //   function is_checked(
    
  </script>
  <style type="text/css">
    @font-face {
        font-family: 'NanumSquareRound';
        src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_two@1.0/NanumSquareRound.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
    body {
      text-align: center;
      font-family: 'NanumSquareRound';
    }
    .form-area {
      margin: 5% 5% 0 5%;
    }
    #register-btn {
      width: 100px;
      margin:0;
      padding: 8px 10px;
      font-size: 12pt;
    }
    #register-btn:hover {
      background-color: #7fd87d;
      color: white;
    }
    input[type=file]:hover {
      cursor:pointer
    }
    .file-cont {
      margin:0 5% 5% 5%;
      text-align:left;
      color: #525252;
    }
  </style>
</head>
<body>
  <h4>공지사항 등록</h4>
  <button class="btn contact-btn" id="btn-tolist" style="float:left;margin-left:10%">&lt; 목록으로</button>
  <div class="form-area">
    <form name="form1" method="POST" enctype="multipart/form-data" action="modify-check.php">
      <div class="form-area">
        <div>
          <input type="hidden" name="idx" value="<?=$_GET['nid']?>"/>
          <input type="text" class="form-control" name="title" value="<?=$title;?>" required>
          <textarea id="summernote" name="body" required><?=$body;?></textarea>
          <input type="file" name="attached_file[]" multiple>
        </div>
	<button type="submit" class="btn contact-btn" id="register-btn">submit</button>
      </div>
      <div class="file-cont"> <!--
        <p>* The [Remove file] function is not optimized yet. *</p> -->
          <?php
  	    $dir = '../../upload/'.$index;
  	    if (is_dir($dir)) {
               $scan_dir = scandir($dir);
               $cnt = count($scan_dir);
               for ($i = 2; $i < $cnt; $i++) {
                  $attfile_name = $scan_dir[$i];
          ?> 
	<input type="checkbox" class="del-check" name="del-check[]" value="<?=$attfile_name?>"/>
        <span class="del-span"><?=$attfile_name?></span> <br>
	  <?php
		  }
               } 
          ?>
      </div>
    </form>
   </div>
   <!-- end of file-cont --> 
</body>
</html>
