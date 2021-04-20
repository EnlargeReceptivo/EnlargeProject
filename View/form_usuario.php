<div class="container">
    <form action="?controller=UsuariosController&<?php echo isset($usuario->id_usuario) ? "method=atualizar&id={$usuario->id_usuario}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
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
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($usuario->id_usuario) ? $usuario->id_usuario : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary">Limpar</button>
                <a class="btn btn-danger" href="?controller=UsuariosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
