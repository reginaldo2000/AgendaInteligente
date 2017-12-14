<!DOCTYPE html>

<html>
    <?php
    session_start();
    require_once('../controller/CategoriaController.php');
    require_once('../controller/PesoController.php');

    $categoriaController = CategoriaController::getInstance();
    $pesoController = PesoController::getInstance();

    include_once('./imports/import_head.php');
    ?>
    <body>
        <?php include_once('./imports/import_header.php'); ?>
        <section class="main-content">
            <?php include_once('./imports/import_mensagem.php'); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Cadastro de Agenda</span>
                </div>
                <div class="panel-body">
                    <form method="post" action="../transaction/AgendaPHP.php">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Categoria:</label>
                                    <select name="categoria" class="form-control text-uppercase">
                                        <option value="">Selecione uma</option>
                                        <?php
                                        foreach ($categoriaController->listar() as $cat) {
                                            ?>
                                            <option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['descricao']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Peso:</label>
                                    <select name="peso" class="form-control text-uppercase">
                                        <option value="">Selecione um</option>
                                        <?php
                                        foreach ($pesoController->listar("") as $peso) {
                                            ?>
                                            <option value="<?php echo $peso['id']; ?>"><?php echo $peso['valor'] . " - " . utf8_encode($peso['descricao']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Descrição:</label>
                                    <div class="input-group">
                                        <input type="text" name="descricao" class="form-control text-uppercase" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Data:</label>
                                    <input type="date" name="data" class="form-control text-uppercase">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Hora:</label>
                                    <input type="text" name="hora" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-footer">
                                <button class="btn btn-primary" name="cadastrar">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>