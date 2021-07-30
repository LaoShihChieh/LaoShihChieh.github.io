<?php
$sql = "SELECT views FROM articles WHERE article_slug = '$article_slug'";
$views =  (int)mysqli_query($conn, $sql);
$views++;
$sql = "UPDATE articles SET views = '$views' WHERE article_slug = '$article_slug'";
mysqli_query($conn, $sql);
?>