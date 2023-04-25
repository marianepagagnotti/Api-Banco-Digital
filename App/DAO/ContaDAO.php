<?php

namespace APIBANCODIGITAL\DAO;

use APIBANCODIGITAL\Model\ContaModel;


class ContaDAO extends DAO
{
   
    public function __construct()
    {
        parent::__construct();       
    }

    
    public function select()
    {
        $sql = "SELECT * FROM conta";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    
    public function insert(ContaModel $m) : ContaModel
    {
        $sql = "INSERT INTO conta (numero, tipo, senha, id_correntista) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->numero);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->senha);
        $stmt->bindValue(4, $m->id_correntista);
        
        $m->id = $this->conexao->lastInsertId();

        return $m;

    }

    public function update(ContaModel $m)
    {
        $sql = "UPDATE conta SET numero= ?, tipo= ?, senha= ? id_correntista= ? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->numero);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->senha);
        $stmt->bindValue(4, $m->id_correntista);
        $stmt->bindValue(5, $m->id);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM conta WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}