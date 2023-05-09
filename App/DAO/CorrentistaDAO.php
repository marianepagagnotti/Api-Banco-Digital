<?php

namespace APIBANCODIGITAL\DAO;

use APIBANCODIGITAL\Model\CorrentistaModel;
use APIBANCODIGITAL\Controller\Controller;
use Exception;
use PDOException;


class CorrentistaDAO extends DAO
{
   
    public function __construct()
    {
        parent::__construct();       
    }

    
    public function select()
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    
    public function insert(CorrentistaModel $m) : CorrentistaModel
    {
        $sql = "INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);
        $stmt->execute();

        $m->id = $this->conexao->lastInsertId();

        return $m;

    }

    public function update(CorrentistaModel $m)
    {
        $sql = "UPDATE correntista SET nome= ?, cpf= ?, data_nasc= ?, senha= ? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);
        $stmt->bindValue(5, $m->id);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function search(string $query) : array
    {
        $str_query = ['filtro' => '%' . $query . '%'];

        $sql = "SELECT * FROM correntista WHERE nome LIKE :filtro ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($str_query);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "APIBANCODIGITAL\Model\CorrentistaModel");
    }

    public function selectByCPFandSenha(string $cpf, string $senha)
    {
        $sql = "SELECT * FROM Correntista WHERE cpf = ? AND senha = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);

        $stmt->execute();

        return $stmt->fetchObject("APIBANCODIGITAL\Model\CorrentistaModel");
    }
}