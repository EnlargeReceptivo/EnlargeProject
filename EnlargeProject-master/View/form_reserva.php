<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
</head>

<div class="menuReservas">
    <div class="menuInterior">
        <div class="logo">
            <a href="index.php">
                <div class="brand_logo_container">
                    <img src ="css/images/logo-radio.png" class="brand_logo">
                </div>
            </a>
        </div>

        <div class="busca">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="O que você está procurando?" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <a href="request.php" class="btn btn-primary">Busca</a>
                </div>
            </div>
        </div>

        <div class="btnLogin">
            <a href="login.html">	
                <img src="css/images/user_icon.png">
            </a>
        </div>

        <div class="menuprodutos">
            <ul>
                <li><a href="?controller=ServicoController&method=listar">Serviços</a></li>
                <div class="menupicked">
                    <li><a href="?controller=ReservaController&method=listar">Reservas</a></li>
                </div>
                <li><a href="?controller=TarifarioController&method=listar">Tarifários</a></li>
                <li><a href="?controller=UsuariosController&method=listar">Usuários</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">   
                    <div class="col-md-6">
                        <h2 class="table-subtitle">Editar <b>Reserva</b></h2>
                        <form action="?controller=ReservaController&<?php echo isset($reserva->num_reserva) ? "method=atualizar&id={$reserva->num_reserva}" : "method=salvar"; ?>" method="post">
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($reserva->num_reserva) ? $reserva->num_reserva : null; ?>" />
                        <button class="btn btn-success" type="submit">
                            <i class="material-icons">check_circle</i>
                            <span>Salvar</span>
                        </button>

                        <a href="?controller=ReservaController&method=listar" class="btn btn-danger" type="submit">
                            <i class="material-icons">&#xe14a;</i>
                            <span>Cancelar</span>
                        </a>
                    </div>
                </div>
            </div>

            <!--<table class="table table-striped table-hover"> -->
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <!--<div class="d-flex justify-content-center">-->
                    <!--<div class="d-flex justify-content-center form_container">-->
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-secondary" name="modal" data-toggle="modal" data-target="#myModal">
                                    Checar Datas
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Datas disponíveis</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <div class="row">
                                                        <thead>
                                                        <tbody>
                                                        <th class="centerCheck">Código</th>
                                                        <th class="centerCheck">Data Tarifário</th>
                                                        <?php
                                                        $con = mysqli_connect("localhost", "root", "", "enlargebd");

                                                        $uri = $_SERVER['REQUEST_URI'];
                                                        $uril = strval(substr($uri, (strlen($uri) - 4), strlen($uri)));

                                                        $preResult = mysqli_query($con, "SELECT cod_tarifario FROM tb_reservas WHERE num_reserva = $uril");

                                                        $row1 = mysqli_fetch_array($preResult);
                                                        $row2 = intval($row1['cod_tarifario']);
                                                        
                                                        $sql2 = "SELECT id_servico FROM tb_tarifarios WHERE cod_tarifario = $row2";
                                                        $result0 = $con->query($sql2);
                                                        
                                                        $row3 = mysqli_fetch_array($result0);
                                                        $row4 = intval($row3['id_servico']);

                                                        $sql = "SELECT cod_tarifario, nome_tarifario FROM tb_tarifarios WHERE id_servico = $row4 AND ativo = TRUE";
                                                        $result = $con->query($sql);

                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <tr>
                                                                <td class="centerCheck">
                                                                    <a href="?controller=TarifarioController&method=overview&id=<?php echo $row['cod_tarifario']; ?>">
                                                                        <div class="controlLink"><?php echo $row['cod_tarifario']; ?></div>
                                                                    </a>
                                                                </td>
                                                                <td class="centerCheck">
                                                                    <a href="?controller=TarifarioController&method=overview&id=<?php echo $row['cod_tarifario']; ?>">
                                                                        <div class="controlLink"><?php echo $row['nome_tarifario']; ?></div>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        mysqli_close($con);
                                                        ?> 
                                                        </tbody>
                                                        </thead>
                                                    </div>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                            <!--<button type="button" class="btn btn-primary">Selecionar</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">pin</i></span>
                                </div>
                                <input type="text" name="cod_tarifario" id="cod_tarifario" class="form-control" value="<?php
                                echo isset($reserva->cod_tarifario) ? $reserva->cod_tarifario : null;
                                ?>" placeholder="Código do Tarifário">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">person</i></span>
                                </div>
                                <input type="text" name="nome_titular" id="nome_titular" class="form-control" value="<?php
                                echo isset($reserva->nome_titular) ? $reserva->nome_titular : null;
                                ?>" placeholder="Nome do Titular">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">elderly</i></span>
                                </div>
                                <input type="text" name="idade_titular" id="idade_titular" class="form-control" value="<?php
                                echo isset($reserva->idade_titular) ? $reserva->idade_titular : null;
                                ?>" placeholder="Idade do Titular">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">groups</i></span>
                                </div>
                                <input type="text" name="qtde_pax" id="qtde_pax" class="form-control" value="<?php
                                echo isset($reserva->qtde_pax) ? $reserva->qtde_pax : null;
                                ?>" placeholder="Qtde. Pax">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">flight</i></span>
                                </div>
                                <input type="text" name="info_voo_htl" id="info_voo_htl" class="form-control" value="<?php
                                echo isset($reserva->info_voo_htl) ? $reserva->info_voo_htl : null;
                                ?>" placeholder="Info Voo/Htl">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">flag</i></span>
                                </div>
                                <input type="text" name="status_reserva" id="status_reserva" class="form-control" onblur="validar(this);" value="<?php
                                       echo isset($reserva->status_reserva) ? $reserva->status_reserva : null;
                                       ?>" placeholder="Status Reserva">
                            </div>                                    
                        </div>
                    </div>
                    </form>
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
            <!--</table>-->
        </div>
    </div>        
</div>

<script lang="javascript">
    function statusReserva(status_reserva) {
        if (status_reserva !== 'Confirmada' &&
                status_reserva !== 'Cancelada' &&
                status_reserva !== 'CONFIRMADA' &&
                status_reserva !== 'CANCELADA' &&
                status_reserva !== 'confirmada' &&
                status_reserva !== 'cancelada')
            return false;
        return true;
    }

    function validar(el) {
        if (!statusReserva(el.value)) {
            alert("As reservas só podem assumir o Status 'Confirmada' ou 'Cancelada'! " + el.value.toUpperCase());
            el.value = "";
        }
    }
</script>