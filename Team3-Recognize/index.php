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
  $returnObj = [];
  foreach ($galleries as $gallery) {
	$g = [];
    $g['id'] = $gallery['id'];
	$g['name'] = $gallery['name'];
	$g['description'] = $gallery['description'];
	$returnObj[] = $g;
  }
  $app->render(200, [
    'galleries' => $returnObj
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

//Pulls information for particular question 
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
