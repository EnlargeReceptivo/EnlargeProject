<h1>Usuarios</h1>
<hr>
<div class="container">
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
                foreach ($usuarios as $contato) {
                    ?>
                    <tr>
                        <td><?php echo $contato->nome; ?></td>
                        <td><?php echo $contato->telefone; ?></td>
                        <td><?php echo $contato->email; ?></td>
                        <td>
                            <a href="?controller=UsuariosController&method=editar&id=<?php echo $contato->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=UsuariosController&method=excluir&id=<?php echo $contato->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
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