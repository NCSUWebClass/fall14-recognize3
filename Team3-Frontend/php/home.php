<?php
$active_title = "Home";

function get_galleries(){
  $galleries = json_decode(file_get_contents('http://localhost/Team3-Recognize/galleries'), true);

  foreach($galleries['galleries'] as $gallery){

    echo "<a href=\"../php/question.php?id=";
    echo $gallery['id'];
    echo "\" class=\"list-group-item\">";
    echo "<span class=\"badge\">";
    echo "10 Questions"; //$gallery['count'] . " Questions";
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
