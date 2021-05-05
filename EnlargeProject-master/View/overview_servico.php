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

            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="well text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="width: 145%; height: 100%;">
                                    <img src="css/images/imagem_padrao.png" class="card-img-top" alt="Responsive image">
                                    <div class="clearfix">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a href="#">Anterior</a></li>
                                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                                            <li class="page-item"><a href="#" class="page-link">Próximo</a></li>
                                        </ul>
                                    </div></br>
                                    <div class="card-body">
                                        <h5 class="card-title">Código: 
                                            <?php
                                            echo isset($servico->id_servico) ? $servico->id_servico : null;
                                            ?>
                                        </h5></br>
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
                                        <p class="card-text text-left">Data de criação: 
                                            <?php
                                            echo isset($servico->dt_criacao_data) ? $servico->dt_criacao_data : null;
                                            ?> 
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card" style="width: 60%; float: right">
                                    <div class="card-body">
                                        <h5 class="card-title text-left">Descrição</h5>
                                        <p class="card-text text-left">
                                            <?php
                                            echo isset($servico->ds_descricao_servico) ? $servico->ds_descricao_servico : null;
                                            ?>                                            
                                        </p></br></br>
                                        <p class="card-text text-left">Preço por Pax: </br>R$ 
                                            <?php
                                            echo isset($servico->nr_valor_unitario) ? $servico->nr_valor_unitario : null;
                                            ?>  
                                        </p>
                                        <p class="card-text text-left">Travel Window Início: </br>
                                            <?php
                                            echo isset($servico->dt_janela_viagem_inicio) ? $servico->dt_janela_viagem_inicio : null;
                                            ?> 
                                        </p>
                                        <p class="card-text text-left">Travel Window Fim: </br>
                                            <?php
                                            echo isset($servico->dt_janela_viagem_fim) ? $servico->dt_janela_viagem_fim : null;
                                            ?> 
                                        </p></br>
                                        <p class="card-text">Informações Úteis</p>
                                        <p class="card-text text-left">Pickup? 
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" checked disabled>
                                                <label for="checkbox3"></label>
                                            </span>
                                        </p>

                                        <p class="card-text text-left">Ativo? 
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox2" unchecked disabled>
                                                <label for="checkbox2"></label>
                                            </span>
                                        </p>

                                        <p class="card-text text-left">Privativo? 
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" checked disabled>
                                                <label for="checkbox1"></label>
                                            </span>
                                        </p>
                                        <a href="#" class="btn btn-danger">Inativar</a>
                                    </div>
                                </div>

                                <div class="card" style="width: 60%; height: responsive; float: right">
                                    <div class="card-body">
                                        <h5 class="card-title text-left">Tarifários</h5>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <div class="row">
                                                    <thead>
                                                    <tbody>
                                                    <th>Código</th>
                                                    <th>Tarifário</th>
                                                    <?php
                                                    $con = mysqli_connect("localhost", "root", "", "enlargebd");
                                                    $result = mysqli_query($con, "SELECT cod_tarifario, nome_tarifario FROM tb_tarifarios WHERE id_servico = $servico->id_servico");
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
                                                        </tr>
                                                        <?php
                                                    }
                                                    mysqli_close($con);
                                                    ?> 
                                                    </tbody>
                                                    </thead>
                                                </div>
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
</div>
</body>
</html>