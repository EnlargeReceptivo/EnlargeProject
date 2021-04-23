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
                <li><a href="index.php">Início</a></li>
                <li><a href="?controller=ServicoController&method=listar">Serviços</a></li>
                <div class="menupicked">
                    <li><a href="?controller=ReservaController&method=listar">Reservas</a></li>
                </div>
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
                        <h2 class="table-subtitle">Editar <b>Reserva</b></h2>
                        <form action="?controller=ReservaController&<?php echo isset($reserva->num_reserva) ? "method=atualizar&id={$reserva->num_reserva}" : "method=salvar"; ?>" method="post">
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($reserva->num_reserva) ? $reserva->num_reserva : null; ?>" />
                        <button class="btn btn-success" type="submit">
                            <i class="material-icons">check_circle</i>
                            <span>Salvar</span>
                        </button>

                        <button class="btn btn-secondary" type="submit">
                            <i class="material-icons">cleaning_services</i>
                            <span>Limpar</span>
                        </button>

                        <a href="?controller=ReservaController&method=listar" class="btn btn-danger" type="submit">
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
                                            <span class="input-group-text"><i class="material-icons">pin</i></span>
                                        </div>
                                        <input type="text" name="cod_tarifario" id="cod_tarifario" class="form-control" value="<?php
                                        echo isset($reserva->cod_tarifario) ? $reserva->cod_tarifario : null;
                                        ?>" placeholder="Código do Tarifário">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="material-icons">&#xe614;</i></span>
                                        </div>
                                        <input type="date" name="data_servico" id="data_servico" class="form-control" value="<?php
                                        echo isset($reserva->data_servico) ? $reserva->data_servico : null;
                                        ?>" placeholder="Data Serviço">
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
                                        <input type="text" name="status_reserva" id="status_reserva" class="form-control" value="<?php
                                        echo isset($reserva->status_reserva) ? $reserva->status_reserva : null;
                                        ?>" placeholder="Status Reserva">
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