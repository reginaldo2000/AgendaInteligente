<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaDAO
 *
 * @author Reginaldo
 */
require_once('../connection/ConectaDB.php');

class CategoriaDAO {

    private $table = "agend_categorias";
    private static $instance;
    private $con;

    public static function getInstance(){
        
        if (!self::$instance){
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    private function __construct() {
        $this->con = ConectaDB::getConnection();
    }

    public function cadastrar(Categoria $categoria) {
        try {
            $sql = "INSERT INTO $this->table (descricao) VALUES(:desc)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':desc', $categoria->getDescricao());
            $stmt->execute();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
    
    public function atualizar(Categoria $categoria) {
        try {
            $sql = "UPDATE $this->table SET descricao = :desc WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':desc', $categoria->getDescricao());
            $stmt->bindValue(':id', $categoria->getId());
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public function deletar(Categoria $cat) {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':id', $cat->getId());
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public function listar($descricao) {
        $sql = "SELECT * FROM $this->table WHERE descricao LIKE :desc";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':desc', '%'.$descricao.'%');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
