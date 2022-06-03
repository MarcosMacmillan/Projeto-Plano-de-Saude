<?php 

require_once ("vendor/autoload.php");
use \Plano\Page;
use \Plano\PlanoDeSaude;

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
		if($key == "qntd" && $value[0] == ''){
			PlanoDeSaude::setMsgErro('Por favor, indique a quantidade de beneficiários');
			return 'Por favor, indique a quantidade de beneficiários';
		}
		if($key == "plano" && $value[0] == ''){
			PlanoDeSaude::setMsgErro('Por favor, indique um plano');
			return 'Por favor, indique um plano';
		}
		if($key == "nome" && !isset($value[0])){
			PlanoDeSaude::setMsgErro('Por favor, indique um nome');
			return 'Por favor, indique um nome';
		}
		if($key == "idade" && !isset($value[0])){
			PlanoDeSaude::setMsgErro('Por favor, indique a idade');
			return 'Por favor, indique a idade';
		}
	}

	$infos = new PlanoDeSaude();
	$plan = $infos->createPlan($_POST);
	$page = new Page();
	$page->setTpl("send", [
			'pessoas' => $plan["pessoas"],
			'total' => $plan["total"][0],
			'msgError' => PlanoDeSaude::getMsgError()
	]);

	$arquivo = 'proposta.json';
	$json = json_encode($plan);
	$file = fopen(__DIR__ . '/' . $arquivo,'w+');
	fwrite($file, $json);
	fclose($file);

});

$app->run();
?>