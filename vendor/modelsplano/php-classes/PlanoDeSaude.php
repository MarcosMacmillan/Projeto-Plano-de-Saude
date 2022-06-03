<?php

namespace Plano;

class PlanoDeSaude
{

    const SESSION_ERROR = 'ERROR';

    public function createPlan($arrayInfos)
    {

        $plan = $this->searchPlan($arrayInfos['plano']);

        if(!$price = $this->searchPrices($plan->codigo, $arrayInfos['qntd'])){
            return 'Nenhum Plano Encontrado!';
        };

        return $this->formData($price, $arrayInfos['nome'], $arrayInfos['idade']);
    }

    public function searchPlan($idPlain)
    {
        $json = json_decode(file_get_contents("vendor/modelsplano/tables/plans.json"));

        foreach ($json as $value) {
            if($value->codigo == $idPlain)
                return $value;
            }
            return 'Plano não encontrado!';
    }

    public function searchPrices($planId, $qntd)
    {
        $json = json_decode(file_get_contents("vendor/modelsplano/tables/prices.json"));
        $price = false;
        foreach ($json as $value) {
            if($value->codigo == $planId){
                if($value->minimo_vidas <= $qntd){
                    $price = $value;
                }  
            }
        }
        return $price;
    }

    public function formData($price, $name, $year)
    {
        
        $data = [];
        $total = 0;
        for($i = 0 ; $i < count($name) ; $i++){
            if(!is_numeric($year[$i])){
                array_push($data, ["nome" => $name[$i], "idade" => 'Valor incorreto', "preco" => '']);
            }elseif($year[$i] <= 17){
                array_push($data, ["nome" => $name[$i], "idade" => $year[$i], "preco" => $price->faixa1]);
                $total += $price->faixa1;
            }elseif($year[$i] <= 40){
                array_push($data, ["nome" => $name[$i], "idade" => $year[$i], "preco" => $price->faixa2]);
                $total += $price->faixa2;
            }
            else{
                array_push($data, ["nome" => $name[$i], "idade" => $year[$i], "preco" => $price->faixa3]);
                $total += $price->faixa3;
            }
        }
        array_push($data, ['valor' => $total]);
        return json_encode($data);
    }

    public static function setMsgErro($msg)
    {
        $_SESSION[PlanoDeSaude::SESSION_ERROR] = $msg;
    }

    public static function getMsgError()
    {
        $msg = (isset($_SESSION[PlanoDeSaude::SESSION_ERROR])) ? $_SESSION[PlanoDeSaude::SESSION_ERROR] : '';

        PlanoDeSaude::clearMsgError();

        return $msg;
    }

    public static function clearMsgError()
    {
        $_SESSION[PlanoDeSaude::SESSION_ERROR] = NULL;
    }
    
}

?>