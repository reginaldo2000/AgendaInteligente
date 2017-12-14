<?php

require_once('../model/Agenda.php');
require_once('../connection/ConectaDB.php');

class AgendaDAO {

    private static $instance;
    private $con;
    private $table = "agend_agendamentos";

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->con = ConectaDB::getConnection();
    }

    public function cadastrar(Agenda $agenda) {
        try {
            $sql = "INSERT INTO $this->table (categoria_id, peso_id, descricao, data, hora) "
                    . "VALUES (:categoria_id, :peso_id, :descricao, :data, :hora)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':categoria_id', $agenda->getCategoriaID());
            $stmt->bindValue(':peso_id', $agenda->getPesoID());
            $stmt->bindValue(':descricao', $agenda->getDescricao());
            $stmt->bindValue(':data', $agenda->getData());
            $stmt->bindValue(':hora', $agenda->getHora());
            $stmt->execute();
            $this->gravarHistorico($agenda->getDescricao());
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public function gravarHistorico($descricao) {
        $sql = "INSERT INTO agend_hist_agenda_descricao (hist_name) VALUES(:descricao)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->execute();
    }

}
