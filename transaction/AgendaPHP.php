<?php

session_start();
require_once('../controller/AgendaController.php');
require_once('../resources/Mensagens.php');

$agendaController = AgendaController::getInstance();

if (isset($_POST['cadastrar'])) {
    $agenda = new Agenda();
    $agenda->setCategoriaID($_POST['categoria']);
    $agenda->setPesoID($_POST['peso']);
    $agenda->setDescricao(utf8_decode($_POST['descricao']));
    $agenda->setData($_POST['data']);
    $agenda->setHora(date('H:i:s', strtotime($_POST['hora'])));

    if ($agendaController->verificar($agenda) == null) {
        $listaHorarios = $agendaController->verificaHorariosProximos($agenda->getData(), $agenda->getHora());
        if ($listaHorarios == null) {
            if ($agendaController->cadastrar($agenda)) {
                $_SESSION['msg'] = Mensagens::getMsgSuccess("Agenda cadastrada com sucesso!");
                header('location: ../view/cad-agenda.php');
            } else {
                $_SESSION['msg'] = Mensagens::getMsgError("Erro ao tentar cadastrar a agenda!");
                header('location: ../view/cad-agenda.php');
            }
        } else {
            $_SESSION['categoria'] = $agenda->getCategoriaID();
            $_SESSION['peso'] = $agenda->getPesoID();
            $_SESSION['descricao'] = utf8_encode($agenda->getDescricao());
            $_SESSION['data'] = $agenda->getData();
            $_SESSION['hora'] = $agenda->getHora();
            $_SESSION['alertaHora'] = $listaHorarios;
            header('location: ../view/cad-agenda.php');
        }
    } else {
        $_SESSION['listaAgenda'] = $agendaController->verificar($agenda);
        $_SESSION['categoria'] = $agenda->getCategoriaID();
        $_SESSION['peso'] = $agenda->getPesoID();
        $_SESSION['descricao'] = utf8_encode($agenda->getDescricao());
        $_SESSION['data'] = $agenda->getData();
        $_SESSION['hora'] = $agenda->getHora();
        header('location: ../view/cad-agenda.php');
    }
}

if (isset($_POST['busc'])) {
    $string = null;
    foreach ($agendaController->getHistorico($_POST['desc']) as $hist) {
        $nome = utf8_encode($hist['hist_name']);
        $string .= '<tr data-dismiss="modal"><td class="text-uppercase" onclick="selecionarDesc(\'' . $nome . '\');">' . $nome . '</td></tr>';
    }
    echo $string;
}

