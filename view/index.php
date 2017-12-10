<!DOCTYPE html>
<?php
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <div class="container-fluid">
            <section class="login-content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title">Login</span>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-control">Usuário:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Senha:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-9 col-sm-3">
                                    <div class="form-group">
                                        <button class="btn btn-primary custom-btn">Entrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
