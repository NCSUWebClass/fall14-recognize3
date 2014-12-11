<?php
$active_title = "Home";

function get_galleries(){
  $galleries = json_decode(file_get_contents('http://localhost/Team3-Recognize/galleries'), true);

  foreach($galleries['galleries'] as $gallery){

    echo "<a href=\"../php/question.php?gallery=";
    echo $gallery['name'];
    echo "\" class=\"list-group-item\">";
    echo "<span class=\"badge\">";
    echo "10"; //$gallery['count'];
    echo "</span>";
    echo $gallery['description'];
    echo "</a>";
    echo "\n";
  }
}


include './header.php';
include '../content/header.html';
include '../content/home.html';
include '../content/footer.html';
?>
