<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <section class="main-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Cadastro de Pesos</span>
                </div>
                <div class="panel-body">
                    <form action="../transaction/PesoPHP.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Valor do Peso</label>
                                    <input type="number" name="peso" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
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
        </section>
    </body>
</html>
