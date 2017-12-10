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
    
    private $categoriaDAO = null;
    
    function __construct() {
        $this->categoriaDAO = CategoriaDAO::getInstance();
    }
    
    public function cadastrar(Categoria $cat) {
        return $this->categoriaDAO->cadastrar($cat);
    }
}
