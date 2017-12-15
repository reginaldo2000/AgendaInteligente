<!DOCTYPE html>
<?php
session_start();
$usuario = "";
if(isset($_SESSION['user_error'])) {
    $usuario = $_SESSION['user_error'];
}
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php include_once('./imports/import_header.php');?>
        <div class="container-fluid">
            <section class="login-content">
                <?php include_once('./imports/import_mensagem.php');?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title">Login</span>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="../transaction/UsuarioPHP.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-control">Usuário:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" class="form-control" name="usuario" aria-describedby="basic-addon1" value="<?php echo $usuario;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Senha:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" name="senha" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-9 col-sm-3">
                                    <div class="form-group">
                                        <button class="btn btn-primary custom-btn" name="entrar">Entrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php');?>
    </body>
</html>
