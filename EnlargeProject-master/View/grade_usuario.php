<div class="menuUsuarios">
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
                <li><a href="?controller=TarifarioController&method=listar">Tarifários</a></li>
                <div class="menupicked">
                    <li><a href="?controller=UsuariosController&method=listar">Usuários</a></li>
                </div>
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
                        <h2 class="table-subtitle">Gerenciar <b>Usuarios</b></h2>
                    </div>
                    <div class="col-md-6 text-right"> 
                        <a href="?controller=UsuariosController&method=criar" class="btn btn-success"><i class="material-icons">&#xE147;</i> 
                            <span>Adicionar novo usuário</span></a>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="centerCheck">Cód</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th class="centerCheck">Perfil</th>
                        <th class="centerCheck">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($usuarios) {
                        foreach ($usuarios as $usuario) {
                            ?>
                            <tr>
                                <td><?php echo $usuario->id_usuario; ?></td>
                                <td><?php echo $usuario->ds_nome; ?></td>
                                <td><?php echo $usuario->nr_telefone; ?></td>
                                <td><?php echo $usuario->ds_email; ?></td>
                                <td class="centerCheck"><?php echo $usuario->id_perfil; ?></td>
                                <td class="centerCheck">
                                    <a href="?controller=UsuariosController&method=editar&id=<?php echo $usuario->id_usuario; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                    <a href="?controller=UsuariosController&method=excluir&id=<?php echo $usuario->id_usuario; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">delete</i></a>
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