<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
    include_once('./imports/import_head.php');
    ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title">Consulta Agenda</span>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-footer">
                                <form method="post" action="" class="form-inline">
                                    <label class="control-label">Descrição:</label>
                                    <input type="text" name="desc" class="form-control">
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Peso</th>
                                        <th>Descrição</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
        include_once('./imports/import_footer.php');
        ?>
    </body>
</html>
