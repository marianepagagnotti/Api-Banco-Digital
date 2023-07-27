<?php

namespace App\Controller;

use App\Model\ContaModel;
use Exception;


class ContaController extends Controller
{
    public static function abrir()
    {

    }

    public static function fechar()
    {
        
    }

    public static function extrato()
    {
        
    }





    /**
     * Os métodos index serão usados para devolver uma View.
     * Para saber mais sobre métodos estáticos, leia: https://www.php.net/manual/pt_BR/language.oop5.static.php
     */
    public static function index()
    {      
        //$model = new ContaModel(); // Instância da Model
        //$model->getAllRows(); // Obtendo todos os registros, abastecendo a propriedade $rows da model.

        /**
         * O método getResponseAsJSON devolve uma string JSON formatada e pronta para ser
         * consumida pela chamada.
         * Recebe como parâmetro o element PHP a ser convertido para JSON, neste caso um
         * array de objetos
         */
        //parent::getResponseAsJSON($model->rows);
    }
}