<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    require_once('../controller/AgendaController.php');
    $agendaController = AgendaController::getInstance();

    include_once('./imports/import_head.php');
    ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content" style="margin-bottom: 230px;">
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
                                    <button class="btn btn-primary" name="buscar">Buscar</button>
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
                                    if (isset($_POST['desc'])) {
                                        $listaAgenda = $agendaController->listaAgenda($_POST['desc']);
                                        foreach ($listaAgenda as $agenda) {
                                            ?>
                                            <tr>
                                                <td class="text-uppercase"><?php echo utf8_encode($agenda['cat_desc']);?></td>
                                                <td><?php echo $agenda['valor'];?></td>
                                                <td class="text-uppercase"><?php echo utf8_encode($agenda['descricao']);?></td>
                                                <td><?php echo date('d/m/Y', strtotime($agenda['data']));?></td>
                                                <td><?php echo date('H:i', strtotime($agenda['hora']));?></td>
                                                <td class="text-center">
                                                    <i class="fa fa-pencil" title="editar"></i>
                                                    <i class="fa fa-trash" title="excluir"></i>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
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
