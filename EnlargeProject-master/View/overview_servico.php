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
                        <h2 class="table-subtitle">
                            <?php
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                            echo isset($servico->ds_nome_servico) ? $servico->ds_nome_servico : null;
                            ?>
                        </h2>
                    </div>
                    <div class="col-md-6 text-right"> 
                        <a href="?controller=ServicoController&method=editar&id=<?php echo $servico->id_servico; ?>" class="btn btn-warning">
                            <i class="material-icons">&#xe3c9;</i> 
                            <span>Editar</></span>
                        </a>
                        <a href="?controller=ServicoController&method=listar" class="btn btn-danger">
                            <i class="material-icons">&#xe317;</i> 
                            <span>Voltar</span>
                        </a>						
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user_card">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-left" style="margin-bottom: -10px;"><p class="centerCheck">Código do Serviço: 
                                <?php
                                echo isset($servico->id_servico) ? $servico->id_servico : null;
                                ?></p>
                        </h5></br></br>
                        <p class="card-text text-left">Cidade: 
                            <?php
                            echo isset($servico->ds_cidade) ? $servico->ds_cidade : null;
                            ?>
                        </p>
                        <p class="card-text text-left">Dias da Semana: 
                            <?php
                            echo isset($servico->ds_dias_semana) ? $servico->ds_dias_semana : null;
                            ?>
                        </p>
                        <p class="card-text text-left">Idade Mínima: 
                            <?php
                            echo isset($servico->nr_idade_minima) ? $servico->nr_idade_minima : null;
                            ?>
                        </p>
                        <p class="card-text text-left">Idade Máxima: 
                            <?php
                            echo isset($servico->nr_idade_maxima) ? $servico->nr_idade_maxima : null;
                            ?>
                        </p>
                        <p class="card-text text-left text-danger">Deadline (dias): 
                            <?php
                            echo isset($servico->nr_deadline) ? $servico->nr_deadline : null;
                            ?>                                        
                        </p>
                        <p class="card-text text-left">Quantidade Mínima Passageiros: 
                            <?php
                            echo isset($servico->nr_qt_min_passageiros) ? $servico->nr_qt_min_passageiros : null;
                            ?> 
                        </p>
                        <p class="card-text text-left">Quantidade Allotment: 
                            <?php
                            echo isset($servico->nr_quantidade_loteamento) ? $servico->nr_quantidade_loteamento : null;
                            ?> 
                        </p>
                        <p class="card-text text-left">Criado por: 
                            <?php
                            echo isset($servico->criado_por) ? $servico->criado_por : null;
                            ?> 
                        </p>
                        <p class="card-text text-left" style="margin-bottom: 20.25%;"><!--Data de criação: -->
                            <?php
                            //echo isset($servico->dt_criacao_data) ? $servico->dt_criacao_data : null;
                            ?> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-left">Descrição</h5>
                        <p class="card-text text-left">
                            <?php
                            echo isset($servico->ds_descricao_servico) ? $servico->ds_descricao_servico : null;
                            ?>                                            
                        </p></br>
                        <p class="card-text text-left">Preço por Pax: </br>R$ 
                            <?php
                            echo isset($servico->nr_valor_unitario) ? $servico->nr_valor_unitario : null;
                            ?>  
                        </p>
                        <p class="card-text text-left">Travel Window Início: </br>
                            <?php
                            $dt_janela_viagem_inicio1 = $servico->dt_janela_viagem_inicio;
                            echo strftime('%d/%b/%y', strtotime($dt_janela_viagem_inicio1));
                            ?> 
                        </p>
                        <p class="card-text text-left">Travel Window Fim: </br>
                            <?php
                            $dt_janela_viagem_fim1 = $servico->dt_janela_viagem_fim;
                            echo strftime('%d/%b/%y', strtotime($dt_janela_viagem_fim1));
                            ?> 
                        </p></br></br></br>
                        <p class="card-text text-left"><strong>Informações Úteis</strong></p>
                        <div class="row">
                            <p class="card-text ml-3">Pickup? 
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox3" disabled
                                    <?php
                                    if (isset($servico->fg_exige_pickup)) {
                                        if ($servico->fg_exige_pickup == 1) {
                                            echo 'checked';
                                        } else {
                                            echo'unchecked';
                                        }
                                    }
                                    ?>>
                                    <label for="checkbox3"></label>
                                </span>
                            </p>

                            <p class="card-text ml-2">Privativo? 
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" disabled 
                                    <?php
                                    if (isset($servico->fg_privativo)) {
                                        if ($servico->fg_privativo == 1) {
                                            echo 'checked';
                                        } else {
                                            echo'unchecked';
                                        }
                                    }
                                    ?>
                                           >
                                    <label for="checkbox1"></label>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- tem 2 -->
        <!-- <div class="col-6"> -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title text-left">Tarifários</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <div class="row">
                            <thead>
                            <tbody>
                            <th>Código</th>
                            <th>Tarifário</th>
                            <th class="centerCheck">Qtde Allotment</th>
                            <th class="centerCheck">Ativo?</th>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "enlargebd");
                            $result = mysqli_query($con, "SELECT cod_tarifario, nome_tarifario, qtdeAllotment, ativo FROM tb_tarifarios WHERE id_servico = $servico->id_servico");
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td class="centerCheck">
                                        <a href="?controller=TarifarioController&method=overview&id=<?php echo $row['cod_tarifario']; ?>">
                                            <div class="controlLink"><?php echo $row['cod_tarifario']; ?></div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?controller=TarifarioController&method=overview&id=<?php echo $row['cod_tarifario']; ?>">
                                            <div class="controlLink"><?php echo $row['nome_tarifario']; ?></div>
                                        </a>
                                    </td>
                                    <td class="centerCheck">
                                        <a>
                                            <div class="controlLink"><?php echo $row['qtdeAllotment']; ?></div>
                                        </a>
                                    </td>
                                    <td class="centerCheck">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" disabled 
                                            <?php
                                            if (isset($row['ativo'])) {
                                                if ($row['ativo'] == 1) {
                                                    echo 'checked';
                                                } else {
                                                    echo'unchecked';
                                                }
                                            }
                                            ?>>
                                            <label class="form-check-label" for="flexCheckDisabled"></label>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            mysqli_close($con);
                            ?> 
                            </tbody>
                            </thead>
                        </div>
                </div>
                </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>