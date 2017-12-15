<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author fcrs1808
 */
require_once('../connection/ConectaDB.php');

class UsuarioDAO {

    private static $instance;
    private $con = null;
    private $table = "agend_usuarios";

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->con = ConectaDB::getConnection();
    }
    
    public function logar(Usuario $usuario) {
        $sql = "SELECT * FROM $this->table WHERE usuario = :user AND senha = :pass";
        $st = $this->con->prepare($sql);
        $st->bindValue(':user', $usuario->getUsuario());
        $st->bindValue(':pass', $usuario->getSenha());
        $st->execute();
        if($st->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}











