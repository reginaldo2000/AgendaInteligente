<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author fcrs1808
 */
require_once('../dao/UsuarioDAO.php');

class UsuarioController {

    private static $instance;
    private $usuarioDAO = null;

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->usuarioDAO = UsuarioDAO::getInstance();
    }
    
    public function logar(Usuario $usuario) {
        return $this->usuarioDAO->logar($usuario);
    }

}
