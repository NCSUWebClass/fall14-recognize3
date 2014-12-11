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

//Pulls all questions from a particular gallery
$app->get('/questions/gallery/:gallery', function($gallery) use ($app, $db) {
 $questions = $db->viewQuestionsInGallery($gallery);
 $ret = [];
  foreach ($questions as $q) {
    $tmpq = [];
    $tmpq['id'] = $q['id'];
    $tmpq['img_src'] = $q['img_src'];
    $tmpq['right_answer'] = $db->getAnswer($q['answer_id']);
    $tmpq['other_answers'] = $db->getRandomAnswers($q['gallery_id']);

    $ret[] = $tmpq;
  }
  $app->render(200, [
    'questions' => $ret
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
