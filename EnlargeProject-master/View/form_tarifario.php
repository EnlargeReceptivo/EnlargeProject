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
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">   
                    <div class="col-md-6">
                        <h2 class="table-subtitle">Editar <b>Tarifário</b></h2>
                        <form action="?controller=TarifarioController&<?php echo isset($tarifario->cod_tarifario) ? "method=atualizar&id={$tarifario->cod_tarifario}" : "method=salvar"; ?>" method="post">
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($tarifario->cod_tarifario) ? $tarifario->cod_tarifario : null; ?>" />
                        <button class="btn btn-success" type="submit">
                            <i class="material-icons">check_circle</i>
                            <span>Salvar</span>
                        </button>

                        <button class="btn btn-secondary" type="submit">
                            <i class="material-icons">cleaning_services</i>
                            <span>Limpar</span>
                        </button>

                        <a href="?controller=TarifarioController&method=listar" class="btn btn-danger" type="submit">
                            <i class="material-icons">&#xe14a;</i>
                            <span>Cancelar</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center form_container">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="material-icons">&#xe7f1;</i></span>
                                        </div>
                                        <input type="text" name="nome_tarifario" id="nome_tarifario" class="form-control" value="<?php
                                        echo isset($tarifario->nome_tarifario) ? $tarifario->nome_tarifario : null;
                                        ?>" placeholder="Nome do Tarifário">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="material-icons">&#xe614;</i></span>
                                        </div>
                                        <input type="text" name="data_servico" id="data_servico" class="form-control" value="<?php
                                        echo isset($tarifario->data_servico) ? $tarifario->data_servico : null;
                                        ?>" placeholder="Data Serviço">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="material-icons">production_quantity_limits</i></span>
                                        </div>
                                        <input type="text" name="qtdeAllotment" id="qtdeAllotment" class="form-control" value="<?php
                                        echo isset($tarifario->qtdeAllotment) ? $tarifario->qtdeAllotment : null;
                                        ?>" placeholder="Qtde. Allotment">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="material-icons">toggle_on</i></span>
                                        </div>
                                        <p class="form-control">Ativo?<p>
                                        <div>   
                                            <span class="custom-checkbox">
                                                <input type="checkbox" name="fg_ativo" id="fg_ativo" <?php
                                                       if (isset($tarifario->fg_ativo)) {
                                                           if ($tarifario->fg_ativo == 1) {
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