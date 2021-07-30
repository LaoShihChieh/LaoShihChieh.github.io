<?php
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);
$num = 0;
while ($row = $result->fetch_assoc()) {
  $num++;
  $intros[] = $row['intro'];
  $links[] = $row['link'];
  $images[] = $row['image'];
  $created_ats[] = $row['created_at'];
}
mysqli_close($conn);
?>

<div id="demo" class="box carousel slide" data-ride="carousel">
  <div class="container" data-aos="fade-up">
    <div class="carousel-inner">
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
      <div class="carousel-item active">
        <a href="<?php echo ($links[$num - 1]) ?>">
          <img src="../assets/img/<?php echo ($intros[$num - 1]) ?>.jpg" alt="<?php echo ($intros[$num - 1]) ?>">
        </a>
      </div>
      <?php for ($x = $num - 2; $x >= $num - 4; $x--) { ?>
        <div class="carousel-item">
          <a href="<?php echo ($links[$x]) ?>">
            <img src="../assets/img/<?php echo ($intros[$x]) ?>.jpg" alt="<?php echo ($intros[$x]) ?>">
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="section-title">
  <h3>好文推薦</h3>
</div>
<div class="container" data-aos="fade-up">
  <div class="row">
    <?php for ($x = $num - 1; $x >= $num - 4; $x--) { ?>
      <div class="col-12 col-md-6" data-aos="fade-right" data-aos-delay="100">
        <a href="<?php echo ($links[$x]) ?>">
          <img src="../assets/img/<?php echo ($intros[$x]) ?>.jpg" class="img-fluid" alt="<?php echo ($intros[$x]) ?>">
          <h2><?php echo ($intros[$x]) ?></h2>
          <p class="font-italic">
          </p>
        </a>
      </div>
    <?php } ?>
  </div>
</div>