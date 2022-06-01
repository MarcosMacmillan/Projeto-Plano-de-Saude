<?php 

require_once ("vendor/autoload.php");

$app = new \Slim\Slim();

$app->get('/', function () use($app) {
    $app->render('');
});
$app->run();


?>