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

    public function getHistorico($descricao) {
        return $this->agendaDAO->getHistorico($descricao);
    }
    
    public function verificar(Agenda $agenda) {
        return $this->agendaDAO->verificaChoqueAgenda($agenda);
    }
    
    public function verificaSugestoes($data, $hora) {
        return $this->agendaDAO->verificaSugestoes($data, $hora);
    }
    
    public function verificaHorariosProximos($data) {
        return $this->agendaDAO->verificaHorariosProximos($data);
    }

}
