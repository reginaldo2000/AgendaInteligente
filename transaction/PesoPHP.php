<?php

session_start();

include_once ('../model/Peso.php');
include_once ('../controller/PesoController.php');
include_once ('../resources/Mensagens.php');

$peso = new Peso();
$pesoController = PesoController::getInstance();

if (isset($_POST['cadastrar'])) {
    $peso->setValor($_POST['peso']);
    $peso->setDescricao(utf8_decode($_POST['descricao']));

    $resultCadastrar = $pesoController->cadastrar($peso);
    if ($resultCadastrar) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Peso cadastrado com sucesso!");
        header('location: ../view/cad-pesos.php');
    } else {
        $_SESSION['msg'] = Mensagens::getMsgError("Erro ao cadastrar o peso!");
        header('location: ../view/cad-pesos.php');
    }
}

if (isset($_POST['atualizar'])) {
    $valor = $_POST['valor'];
    $descricao = utf8_decode($_POST['descricao']);
    $id = $_POST['id'];

    $peso->setValor($valor);
    $peso->setDescricao($descricao);
    $peso->setId($id);

    $resultAtualizar = $pesoController->atualizar($peso);
    if ($resultAtualizar) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Peso atualizado com sucesso.");
    } else {
        $_SESSION['msg'] = Mensagens::getMsgError("Erro ao atualizar o peso!");
    }
}
if (isset($_GET['deletar'])) {
    
    $id = $_GET['id'];
    $peso->setId($id);
    $resultDeletar = $pesoController->deletar($peso);
    if ($resultDeletar) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Peso deletado com sucesso.");
    } else {
        $_SESSION['msg'] = Mensagens::getMsgError("Erro ao deletar o peso!");
    }
}





