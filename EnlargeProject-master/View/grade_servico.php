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
                        <!--<a href="#" class="btn btn-warning"><i class="	material-icons">&#xe3c9;</i> 
                            <span>Editar Serviço</span></a>-->							
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="centerCheck">Cód</th>
                <a><th>Serviço</th></a>
                <th>Cidade</th>
                <th class="centerCheck">TW Início</th>
                <th class="centerCheck">TW Fim</th>
                <th class="centerCheck">Pickup?</th>
                <th class="centerCheck">Deadline </th>
                <th class="centerCheck">Preço</th>
                <th class="centerCheck">Ação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
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
                                    echo strftime('%d/%b/%y', strtotime($dt_janela_viagem_inicio1));
                                    ?></td>
                                <td class="centerCheck"><?php
                                    $dt_janela_viagem_fim1 = str_replace('-', '/', $servico->dt_janela_viagem_fim);
                                    echo strftime('%d/%b/%y', strtotime($dt_janela_viagem_fim1));
                                    ?></td>
                                <td class="centerCheck">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" disabled 
                                        <?php
                                        if (isset($servico->fg_exige_pickup)) {
                                            if ($servico->fg_exige_pickup == 1) {
                                                echo 'checked';
                                            } else {
                                                echo'unchecked';
                                            }
                                        }
                                        ?>>
                                        <label class="form-check-label" for="flexCheckDisabled"></label>
                                    </div>
                                </td>
                                <td class="centerCheck"><?php
                                    echo $servico->nr_deadline;
                                    ?>
                                </td>
                                <td class="centerCheck"><?php
                                    $preco = str_replace('.', ',', $servico->nr_valor_unitario);
                                    echo "R$ " . $preco;
                                    ?>
                                </td>


                                                                        <!--<td class="centerCheck">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" disabled <?php
                                /* if (isset($servico->fg_ativo)) {
                                  if ($servico->fg_ativo == 1) {
                                  echo 'checked';
                                  } else {
                                  echo'unchecked';
                                  }
                                  } */
                                ?>>
                                                                                <label class="form-check-label" for="flexCheckDisabled"></label>
                                                                            </div>
                                                                        </td>-->


                                <td class="centerCheck">
                                    <a href="?controller=ServicoController&method=editar&id=<?php echo $servico->id_servico; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
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