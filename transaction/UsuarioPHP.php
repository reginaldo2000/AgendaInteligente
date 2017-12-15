<?php
session_start();
require_once('../model/Usuario.php');
require_once('../controller/UsuarioController.php');
require_once('../resources/Mensagens.php');

$usuarioController = UsuarioController::getInstance();

if(isset($_POST['entrar'])) {
    $usuario = new Usuario();
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setSenha(md5($_POST['senha']));
    if($usuarioController->logar($usuario)) {
        $_SESSION['logado'] = 1;
        header('location: ../view/home.php');
    } else {
        $_SESSION['user_error'] = $_POST['usuario'];
        $_SESSION['msg'] = Mensagens::getMsgError("Usuário ou senha incorretos!");
        header('location: ../view/index.php');
    }
}
