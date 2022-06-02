<?php 

require_once ("vendor/autoload.php");
use \Plano\Page;

$app = new \Slim\Slim();

$app->get('/', function ()  {

	$json = file_get_contents("vendor/modelsplano/tables/plans.json");

	$page = new Page();
	$page->setTpl("form", [
			'json2' => json_decode($json)
		]);


});

$app->post('/enviar', function ()  {

	foreach ($_POST as $key => $value) {
		if($value[0] == ''){
			header("Location: /");
			exit;
		}
	}

	$json = file_get_contents("vendor/modelsplano/tables/plans.json");
	$json2 = json_decode($json);
	// echo json_encode($_POST);

	foreach ($json2 as $value) {
		// if($value->codigo == $_POST['plano'])
			// var_dump($value);
	}

});

$app->run();


?>