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

    public function getHistorico($descricao) {
        try {
            $sql = "SELECT * FROM agend_hist_agenda_descricao WHERE hist_name LIKE :desc";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':desc', "%" . $descricao . "%");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $ex) {
            return null;
        }
    }

    public function verificaChoqueAgenda(Agenda $agenda) {
        $sql = "SELECT * FROM $this->table WHERE data = :data AND hora = :hora";
        $st = $this->con->prepare($sql);
        $st->bindValue(':data', $agenda->getData());
        $st->bindValue(':hora', $agenda->getHora());
        $st->execute();
        if ($st->rowCount() > 0) {
            return $st->fetchAll();
        }
        return null;
    }

    public function verificaSugestoes($data, $hora) {
        $cont = 0;
        $string = '';
        $dataI = $data;
        $dataF = date('Y-m-d', strtotime('+1 day', strtotime($dataI)));
        try {
            while ($cont < 3) {
                $sql1 = "SELECT * FROM $this->table WHERE data BETWEEN :dataI AND :dataF";
                $st1 = $this->con->prepare($sql1);
                $st1->bindValue(':dataI', $dataI);
                $st1->bindValue(':dataF', $dataF);
                $st1->execute();
                if ($st1->rowCount() == 0) {
                    $string .= '<li>' . date('d/m/Y', strtotime($dataI)) . " " . $hora . '</li>';
                    $cont++;
                }
                $novaData = date('Y-m-d', strtotime('+1 day', strtotime($dataI)));
                $dataI = $novaData;
                $dataF = date('Y-m-d', strtotime('+1 day', strtotime($dataI)));
            }
            return $string;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function verificaHorariosProximos($data, $hora) {
        try {
            $sql = "SELECT a.*, p.valor FROM $this->table a INNER JOIN agend_peso p ON p.id = a.peso_id WHERE data = :data AND hora BETWEEN :horaI AND :horaF";
            $st = $this->con->prepare($sql);
            $st->bindValue(':data', $data);
            $st->bindValue(':horaI', date('H:i:s', strtotime('-1 hour', strtotime($hora))));
            $st->bindValue(':horaF', date('H:i:s', strtotime('+1 hour', strtotime($hora))));
            $st->execute();
            if ($st->rowCount() == 0) {
                return null;
            }
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

}
