<?php

include_once ('../model/Peso.php');

class PesoDAO {

    private static $instance;
    private $con = null;
    private $table = "agend_peso";

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->con = ConectaDB::getConnection();
    }

    public function cadastrar(Peso $peso) {
        try {
            $sql = "INSERT INTO $this->table (valor, descricao) VALUES (:valor, :descricao)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":valor", $peso->getValor());
            $stmt->bindValue(":descricao", $peso->getDescricao());
            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            $ex->getMessage();
            return false;
        }
    }

    public function deletar(Peso $peso) {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":id", $peso->getId());
            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            $ex->getMessage();
            return false;
        }
    }

    public function listar($descricao) {
        try {
            $sql = "SELECT * FROM $this->table WHERE descricao LIKE :desc";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':desc', '%' . $descricao . '%');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    public function atualizar(Peso $peso) {
        try {
            $sql = "UPDATE $this->table SET valor = :valor, "
                    . "descricao = :desc "
                    . "WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(":valor", $peso->getValor());
            $stmt->bindValue(':desc', $peso->getDescricao());
            $stmt->bindValue(":id", $peso->getId());
            
            return true;
        } catch (Exception $ex) {
            $ex->getMessage();
            return false;
        }
    }

}
