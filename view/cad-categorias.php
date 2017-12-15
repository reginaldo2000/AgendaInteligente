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

    $categoriaController = CategoriaController::getInstance();
    ?>
    <body>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-edicao">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar dados da categoria</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../transaction/CategoriaPHP.php">
                            <input type="text" name="id" class="hidden" id="form-id">
                            <div class="row">
                                <div class="col-sm-9 col-md-7">
                                    <div class="form-group">
                                        <label class="control-label">Descrição</label>
                                        <input type="text" name="descricao" class="form-control text-uppercase" id="form-descricao" required>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-3">
                                            <button name="atualizar" class="btn btn-primary custom-btn">
                                                <i class="fa fa-edit"></i> &nbsp; Atualizar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
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
                                                <i class="fa fa-pencil" title="editar" onclick="passaCategoria(<?php echo $cat['id']; ?>, '<?php echo $cat['descricao']; ?>')" data-toggle="modal" data-target="#modal-edicao"></i>
                                                <i class="fa fa-trash" title="excluir" onclick="location.href = '../transaction/CategoriaPHP.php?id=<?php echo $cat['id']; ?>'"></i>
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
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="../resources/js/CategoriaJS.js"></script>
    </body>
</html>
