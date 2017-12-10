<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    session_start();
    include_once('./imports/import_head.php');
    ?>
    <body>
        <section class="main-content">
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
                                    <input type="text" name="descricao" class="form-control text-uppercase">
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
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
