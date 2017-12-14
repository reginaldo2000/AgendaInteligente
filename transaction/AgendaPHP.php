<?php
session_start();
require_once('../controller/AgendaController.php');
require_once('../resources/Mensagens.php');

$agendaController = AgendaController::getInstance();

if(isset($_POST['cadastrar'])) {
    $agenda = new Agenda();
    $agenda->setCategoriaID($_POST['categoria']);
    $agenda->setPesoID($_POST['peso']);
    $agenda->setDescricao(utf8_decode($_POST['descricao']));
    $agenda->setData($_POST['data']);
    $agenda->setHora($_POST['hora']);
    
    if($agendaController->cadastrar($agenda)) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Agenda cadastrada com sucesso!");
        header('location: ../view/cad-agenda.php');
    } else {
        $_SESSION['msg'] = Mensagens::getMsgError("Erro ao tentar cadastrar a agenda!");
        header('location: ../view/cad-agenda.php');
    }
    
}

