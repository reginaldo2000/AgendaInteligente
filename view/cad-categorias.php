<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    session_start();
    require_once('../controller/CategoriaController.php');
    include_once('./imports/import_head.php');

    $categoriaController = new CategoriaController();
    ?>
    <body>
        <section class="main-content">
            <?php
            include_once('./imports/import_mensagem.php');
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Cadastro de Categorias</span>
                </div>
                <div class="panel-body">
                    <form method="post" action="../transaction/CategoriaPHP.php" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-9 col-md-7">
                                <div class="form-group">
                                    <label class="control-label">Descrição</label>
                                    <input type="text" name="descricao" class="form-control text-uppercase" required>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-4 col-md-3">
                                        <button name="cadastrar" class="btn btn-primary custom-btn">
                                            <i class="fa fa-save"></i> &nbsp; Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Lista de Categorias</span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">DESCRIÇÃO</th>
                                    <th class="text-center">AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $desc = (isset($_POST['buscar'])) ? $_POST['consulta'] : "";
                                foreach ($categoriaController->listar($desc) as $cat) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cat['id']; ?></td>
                                        <td class="text-uppercase"><?php echo utf8_encode($cat['descricao']); ?></td>
                                        <td class="text-center">
                                            <i class="fa fa-pencil" title="editar"></i>
                                            <i class="fa fa-trash" title="excluir" onclick="location.href='../transaction/CategoriaPHP.php?id=<?php echo $cat['id'];?>'"></i>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once('./imports/import_footer.php');?>
    </body>
</html>
