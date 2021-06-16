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
                        <h2 class="table-subtitle">Gerenciar <b>Reservas</b></h2>
                    </div>
                    <div class="col-md-6 text-right"> 
                       <!-- <a href="#" class="btn btn-warning"><i class="material-icons">&#xe3c9;</i> 
                            <span>Editar</span></a>
                        <a href="#" class="btn btn-danger"><i class="material-icons">&#xe14a;</i> 
                            <span>Excluir</span></a> -->
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="centerCheck">Nº Reserva</th>
                        <th class="centerCheck">Cód Tarifário</th>
                        <th>Nome Serviço</th>
                        <th>Titular</th>
                        <th class="centerCheck">Qtde. Pax</th>
                        <th class="centerCheck">Data Serviço</th>
                        <th class="centerCheck">Info Voo/Htl</th>
                        <th class="centerCheck">Status</th>
                        <th class="centerCheck">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($reservas) {
                        foreach ($reservas as $reserva) {
                            ?>
                            <tr>
                                <td class="centerCheck">
                                    <a href="?controller=ReservaController&method=overview&id=<?php echo $reserva->num_reserva; ?>">
                                        <div class="controlLink"><?php echo $reserva->num_reserva; ?></div>
                                    </a>
                                </td>
                                <td class="centerCheck">
                                    <a href="?controller=TarifarioController&method=overview&id=<?php echo $reserva->cod_tarifario; ?>">
                                        <div class="controlLink"><?php echo $reserva->cod_tarifario; ?></div>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $reserva->nome_servico; ?>
                                </td>
                                <td>
                                    <a href="?controller=ReservaController&method=overview&id=<?php echo $reserva->num_reserva; ?>">
                                        <div class="controlLink"><?php echo $reserva->nome_titular; ?></div>
                                    </a>
                                </td>
                                <td class="centerCheck"><?php echo $reserva->qtde_pax; ?></td>
                                <td class="centerCheck">
                                    <?php
                                    $dtRes = str_replace('-', '/', $reserva->data_servico);
                                    echo strftime('%d/%b/%Y', strtotime($dtRes));
                                    ?>
                                </td>
                                <td class="centerCheck"><?php echo $reserva->info_voo_htl; ?></td>
                                <td class="centerCheck"><?php echo $reserva->status_reserva; ?></td>
                                <td class="centerCheck">
                                    <a href="?controller=ReservaController&method=editar&id=<?php echo $reserva->num_reserva; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                    <a href="?controller=ReservaController&method=excluir&id=<?php echo $reserva->num_reserva; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Excluir">delete</i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">Nenhum registro encontrado</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>