<div class="container">
 <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">   
                            <div class="col-md-6">
                                <h2 class="table-subtitle">Gerenciar <b>Serviços</b></h2>
                            </div>
                        </div>
                    </div></div></div>
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Cód</th>
                <th>Título</th>
                <th>Cidade</th>
                <th>TW Início</th>
                <th>TW Fim</th>
                <th>Pickup?</th>
                <th>Deadline</th>
                <th>Preço</th>
                <th>Ativo?</th>
                <th><a href="?controller=ServicoController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($servicos) {
                foreach ($servicos as $servico) {
                    ?>
                    <tr>
                        <td><?php echo $servico->id_servico; ?></td>
                        <td><?php echo $servico->ds_nome_servico; ?></td>
                        <td><?php echo $servico->ds_cidade; ?></td>
                         <td><?php 
                            $dt_janela_viagem_inicio1 = str_replace('-', '/', $servico->dt_janela_viagem_inicio);
                            echo date('d/m/Y', strtotime($dt_janela_viagem_inicio1));?></td>
                         <td><?php 
                            $dt_janela_viagem_fim1 = str_replace('-', '/', $servico->dt_janela_viagem_fim);
                            echo date('d/m/Y', strtotime($dt_janela_viagem_fim1));?></td>
                        <td><?php echo $servico->fg_exige_pickup; ?></td>
                        <td><?php 
                            $dt_deadline1 = str_replace('-', '/', $servico->dt_deadline);
                            echo date('d/m/Y', strtotime($dt_deadline1));?></td>
                        <td><?php echo $servico->nr_valor_unitario; ?></td>
                        <td><?php echo $servico->fg_ativo; ?></td>
                        <td>
                            <a href="?controller=ServicoController&method=editar&id=<?php echo $servico->id_servico; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=ServicoController&method=excluir&id=<?php echo $servico->id_servico; ?>" class="btn btn-danger btn-sm">Excluir</a>
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