<?php
$sql = "SELECT * FROM articles WHERE article_topic = '$article_topic' ";
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


<div class="container" data-aos="fade-up">
  <div class="row">
    <?php for ($x = 0; $x <= $num - 1; $x++) { ?>
      <div class="col-12 col-md-4" data-aos="fade-right" data-aos-delay="100">
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