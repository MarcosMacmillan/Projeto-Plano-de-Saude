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

    private function searchPlan($idPlain)
    {
        $json = json_decode(file_get_contents("vendor/modelsplano/tables/plans.json"));

        foreach ($json as $value) {
            if($value->codigo == $idPlain)
                return $value;
            }
            return 'Plano não encontrado!';
    }

    private function searchPrices($planId, $qntd)
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

    private function formData($price, $name, $year)
    {
        $data = array(
            "pessoas" => array(),
            "total" => array()
        );
        $total = 0;
        for($i = 0 ; $i < count($name) ; $i++){
            if(!is_numeric($year[$i])){
                array_push($data["pessoas"], ["nome" => $name[$i], "idade" => 'Valor incorreto', "preco" => '']);
            }elseif($year[$i] <= 17){
                array_push($data["pessoas"], ["nome" => $name[$i], "idade" => $year[$i], "preco" => number_format($price->faixa1, 2, ",", ".")]);
                $total += $price->faixa1;
            }elseif($year[$i] <= 40){
                array_push($data["pessoas"], ["nome" => $name[$i], "idade" => $year[$i], "preco" => number_format($price->faixa2, 2, ",", ".")]);
                $total += $price->faixa2;
            }
            else{
                array_push($data["pessoas"], ["nome" => $name[$i], "idade" => $year[$i], "preco" => number_format($price->faixa3, 2, ",", ".")]);
                $total += $price->faixa3;
            }
        }
        array_push($data["total"], ['valor' => number_format($total, 2, ",", ".")]);
        return $data;
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