<!DOCTYPE html>

<html>
    <?php
    session_start();
    require_once('../controller/CategoriaController.php');
    require_once('../controller/PesoController.php');
    require_once('../controller/AgendaController.php');
    require_once('../resources/Mensagens.php');

    $categoriaController = CategoriaController::getInstance();
    $pesoController = PesoController::getInstance();
    $agendaController = AgendaController::getInstance();

    $categoria = "";
    $peso = "";
    $descricao = "";
    $data = "";
    $hora = "";

    if (isset($_SESSION['listaAgenda']) || isset($_SESSION['alertaHora'])) {
        $categoria = $_SESSION['categoria'];
        $peso = $_SESSION['peso'];
        $descricao = $_SESSION['descricao'];
        $data = $_SESSION['data'];
        $hora = $_SESSION['hora'];
    }


    include_once('./imports/import_head.php');
    ?>
    <body>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-busca-descricao">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Sugestões de Descrição</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody id="table-descricao">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <?php
        if (isset($_SESSION['listaAgenda'])) {
            ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-verificacao"> 
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Choque de Horário</h4>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>Descrição</td>
                                            <td>Data</td>
                                            <td>Hora</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $lista = $_SESSION['listaAgenda'];
                                        foreach ($lista as $agenda) {
                                            ?>
                                            <tr>
                                                <td class="text-uppercase"><?php echo $agenda['descricao']; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($agenda['data'])); ?></td>
                                                <td><?php echo $agenda['hora']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <span class="panel-title">Horários Sugeridos</span>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <?php
                                            echo $agendaController->verificaSugestoes($data, $hora);
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="panel-title">Novo Horário</span>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data:</label>
                                                    <input type="date" name="data" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Hora:</label>
                                                    <input type="text" name="hora" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Salvar mudanças</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <?php
            unset($_SESSION['listaAgenda']);
        }
        ?>

        <?php
        if (isset($_SESSION['alertaHora'])) {
            ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-alerta-horario">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Alerta de Conflito</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo Mensagens::getMsgInfo("Foram encontrados possíveis conflitos!");
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="panel-title">Possível Conflito</span>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Peso</th>
                                                    <th>Descrição</th>
                                                    <th>Data</th>
                                                    <th>Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $listaHorarios = $_SESSION['alertaHora'];
                                                foreach ($listaHorarios as $hr) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $hr['valor'];?></td>
                                                        <td><?php echo utf8_encode($hr['descricao']); ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($hr['data'])); ?></td>
                                                        <td><?php echo date('H:i', strtotime($hr['hora'])); ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="panel-title">Horário a ser agendado!</span>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Salvar mudanças</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <?php
        }
        unset($_SESSION['alertaHora']);
        ?>

        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <?php include_once('./imports/import_mensagem.php'); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title">Cadastro de Agenda</span>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="../transaction/AgendaPHP.php" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Categoria:</label>
                                        <select name="categoria" class="form-control text-uppercase" >
                                            <option value="">Selecione uma</option>
                                            <?php
                                            foreach ($categoriaController->listar("") as $cat) {
                                                ?>
                                                <option value="<?php echo $cat['id']; ?>" <?php echo ($categoria == $cat['id']) ? "selected" : ""; ?>><?php echo utf8_encode($cat['descricao']); ?></option>
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
                                                <option value="<?php echo $peso['id']; ?>" <?php echo ($peso == $peso['id']) ? "selected" : ""; ?>><?php echo $peso['valor'] . " - " . utf8_encode($peso['descricao']); ?></option>
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
                                            <input type="text" name="descricao" class="form-control text-uppercase" id="form-descricao-agenda" onkeyup="abrirModal();" aria-describedby="basic-addon2" value="<?php echo $descricao; ?>">
                                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Data:</label>
                                        <input type="date" name="data" class="form-control text-uppercase" value="<?php echo $data; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Hora:</label>
                                        <input type="text" name="hora" class="form-control" value="<?php echo $hora; ?>">
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
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="../resources/js/AgendaJS.js"></script>
    </body>
</html>