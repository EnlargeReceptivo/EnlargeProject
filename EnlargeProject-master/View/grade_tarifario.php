<div class="menuTarifarios">
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
                <li><a href="?controller=ReservaController&method=listar">Reservas</a></li>
                <div class="menupicked">
                    <li><a href="?controller=TarifarioController&method=listar">Tarifários</a></li>
                </div>
                <li><a href="?controller=UsuariosController&method=listar">Usuários</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper my-custom-scrollbar">
            <div class="table-title">
                <div class="row">   
                    <div class="col-md-6">
                        <h2 class="table-subtitle">Gerenciar <b>Tarifários</b></h2>
                    </div>
                    <!--<div class="col-md-6 text-right"> 
                        <a href="#" class="btn btn-warning"><i class="	material-icons">&#xe3c9;</i> 
                            <span>Editar Tarifário</span></a>							
                    </div>-->
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="centerCheck">Cód</th>
                        <th class="centerCheck">Cód Serviço</th>
                        <th>Tarifário</th>
                        <th class="centerCheck">Data Serviço</th>
                        <th class="centerCheck">Qtde. Allotment</th>
                        <th class="centerCheck">Ativo?</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    if ($tarifarios) {
                        foreach ($tarifarios as $tarifario) {
                            ?>
                            <tr>
                                <td>
                                    <a href="?controller=TarifarioController&method=overview&id=<?php echo $tarifario->cod_tarifario; ?>">
                                        <div class="controlLink"><?php echo $tarifario->cod_tarifario; ?></div>
                                    </a>
                                </td>
                                <td class="centerCheck">
                                    <a href="?controller=ServicoController&method=overview&id=<?php echo $tarifario->id_servico; ?>">
                                        <div class="controlLink"><?php echo $tarifario->id_servico; ?></div>
                                    </a>
                                </td>
                                <td>
                                    <a href="?controller=TarifarioController&method=overview&id=<?php echo $tarifario->cod_tarifario; ?>">
                                        <div class="controlLink"><?php echo $tarifario->nome_tarifario; ?></div>
                                    </a>
                                </td>                                
                                <td class="centerCheck"><?php
                                    $dtServ = str_replace('-', '/', $tarifario->data_servico);
                                    echo strftime('%d/%b/%y', strtotime($dtServ));
                                    ?>
                                </td>

                                <td class="centerCheck"><?php echo $tarifario->qtdeAllotment; ?></td>                                
                                <td class="centerCheck">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" disabled 
                                        <?php
                                        if (isset($tarifario->ativo)) {
                                            if ($tarifario->ativo == 1) {
                                                echo 'checked';
                                            } else {
                                                echo'unchecked';
                                            }
                                        }
                                        ?>>
                                        <label class="form-check-label" for="flexCheckDisabled"></label>
                                    </div>
                                </td>

                                <td>
                                    <a href="?controller=TarifarioController&method=editar&id=<?php echo $tarifario->cod_tarifario; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
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