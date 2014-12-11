<?php
$active_title = "Question";
$gallery_name = "hello";

include './header.php';
include '../content/header.html';

if(!empty($_GET["answer"]) && !empty($_GET["question"])){
  $answer = htmlspecialchars($_GET["answer"]); // Answer
  $question = htmlspecialchars($_GET["question"]); // Question


  if(($answer) && ($question)){
    if($answer === $question){
      echo "<div class=\"container\">";
      echo "<div class=\"alert alert-success\" role=\"alert\">";
      echo "<p class=\"lead\">Correct!</p>";
      echo "</div>";
      echo "</div>";
    }
    else{
      echo "<div class=\"container\">";
      echo "<div class=\"alert alert-danger\" role=\"alert\">";
      echo "<p class=\"lead\">Incorrect!</p>";
      echo "</div>";
      echo "</div>";
    }
  }
}


function build_question(){
  $id = htmlspecialchars($_GET["id"]); // Gallery ID
  $_SESSION['current_q'] = $_SESSION['current_q'] + 1;
  $cq = $_SESSION['current_q'];

  echo "<code>$cq</code>";

  if (!isset($_SESSION['cache'])) {
    $gallery = json_decode(file_get_contents('http://localhost/Team3-Recognize/questions/gallery/'.$id), true);
    $_SESSION['cache'] = $gallery;
  }
  else {
    $gallery = $_SESSION['cache'];
  }



  //var_dump($gallery);
  $answer_1 = $gallery['questions'][$cq]['right_answer']['id'];
  $answer_2 = $gallery['questions'][$cq]['other_answers'][0]['id'];
  $answer_3 = $gallery['questions'][$cq]['other_answers'][1]['id'];

  $answer_1_img = $gallery['questions'][$cq]['right_answer']['img_src'];
  $answer_2_img = $gallery['questions'][$cq]['other_answers'][0]['img_src'];
  $answer_3_img = $gallery['questions'][$cq]['other_answers'][1]['img_src'];

  //$questions = json_decode(file_get_contents('http://localhost/Team3-Recognize/gallery/'.$id), true);
  echo "<div class=\"panel panel-primary\">";
    echo "<div class=\"panel-heading\">";
      echo "<h3 class=\"panel-title\">Here's a picture</h3>";
    echo "</div>";
      echo "<div class=\"panel-body\">";
      echo "<p class=\"text-center\">";
      echo "<img  width=\"200px\" src=\"";
      echo $answer_1_img;
      echo "\">";
      echo "</p>";
    echo "</div>";
  echo "</div>";
  echo "<hr>";

  echo "<h3>What does it match?</h3>";
  echo "<a href=\"./question.php?id=".$id."&answer=".$answer_1."&question=".$answer_1."\" class=\"thumbnail\">";
  echo "<img  width=\"200px\" src=\"";
  echo $answer_1_img;
  echo "\">";
  echo "</a>";
  echo "<a href=\"./question.php?id=".$id."&answer=".$answer_2."&question=".$answer_1."\" class=\"thumbnail\">";
  echo "<img width=\"200px\" src=\"";
  echo $answer_2_img;
  echo "\">";
  echo "</a>";
  echo "<a href=\"./question.php?id=".$id."&answer=".$answer_3."&question=".$answer_1."\" class=\"thumbnail\">";
  echo "<img  width=\"200px\" src=\"";
  echo $answer_3_img;
  echo "\">";
  echo "</a>";
}


include '../content/question.html';
include '../content/footer.html';
?>
