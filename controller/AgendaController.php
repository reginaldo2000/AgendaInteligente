<?php

require_once('../dao/AgendaDAO.php');
class AgendaController {

    private static $instance;
    private $agendaDAO = null;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->agendaDAO = AgendaDAO::getInstance();
    }
    
    public function cadastrar(Agenda $agenda) {
        return $this->agendaDAO->cadastrar($agenda);
    }

}
