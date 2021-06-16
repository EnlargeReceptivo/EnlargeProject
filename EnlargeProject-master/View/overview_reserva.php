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
                        <h2 class="table-subtitle">Número da Reserva: 
                            <?php
                            echo isset($reserva->num_reserva) ? $reserva->num_reserva : null;
                            ?>
                        </h2>
                    </div>
                    <div class="col-md-6 text-right"> 
                        <a href="?controller=ReservaController&method=editar&id=<?php echo $reserva->num_reserva; ?>" class="btn btn-warning">
                            <i class="material-icons">&#xe3c9;</i> 
                            <span>Editar</></span>
                        </a>
                        <a href="?controller=ReservaController&method=listar" class="btn btn-danger">
                            <i class="material-icons">&#xe317;</i> 
                            <span>Voltar</span>
                        </a>						
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="well text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="width: 145%; height: 100%;"></br>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php
                                            echo isset($reserva->nome_titular) ? $reserva->nome_titular : null;
                                            ?>
                                        </h5></br>
                                        <p class="card-text text-left">Código Tarifário: 
                                            <?php
                                            echo isset($reserva->cod_tarifario) ? $reserva->cod_tarifario : null;
                                            ?>
                                        </p>
                                        <p class="card-text text-left">Data: 
                                            <?php
                                            //$dtSer = str_replace('-', '/', $reserva->data_criacao);
                                            echo date('d/M/Y', strtotime($reserva->data_servico));
                                            ?>
                                        </p>
                                        <p class="card-text text-left">Horário: 
                                            <?php
                                            echo isset($reserva->horario) ? $reserva->horario : null;
                                            ?>
                                        </p>
                                        <p class="card-text text-left">Nome Titular: 
                                            <?php
                                            echo isset($reserva->nome_titular) ? $reserva->nome_titular : null;
                                            ?>
                                        </p>
                                        <p class="card-text text-left">Idade Titular: 
                                            <?php
                                            echo isset($reserva->idade_titular) ? $reserva->idade_titular : null;
                                            ?>                                        
                                        </p>
                                        <p class="card-text text-left">Quantidade Pax: 
                                            <?php
                                            echo isset($reserva->qtde_pax) ? $reserva->qtde_pax : null;
                                            ?> 
                                        </p>
                                        <p class="card-text text-left">Informação Voo/Hotel: 
                                            <?php
                                            echo isset($reserva->info_voo_htl) ? $reserva->info_voo_htl : null;
                                            ?> 
                                        </p>
                                        <p class="card-text text-left text-danger">Status: 
                                            <?php
                                            echo isset($reserva->status_reserva) ? $reserva->status_reserva : null;
                                            ?> 
                                        </p>
                                        <p class="card-text text-left">Data Criação: 
                                            <?php
                                            $dtCria = str_replace('-', '/', $reserva->data_criacao);
                                            echo date('d/M/Y', strtotime($dtCria)) . " às " . date('h:i:s', strtotime($dtCria));
                                            ?> 
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card" style="width: 60%; float: right">
                                    <div class="card-body">
                                        <h5 class="card-title text-left">Descrição</h5>
                                        <p class="card-text text-left">Salve
                                            <?php
                                            echo isset($reserva->ds_descricao_servico) ? $reserva->ds_descricao_servico : null;
                                            ?>                                            
                                        </p></br></br>
                                        <p class="card-text text-left">Idade Júnior: 
                                            <?php
                                            echo isset($reserva->idade_junior) ? $reserva->idade_junior : null;
                                            ?> 
                                        </p>
                                        <p class="card-text text-left">Idade Sênior: 
                                            <?php
                                            echo isset($reserva->idade_senior) ? $reserva->idade_senior : null;
                                            ?> 
                                        </p>
                                        <p class="card-text text-left">Valor Total:
                                            <?php
                                            echo isset($reserva->valor_total) ? $reserva->valor_total : null;
                                            ?> 
                                        </p></br>
                                        <p class="card-text">Informações Úteis</p>
                                        <!--<p class="card-text text-left">Ativo? 
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox2" unchecked disabled>
                                                <label for="checkbox2"></label>
                                            </span>
                                        </p>-->
                                        <a href="#" class="btn btn-danger btn-sm">Cancelar</a>
                                    </div>
                                </div>

                                <div class="card" style="width: 60%; float: right">
                                    <div class="card-body">
                                        <h5 class="card-title text-left">Extras</h5>
                                        <p>Informações extras</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>