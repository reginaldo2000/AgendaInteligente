<?php

include_once ('../dao/PesoDAO.php');
include_once ('../model/Peso.php');

class PesoController {

    private static $instance;
    private $pesoDAO = null;

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        $this->pesoDAO = PesoDAO::getInstance();
    }

    public function cadastrar(Peso $peso){
        return $this->pesoDAO->cadastrar($peso);
    }
    
    public function deletar(Peso $peso){
        return $this->pesoDAO->deletar($peso);
    }
    
    public function listar($descricao){
        return $this->pesoDAO->listar($descricao);
    }
    
    public function atualizar(Peso $peso){
        return $this->pesoDAO->atualizar($peso);
    }
}
