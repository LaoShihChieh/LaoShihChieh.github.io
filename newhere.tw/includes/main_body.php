<?php
$sql = "SELECT * FROM articles";
$result = mysqli_query($conn, $sql);
$num = 0;
while ($row = $result->fetch_assoc()) {
  $num++;
  $article_names[] = $row['article_name'];
  $article_slugs[] = $row['article_slug'];
  $article_cover_photos[] = $row['article_cover_photo'];
}
mysqli_close($conn);
?>

<div id="demo" class="box carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
      <div class="carousel-item active">
        <a href="https://supr.link/Cnrp6">
          <img src="uploads/line.jpg" alt="">
        </a>
      </div>
      <div class="carousel-item">
        <a href="https://supr.link/Qs8G4">
          <img src="uploads/fb.jpg" alt="">
        </a>
      </div>
  </div>
</div>

<div class="section-title section-title-border">
  <h1><span class="main-underline">精選文章</span></h1>
  <h2><a href="../campus">懂學校</a> • <a href="../learn">懂學習</a> • <a href="../management">懂管理</a> • <a href="../lifestyle">懂生活</a></h2>
</div>
<div class="container" data-aos="fade-up">
  <div class="row">
    <?php for ($x = $num - 1; $x >= $num - 8; $x--) { ?>
      <div class="col-12 col-md-3" data-aos="fade-right" data-aos-delay="100">
        <a href="../<?php echo ($article_slugs[$x]) ?>">
          <img src="<?php echo ($article_cover_photos[$x]) ?>" class="img-fluid" alt="<?php echo ($article_cover_photos[$x]) ?>">
          <h3 class="article_name"><?php echo ($article_names[$x]) ?></h3>
          <p class="font-italic">
          </p>
        </a>
      </div>
    <?php } ?>
  </div>
</div>