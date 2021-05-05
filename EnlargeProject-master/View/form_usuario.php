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
                        <h2 class="table-subtitle">Gerenciar <b>Usuários</b></h2>
                        <form action="?controller=UsuariosController&<?php echo isset($usuario->id_usuario) ? "method=atualizar&id={$usuario->id_usuario}" : "method=salvar"; ?>" method="post" >
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="hidden" name="id" id="id" value="<?php echo isset($usuario->id_usuario) ? $usuario->id_usuario : null; ?>" />
                        <button class="btn btn-success" type="submit">
                            <i class="material-icons">check_circle</i>
                            <span>Salvar</span>
                        </button>

                        <button class="btn btn-secondary" type="submit">
                            <i class="material-icons">cleaning_services</i>
                            <span>Limpar</span>
                        </button>

                        <a href="?controller=UsuariosController&method=listar" class="btn btn-danger" type="submit">
                            <i class="material-icons">&#xe14a;</i>
                            <span>Cancelar</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card" style="top:15px">
                <div class="card-header">
                    <span class="card-title">Usuarios</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Nome:</label>
                    <input type="text" class="form-control col-sm-8" name="ds_nome" id="ds_nome" value="<?php
                    echo isset($usuario->ds_nome) ? $usuario->ds_nome : null;
                    ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Telefone:</label>
                    <input type="text" class="form-control col-sm-8" name="nr_telefone" id="nr_telefone" value="<?php
                    echo isset($usuario->nr_telefone) ? $usuario->nr_telefone : null;
                    ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Email:</label>
                    <input type="email" class="form-control col-sm-8" name="ds_email" id="ds_email" value="<?php
                    echo isset($usuario->ds_email) ? $usuario->ds_email : null;
                    ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Senha:</label>
                    <input type="password" class="form-control col-sm-8" name="ds_senha" id="ds_senha" value="<?php
                    echo isset($usuario->ds_senha) ? $usuario->ds_senha : null;
                    ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">CPF:</label>
                    <input type="text" class="form-control col-sm-8" name="nr_cpf" id="nr_cpf" value="<?php
                           echo isset($usuario->nr_cpf) ? $usuario->nr_cpf : null;
                           ?>" />
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
