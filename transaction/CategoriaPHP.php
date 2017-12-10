<?php

session_start();

require_once('../model/Categoria.php');
require_once('../controller/CategoriaController.php');
require_once('../resources/Mensagens.php');

$categoriaController = CategoriaController::getInstance();
        
if(isset($_POST['cadastrar'])) {
    $cat = new Categoria();
    $cat->setDescricao(utf8_decode($_POST['descricao']));
    if($categoriaController->cadastrar($cat)) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Categoria cadastrada com sucesso!");
        header('location: ../view/cad-categorias.php');
    }
}

//exclui a categoria
if(isset($_GET['id'])) {
    $cat = new Categoria();
    $cat->setId($_GET['id']);
    if($categoriaController->deletar($cat)) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Categoria excluída com sucesso!");
        header('location: ../view/cad-categorias.php');
    }
}

//atualiza a categoria
if(isset($_POST['atualizar'])) {
    $cat = new Categoria();
    $cat->setId($_POST['id']);
    $cat->setDescricao(utf8_decode($_POST['descricao']));
    if($categoriaController->atualizar($cat)) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Dados da categoria atualizados com sucesso!");
        header('location: ../view/cad-categorias.php');
    } else {
        $_SESSION['msg'] = Mensagens::getMsgError("Erro ao tentar atualizar os dados!");
        header('location: ../view/cad-categorias.php');
    }
}
