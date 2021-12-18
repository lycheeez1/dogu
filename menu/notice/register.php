<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
  session_start();

  if(!isset($_SESSION['ADMIN'])) {
    echo("<script>
            alert('글 작성 권한이 없습니다.');
            location.href='../noticeList.php';
          </script>");
  }
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
        /*
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert', ['picture', 'link', 'video']]
        ]*/
      });

      $(function(){
        $("#register-btn").click(function(){
          var summernoteContent = $('#summernote').summernote('code');
//          alert(summernoteContent);
        });
      });

      $("#btn-tolist").click(function(){
        location.href='../noticeList.php';
      });
    });


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
      margin: 5%;
    }
    #register-btn {
      width: 100px;
      margin-top: 10px;
      padding: 10px;
      font-size: 12pt;
    }
    #register-btn:hover {
      background-color: #7fd87d;
      color: white;
    }
    input[type=file]:hover {
      cursor:pointer
    }
  </style>
</head>
<body>
  <h3>공지사항 등록</h3>
  <button class="btn contact-btn" id="btn-tolist" style="float:left;margin-left:10%">&lt; 목록으로</button>
  <div class="form-area">
    <form method="POST" enctype="multipart/form-data" action="register-check.php">
      <input type="hidden" name="imgUrl" id="imgUrl" value="">
      <input type="hidden" name="attachFile" id="attachFile" value="">
      <div class="form-area">
        <div>
          <input type="text" class="form-control" placeholder="제목" name="title" required>
          <textarea id="summernote" name="body" required></textarea>
          <input type="file" value="1" name="attached_file" />
        </div>
    </div>
    <button type="submit" class="btn contact-btn" id="register-btn">등록</button>
    </form>
  </div>
</body>
</html>
