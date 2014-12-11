<?php
require 'vendor/autoload.php';
require 'Database.php';

$app = new \Slim\Slim();
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());
$db = new Database();

$app->get('/galleries', function() use ($app) {

  $app->render(200, [
    'galleries' =>
      [
        'famous-mustaches',
        'common-fruits',
        'computer-programmers',
        'soccer-players',
      ]
  ]);
});

$app->get('/gallery/:gallery', function($gallery) use ($app) {
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
