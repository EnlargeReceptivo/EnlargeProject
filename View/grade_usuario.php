<div class="container">
     <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">   
                            <div class="col-md-6">
                                <h2 class="table-subtitle">Gerenciar Usuarios</b></h2>
                            </div>
                        </div>
                    </div></div></div>
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th><a href="?controller=UsuariosController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($usuarios) {
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?php echo $usuario->ds_nome; ?></td>
                        <td><?php echo $usuario->nr_telefone; ?></td>
                        <td><?php echo $usuario->ds_email; ?></td>
                        <td>
                            <a href="?controller=UsuariosController&method=editar&id=<?php echo $usuario->id_usuario; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=UsuariosController&method=excluir&id=<?php echo $usuario->id_usuario; ?>" class="btn btn-danger btn-sm">Excluir</a>
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