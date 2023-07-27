<?php

namespace App\DAO;

use App\Model\ContaModel;
use Exception;
use PDOException;


class ContaDAO extends DAO
{
     /**
     * Método construtor, sempre chamado na classe quando a classe é instanciada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new PessoaDAO();
     */
    public function __construct()
    {
        
        parent::__construct();       
    }


    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    public function insert(ContaModel $model) : ?ContaModel
    {
        
        $sql = "INSERT INTO conta 
                            (id_correntista, saldo, limite, tipo) 
                VALUES 
                            (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->id_correntista);
        $stmt->bindValue(2, $model->saldo);
        $stmt->bindValue(3, $model->limite);
        $stmt->bindValue(4, $model->tipo);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }





    /**
     * Método que retorna todas os registros da tabela pessoa no banco de dados.
     */
    public function select(int $id_cidadao)
    {
        $sql = "SELECT * FROM Reclamacao WHERE id_cidadao = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_cidadao);
        $stmt->execute();

      
        return $stmt->fetchAll(DAO::FETCH_CLASS);        
    }


   
}