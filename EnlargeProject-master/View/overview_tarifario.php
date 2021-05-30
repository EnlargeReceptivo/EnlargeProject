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
                        <h2 class="table-subtitle">
                            <?php
                            echo isset($tarifario->nome_tarifario) ? $tarifario->nome_tarifario : null;
                            ?>
                        </h2>
                    </div>
                    <div class="col-md-6 text-right"> 
                        <a href="?controller=TarifarioController&method=editar&id=<?php echo $tarifario->cod_tarifario; ?>" class="btn btn-warning">
                            <i class="material-icons">&#xe3c9;</i> 
                            <span>Editar</span>
                        </a>
                        <a href="?controller=TarifarioController&method=listar" class="btn btn-danger">
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
                                <div class="card" style="width: 150%; height: 100%;">
                                    </br>
                                    <div class="card-body">
                                        <h5 class="card-title">Código: 
                                            <?php
                                            echo isset($tarifario->cod_tarifario) ? $tarifario->cod_tarifario : null;
                                            ?>
                                        </h5></br>
                                        <p class="card-text text-left">Código Serviço: 
                                            <?php
                                            echo isset($tarifario->id_servico) ? $tarifario->id_servico : null;
                                            ?>
                                        </p>
                                        <p class="card-text text-left">Quantidade Allotment: 
                                            <?php
                                            echo isset($tarifario->qtdeAllotment) ? $tarifario->qtdeAllotment : null;
                                            ?>
                                        </p>
                                        <p class="card-text text-left">Data: 
                                            <?php
                                            echo isset($tarifario->data_servico) ? $tarifario->data_servico : null;
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card" style="width: 60%; float: right">
                                    <div class="card-body">
                                        <h5 class="card-title text-left">Descrição</h5>
                                        <p class="card-text text-left">nao tem                                      
                                        </p></br></br>
                                        <p class="card-text">Informações Úteis</p>
                                        <p class="card-text text-left">Ativo? 
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox2" disabled>
                                                <label for="checkbox2">
                                                    <?php
                                                        echo isset($tarifario->ativo) ? $tarifario->ativo : null;
                                                    ?>
                                                </label>
                                            </span>
                                        </p>

                                        <p class="card-text text-left">Privativo? 
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" checked disabled>
                                                <label for="checkbox1"></label>
                                            </span>
                                        </p>

                                        <a href="?controller=TarifarioController&method=inativar&id=<?php echo $tarifario->cod_tarifario ?>" class="btn btn-danger"onClick="setTimeout()">Inativar</a>
                                    </div>
                                </div>

                                <div class="card" style="width: 60%; height: responsive; float: right">
                                    <div class="card-body">
                                        <h5 class="card-title text-left">Extras</h5>
                                        <table class="table-responsive">
                                            <thead>
                                            <tbody>
                                            <th>Código</th>
                                            <th>Tarifário</th>
                                            <tr>
                                                <td>Salve</td>
                                                <td>Ok</td>
                                            </tr>
                                            </tbody>
                                            </thead>
                                        </table>
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

<script lang="Javascript">
    if (document.referrer !== document.location.href) {
        setTimeout(function () {
            document.location.reload()
        }, 200);
    }
</script>