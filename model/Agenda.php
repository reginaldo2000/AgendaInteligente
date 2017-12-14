<?php


class Agenda {
    
    private $id;
    private $categoriaID;
    private $pesoID;
    private $descricao;
    private $data;
    private $hora;
    
    function getId() {
        return $this->id;
    }

    function getCategoriaID() {
        return $this->categoriaID;
    }

    function getPesoID() {
        return $this->pesoID;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoriaID($categoriaID) {
        $this->categoriaID = $categoriaID;
    }

    function setPesoID($pesoID) {
        $this->pesoID = $pesoID;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }
    
}
