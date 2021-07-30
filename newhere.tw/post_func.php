<?php
require_once('config.php');
require_once('includes/head.php');

$article_cover_photo = $_REQUEST['article_cover_photo'];
$article_name = $_REQUEST['article_name'];
$article_body = $_REQUEST['article_body'];
$article_profile_pic = $_REQUEST['article_profile_pic'];
$article_author = $_REQUEST['article_author'];
$article_author_description = $_REQUEST['article_author_description'];
$article_topic = $_REQUEST['article_topic'];
$sql = "SELECT * FROM articles WHERE article_topic = '$article_topic'";
$result = mysqli_query($conn, $sql);
$num = 0;
while ($row = $result->fetch_assoc()) {
  $article_topic_ids[] = $row['article_topic_ids'];
  $num++;
}
$next_id = ($article_topic_ids[$num-1] + 1);
$article_slug = $article_topic . '/'. $next_id;
$sql = "INSERT INTO articles VALUES(null, '$article_cover_photo', '$article_name', '$article_profile_pic', '$article_author', '$article_author_description', '$article_topic', ,'$next_id', '$article_slug', '0', now())";
?>
<title>New Here | Post</title>
</head>

<body>
  <?php require_once('includes/header.php') ?>
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <?php

      if ($article_body != null && $article_topic != null && mysqli_query($conn, $sql)) {
      ?>
        <h3>發布成功</h3><a href='/post.php'> <button class='btn btn-primary'>回發文器</button> </a>
        <a href='/<?php echo ($article_topic) ?>'> <button class='btn btn-primary'>看分類結果</button></a>
        <a href='/<?php echo ($article_slug) ?>'> <button class='btn btn-primary'>看文章結果</button></a>
        <a href='../'> <button class='btn btn-primary'>回主頁</button></a>
      <?php
        echo nl2br("\n 標題：$article_name \n分類：$article_topic \n 文章連結：newhere.tw/$article_slug  ");

        $article = $article_slug . ".php"; // or .php   
        $fh = fopen($article, 'w'); // or die("error");  
        $stringData = '<?php
require_once("../config.php");
$article_slug = "' . $article_slug . '";
require_once("../includes/views.php");
require_once("../includes/head.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
</head>

<body>
  <?php require_once("../includes/header.php") ?>
  <div class="container">
    <div class="row" id="row_style">
      <div class="container postbox">
          <h1 id="live_title" class="live_title">' . $article_name . '</h1>
          <div id="editor">
          ' . $article_body . '
          </div>
          <?php require_once("../includes/post_end.php") ?>
          <div class="form-group row" id="row_style">
            <div class="col-3" style="align-items: right;">
              <div class="circle">
                <img id="profile-pic" class="profile-pic" name="profile-pic" src="' . $article_profile_pic . '">
              </div>
            </div>
            <div class="col-9" style="text-align: left;">
              <p id="live_author" class="live_author">' . $article_author . '</p>
              <p id="live_authorDescription" class="live_authorDescription">' . $article_author_description . '</p>
            </div>
          </div>
      </div>
    </div>
  </div>
  <?php require_once("../includes/footer.php") ?>
        ';
        fwrite($fh, $stringData);
        fclose($fh);
      } else {
      ?>
        <h3>發布失敗！</h3><a href="/post.php"> <button class="btn btn-primary">回發文器</button></a><br>
        錯誤訊息:<br>
      <?php
        if (empty($article_body)) {
          echo ("尚未填內容<br>");
        }
        if (empty($article_topic)) {
          echo ("尚未填非類<br>");
        }
        echo (mysqli_error($conn));
      }
      mysqli_close($conn);
      ?>
    </div>
  </div>
  <?php require_once('includes/footer.php') ?>