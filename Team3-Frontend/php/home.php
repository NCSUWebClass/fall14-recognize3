<?php
$active_title = "Home";

function get_galleries(){
  $galleries = json_decode(file_get_contents('http://localhost/Team3-Recognize/galleries'));

  foreach($galleries['galleries'] as $gallery){
    echo "<a href=\"../php/question.php?=";
    echo $gallery['name'];
    echo " class=\"list-group-item\">";
    echo $gallery['desc'];
    echo  "</a>";
  }
}


include './header.php';
include '../content/header.html';
include '../content/home.html';
include '../content/footer.html';
?>
