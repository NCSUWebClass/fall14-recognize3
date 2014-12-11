<?php
require 'vendor/autoload.php';
require 'Database.php';

$app = new \Slim\Slim();
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());
$db = new Database();

//Pulls information about all galleries
$app->get('/galleries', function() use ($app, $db) {
  $galleries = $db->viewGalleries();
  $g = [];
  foreach ($galleries as $gallery) {
    $g[] = $gallery['name'];
  }
  $app->render(200, [
    'galleries' => $g
  ]);
});

//Pulls information about a particular gallery 
$app->get('/gallery/:gallery', function($gallery) use ($app, $db) {
 $gallery = $db->viewGallery($gallery);
  $g = [];
  foreach ($gallery as $gy) {
    $g["Name"] = $gy['name'];
	$g["Description"] = $gy['description'];
  }
  $app->render(200, [
    'gallery' => $g
  ]);
});

//Pulls all questions
$app->get('/questions', function() use ($app, $db) {
 $questions = $db->viewQuestions();
 $g = [];
  foreach ($questions as $question) {
    $g[] = $question['img_src'];
  }
  $app->render(200, [
    'questions' => $g
  ]);
});

//Pulls information about a particular gallery 
$app->get('/question/:id', function($id) use ($app, $db) {
 $gallery = $db->viewQuestion($id);
  $g = [];
  foreach ($gallery as $gy) {
    $g[] = $gy['img_src'];
  }
  $app->render(200, [
    'gallery' => $g
  ]);
});

$app->run();
