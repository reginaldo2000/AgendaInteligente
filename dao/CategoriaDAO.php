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
    private $instance = null;
    private $con;

    function __construct() {
        $this->con = ConectaDB::getConnection();
    }

    public static function getInstance() {
        return new CategoriaDAO();
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

}
