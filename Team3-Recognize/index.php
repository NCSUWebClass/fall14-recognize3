<?php
require 'vendor/autoload.php';
require 'Database.php';

$app = new \Slim\Slim();
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());
$db = new Database();

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

$app->get('/gallery/:gallery', function($gallery) use ($app, $db) {
  // TODO: fetch this from the DB
  $app->render(200, [
    'gallery' => [
        'name' => $gallery,
        'images' => [
          [
            'title' => 'Image Title',
            'description' => 'Foo',
            'url' => 'http://bla/',
          ],
        ]
    ]
  ]);
});

$app->run();
