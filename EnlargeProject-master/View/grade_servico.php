<div class="menuServicos">
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
                <ul>
                    <div class="menupicked">
                        <li><a href="?controller=ServicoController&method=listar">Serviços</a></li>
                    </div>
                    <li><a href="?controller=ReservaController&method=listar">Reservas</a></li>
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
                        <h2 class="table-subtitle">Gerenciar <b>Serviços</b></h2>
                    </div>
                    <div class="col-md-6 text-right"> 
                        <a href="?controller=ServicoController&method=criar" class="btn btn-success"><i class="material-icons">&#xE147;</i> 
                            <span>Criar novo Serviço</span></a>
                        <a href="#" class="btn btn-warning"><i class="	material-icons">&#xe3c9;</i> 
                            <span>Editar Serviço</span></a>							
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="centerCheck">Cód</th>
                <a><th>Título</th></a>
                <th>Cidade</th>
                <th class="centerCheck">TW Início</th>
                <th class="centerCheck">TW Fim</th>
                <th class="centerCheck">Pickup?</th>
                <th class="centerCheck">Deadline (dias)</th>
                <th class="centerCheck">Preço (R$)</th>
                <th class="centerCheck">Ativo?</th>
                <th class="centerCheck">Ação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if ($servicos) {
                        foreach ($servicos as $servico) {
                            ?>
                            <tr>
                                <td class="centerCheck">
                                    <a href="?controller=ServicoController&method=overview&id=<?php echo $servico->id_servico; ?>">
                                        <div class="controlLink"><?php echo $servico->id_servico; ?></div>
                                    </a>
                                </td>
                                <td>
                                    <a href="?controller=ServicoController&method=overview&id=<?php echo $servico->id_servico; ?>">
                                        <div class="controlLink"><?php echo $servico->ds_nome_servico; ?></div>
                                    </a>
                                </td>
                                <td><?php echo $servico->ds_cidade; ?></td>
                                <td  class="centerCheck"><?php
                                    $dt_janela_viagem_inicio1 = str_replace('-', '/', $servico->dt_janela_viagem_inicio);
                                    echo date('d/m/Y', strtotime($dt_janela_viagem_inicio1));
                                    ?></td>
                                <td class="centerCheck"><?php
                                    $dt_janela_viagem_fim1 = str_replace('-', '/', $servico->dt_janela_viagem_fim);
                                    echo date('d/m/Y', strtotime($dt_janela_viagem_fim1));
                                    ?></td>
                                <td class="centerCheck"><?php echo $servico->fg_exige_pickup; ?></td>
                                <td class="centerCheck"><?php
                                    echo $servico->nr_deadline;
                                    ?></td>
                                <td class="centerCheck"><?php echo $servico->nr_valor_unitario; ?></td>
                                <td class="centerCheck"><?php echo $servico->fg_ativo; ?></td>
                                <td class="centerCheck">
                                    <a href="?controller=ServicoController&method=editar&id=<?php echo $servico->id_servico; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                </td>
                                <td>
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