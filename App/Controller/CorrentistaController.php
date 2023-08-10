<?php

namespace App\Controller;

use App\Model\CorrentistaModel;
use Exception;


    class CorrentistaController extends Controller
{
    public static function login()
    {
        try
        {
           
            $data = json_decode(file_get_contents('php://input'));

            
            $model = new CorrentistaModel();

           
            parent::getResponseAsJSON($model->getByCpfAndSenha($data->cpf, $data->senha)); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }  
    }

    
    public static function salvar() : void
        {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
            $model->nome = $json_obj->nome;
            $model->cpf = $json_obj->cpf;
            $model->data_nasc = $json_obj->data_nasc;
            $model->senha = $json_obj->senha;

            parent::getResponseAsJSON($model->save());
              
        } catch (Exception $e) {
            echo "DEU ERRO: " . $e->getMessage();
            parent::getExceptionAsJSON($e);
        }
}
}
