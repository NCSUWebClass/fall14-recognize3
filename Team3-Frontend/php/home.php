<?php
$active_title = "Home";

function get_galleries(){
  $galleries = json_decode(file_get_contents('http://localhost/Team3-Recognize/galleries'), true);
  unset($_SESSION['cache']);
  $_SESSION['current_q'] = 0;

  foreach($galleries['galleries'] as $gallery){

    echo "<a href=\"../php/question.php?id=";
    echo $gallery['id'];
    echo "\" class=\"list-group-item\">";
    echo "<span class=\"badge\">";
    echo "N Questions";
    echo "</span>";
    echo "<b>" . $gallery['name']. ":</b> " . $gallery['description'];
    echo "</a>";
    echo "\n";
  }
}

include './header.php';
include '../content/header.html';
include '../content/home.html';
include '../content/footer.html';
?>
