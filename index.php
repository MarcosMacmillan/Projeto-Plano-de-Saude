<?php 

require_once ("vendor/autoload.php");
use \Plano\Page;

$app = new \Slim\Slim();

$app->get('/', function ()  {

	$page = new Page();
	$page->setTpl("form");
    
});

$app->post('/enviar', function ()  {

	echo json_encode($_POST['nome']);
});


$app->run();


?>