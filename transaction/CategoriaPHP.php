<?php

session_start();

require_once('../model/Categoria.php');
require_once('../controller/CategoriaController.php');
require_once('../resources/Mensagens.php');

$categoriaController = new CategoriaController();
        
if(isset($_POST['cadastrar'])) {
    $cat = new Categoria();
    $cat->setDescricao(utf8_decode($_POST['descricao']));
    if($categoriaController->cadastrar($cat)) {
        $_SESSION['msg'] = Mensagens::getMsgSuccess("Categoria cadastrada com sucesso!");
        header('location: ../view/cad-categorias.php');
    }
}

