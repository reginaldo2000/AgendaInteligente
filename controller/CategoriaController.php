<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author Reginaldo
 */
require_once('../dao/CategoriaDAO.php');

class CategoriaController {
    
    private static $instance;
    private $categoriaDAO = null;
    
    public static function getInstance(){
        
        if (!self::$instance){
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    private function __construct() {
        $this->categoriaDAO = CategoriaDAO::getInstance();
    }
    
    public function cadastrar(Categoria $cat) {
        return $this->categoriaDAO->cadastrar($cat);
    }
    
    public function atualizar(Categoria $cat) {
        return $this->categoriaDAO->atualizar($cat);
    }
    
    public function deletar(Categoria $cat) {
        return $this->categoriaDAO->deletar($cat);
    }
    
    public function listar($descricao) {
        return $this->categoriaDAO->listar($descricao);
    }
}
