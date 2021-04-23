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
                <li><a href="index.php">Início</a></li>
                <div class="menupicked">
                    <li><a href="?controller=ServicoController&method=listar">Serviços</a></li>
                </div>
                <li><a href="?controller=ReservaController&method=listar">Reservas</a></li>
                <li><a href="?controller=TarifarioController&method=listar">Tarifários</a></li>
                <li><a href="?controller=UsuariosController&method=listar">Usuários</a></li>
                <li><a href="index.php">Relatórios</a></li>
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
                        <h2 class="table-subtitle">Cadastrar <b>Serviço</b></h2>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center form_container">
                                <form action="?controller=ServicoController&<?php echo isset($servico->id_servico) ? "method=atualizar&id={$servico->id_servico}" : "method=salvar"; ?>" method="post">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">&#xe7f1;</i></span>
                                            </div>
                                            <input type="text" name="ds_nome_servico" id="ds_nome_servico" class="form-control" value="<?php
                                            echo isset($servico->ds_nome_servico) ? $servico->ds_nome_servico : null;
                                            ?>" placeholder="Nome do Serviço">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">&#xe0c8;</i></span>
                                            </div>
                                            <input type="text" name="ds_cidade" id="ds_cidade" class="form-control" value="<?php
                                            echo isset($servico->ds_cidade) ? $servico->ds_cidade : null;
                                            ?>" placeholder="Cidade">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">escalator_warning</i></span>
                                            </div>
                                            <input type="text" name="nr_idade_minima" id="nr_idade_minima" class="form-control" value="<?php
                                            echo isset($servico->nr_idade_minima) ? $servico->nr_idade_minima : null;
                                            ?>" placeholder="Idade Mínima">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">elderly</i></span>
                                            </div>
                                            <input type="text" name="nr_idade_maxima" id="nr_idade_maxima" class="form-control" value="<?php
                                            echo isset($servico->nr_idade_maxima) ? $servico->nr_idade_maxima : null;
                                            ?>" placeholder="Idade Máxima">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">&#xe916;</i></span>
                                            </div>
                                            <input type="text" name="nr_dias_semana" id="nr_dias_semana" class="form-control" value="<?php
                                            echo isset($servico->nr_dias_semana) ? $servico->nr_dias_semana : null;
                                            ?>" placeholder="Dias da Semana">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">hail</i></span>
                                            </div>
                                            <h6 class="form-control">Exige Pickup?<h6>
                                                    <div>   
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="fg_exige_pickup" id="fg_exige_pickup" <?php
                                                            if (isset($servico->fg_exige_pickup)) {
                                                                if ($servico->fg_exige_pickup == 1) {
                                                                    echo 'checked';
                                                                } else {
                                                                    echo'unchecked';
                                                                }
                                                            }
                                                            ?> >
                                                            <label for="checkbox1"></label>
                                                        </span>
                                                    </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="material-icons">toggle_on</i></span>
                                                        </div>
                                                        <h6 class="form-control">Ativo?<h6>
                                                                <div>   
                                                                    <span class="custom-checkbox">
                                                                        <input type="checkbox" name="fg_ativo" id="fg_ativo" <?php
                                                                        if (isset($servico->fg_ativo)) {
                                                                            if ($servico->fg_ativo == 1) {
                                                                                echo 'checked';
                                                                            } else {
                                                                                echo'unchecked';
                                                                            }
                                                                        }
                                                                        ?> >
                                                                        <label for="checkbox2"></label>
                                                                    </span>
                                                                </div>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="material-icons">group_add</i></span>
                                                                    </div>
                                                                    <h6 class="form-control">Privativo?<h6>
                                                                            <div>   
                                                                                <span class="custom-checkbox">
                                                                                    <input type="checkbox" name="fg_privativo" id="fg_privativo" <?php
                                                                                    if (isset($servico->fg_privativo)) {
                                                                                        if ($servico->fg_privativo == 1) {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo'unchecked';
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                                                    <label for="checkbox3"></label>
                                                                                </span>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-6">  
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">&#xe614;</i></span>
                                                                                    </div>
                                                                                    <input type="text" name="dt_janela_viagem_inicio" id="dt_janela_viagem_inicio" class="form-control input_password" 
                                                                                           value="<?php
                                                                                           if (isset($servico->dt_janela_viagem_inicio)) {
                                                                                               $dt_janela_viagem_inicio1 = str_replace('-', '/', $servico->dt_janela_viagem_inicio);
                                                                                               echo date('d/m/Y', strtotime($dt_janela_viagem_inicio1));
                                                                                           }
                                                                                           ?>" placeholder="Travel Window Início">
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">&#xe615;</i></span>
                                                                                    </div>
                                                                                    <input type="text" name="dt_janela_viagem_fim" id="dt_janela_viagem_fim" class="form-control" 
                                                                                           value="<?php
                                                                                           if (isset($servico->dt_janela_viagem_fim)) {
                                                                                               $dt_janela_viagem_fim1 = str_replace('-', '/', $servico->dt_janela_viagem_fim);
                                                                                               echo date('d/m/Y', strtotime($dt_janela_viagem_fim1));
                                                                                           }
                                                                                           ?>" placeholder="Travel Window Fim">
                                                                                </div>

                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">watch_later</i></span>
                                                                                    </div>
                                                                                    <input type="text" name="nr_deadline" id="nr_deadline" class="form-control" 
                                                                                           value="<?php
                                                                                           if (isset($servico->nr_deadline)) {
                                                                                               $nr_deadline1 = str_replace('-', '/', $servico->nr_deadline);
                                                                                               echo date('d/m/Y', strtotime($nr_deadline1));
                                                                                           }
                                                                                           ?>" placeholder="Deadline">
                                                                                </div>

                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">&#xea21;</i></span>
                                                                                    </div>
                                                                                    <input type="text" name="nr_qt_min_passageiros" id="nr_qt_min_passageiros" class="form-control" 
                                                                                           value="<?php echo isset($servico->nr_qt_min_passageiros) ? $servico->nr_qt_min_passageiros : null;
                                                                                           ?>" placeholder="Quantidade Mínima Pax">
                                                                                </div>

                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">paid</i></span>
                                                                                    </div>
                                                                                    <input type="text" name="nr_valor_unitario" id="nr_valor_unitario" class="form-control" 
                                                                                           value="<?php echo isset($servico->nr_valor_unitario) ? $servico->nr_valor_unitario : null;
                                                                                           ?>" placeholder="Preço por pax">
                                                                                </div>

                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">production_quantity_limits</i></span>
                                                                                    </div>
                                                                                    <input type="text" name="nr_quantidade_loteamento" id="nr_quantidade_loteamento" class="form-control" 
                                                                                           value="<?php echo isset($servico->nr_quantidade_loteamento) ? $servico->nr_quantidade_loteamento : null;
                                                                                           ?>" placeholder="Allotment quantidade">
                                                                                </div>

                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="material-icons">description</i></span>
                                                                                    </div>
                                                                                    <input type="textarea" name="ds_descricao_servico" id="ds_descricao_servico" class="form-control" 
                                                                                           value="<?php echo isset($servico->ds_descricao_servico) ? $servico->ds_descricao_servico : null;
                                                                                           ?>" placeholder="Descricao Servico">

                                                                                </div>
                                                                                <div class="card-footer">
                                                                                    <input type="hidden" name="id" id="id" value="<?php echo isset($servico->id_servico) ? $servico->id_servico : null; ?>" />
                                                                                    <button class="btn btn-success" type="submit">Salvar</button>
                                                                                    <button class="btn btn-secondary">Limpar</button>
                                                                                    <a class="btn btn-danger" href="?controller=ServicoController&method=listar">Cancelar</a>
                                                                                </div>

                                                                            </div>
                                                                            </form>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </table>
                                                                            </div>
                                                                            </div>        
                                                                            </div>
