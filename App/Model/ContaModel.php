<?php

namespace APIBANCODIGITAL\Model;

use APIBANCODIGITAL\DAO\ContaDAO;


class ContaModel extends Model
{
   
    public $id, $numero, $tipo, $senha, $id_correntista;
    
   
    public function save()
    {
        if($this->id == null)
            (new ContaDAO())->insert($this);
        else
            (new ContaDAO())->update($this);
    }

    
    public function getAllRows()
    {
        $this->rows = (new ContaDAO())->select();
    }

    
    public function delete()
    {
        (new ContaDAO())->delete($this->id);
    }
}