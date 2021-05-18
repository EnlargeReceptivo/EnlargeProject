<?php

class ServicoController extends Controller {

    /**
     * Lista os Servicos
     */
    public function listar() {
        $servicos = Servico::all();

        return $this->view('grade_servico', ['servicos' => $servicos]);
    }

    /* Traz o overview do registro */

    public function overview($dado) {
        $id = (int) $dado['id'];
        $servico = Servico::find($id);

        return $this->view('overview_servico', ['servico' => $servico]);
    }

    /* Mostrar formulario para criar um novo servico */

    public function criar() {
        return $this->view('form_servico');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados) {
        $id = (int) $dados['id'];
        $servico = Servico::find($id);

        return $this->view('form_servico', ['servico' => $servico]);
    }

    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar() {
        $servico = new Servico;
        $servico->ds_nome_servico = $this->request->ds_nome_servico;
        $servico->dt_criacao_data = $this->request->dt_criacao_data;
        $servico->ds_cidade = $this->request->ds_cidade;
        $servico->nr_idade_minima = $this->request->nr_idade_minima;
        $servico->nr_idade_maxima = $this->request->nr_idade_maxima;
        $servico->ds_dias_semana = $this->request->ds_dias_semana;
        $servico->ds_descricao_servico = $this->request->ds_descricao_servico;
        $servico->nr_quantidade_loteamento = $this->request->nr_quantidade_loteamento;
        $servico->nr_valor_unitario = $this->request->nr_valor_unitario;
        $servico->nr_qt_min_passageiros = $this->request->nr_qt_min_passageiros;
        $servico->fg_exige_pickup = isset($_POST['fg_exige_pickup']) ? 1 : 0;
        $servico->fg_ativo = isset($_POST['fg_ativo']) ? 1 : 0;
        $servico->fg_privativo = isset($_POST['fg_privativo']) ? 1 : 0;

        $dt_janela_viagem_inicio1 = str_replace('/', '-', $this->request->dt_janela_viagem_inicio);
        $servico->dt_janela_viagem_inicio = date('Y-m-d', strtotime($dt_janela_viagem_inicio1));

        $dt_janela_viagem_fim1 = str_replace('/', '-', $this->request->dt_janela_viagem_fim);
        $servico->dt_janela_viagem_fim = date('Y-m-d', strtotime($dt_janela_viagem_fim1));

        $servico->nr_deadline = $nr_deadline;

        if ($servico->save()) {
            $con = mysqli_connect("localhost", "root", "", "enlargebd");
            mysqli_query($con, "SET @p0='" . $servico->ds_nome_servico . "'");
            mysqli_query($con, "SET @p1='" . $servico->nr_quantidade_loteamento . "'");
            mysqli_query($con, "SET @p2='" . $servico->dt_janela_viagem_inicio . "'");
            mysqli_query($con, "SET @p3='" . $servico->dt_janela_viagem_fim . "'");

            mysqli_multi_query($con, "CALL PR_tb_tarifarios(@p0, @p1, @p2, @p3)") OR DIE(mysqli_error($con));
            return $this->listar();
        }
    }

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados) {
        $id = (int) $dados['id'];
        $servico = Servico::find($id);

        $servico->ds_nome_servico = $this->request->ds_nome_servico;
        $servico->dt_criacao_data = $this->request->dt_criacao_data;
        $servico->ds_cidade = $this->request->ds_cidade;
        $servico->nr_idade_minima = $this->request->nr_idade_minima;
        $servico->nr_idade_maxima = $this->request->nr_idade_maxima;
        $servico->nr_deadline = $this->request->nr_deadline;
        $servico->ds_dias_semana = $this->request->ds_dias_semana;

        $servico->ds_descricao_servico = $this->request->ds_descricao_servico;
        $servico->nr_quantidade_loteamento = $this->request->nr_quantidade_loteamento;
        $servico->nr_valor_unitario = $this->request->nr_valor_unitario;
        $servico->nr_qt_min_passageiros = $this->request->nr_qt_min_passageiros;


        $servico->fg_exige_pickup = isset($_POST['fg_exige_pickup']) ? 1 : 0;
        $servico->fg_ativo = isset($_POST['fg_ativo']) ? 1 : 0;
        $servico->fg_privativo = isset($_POST['fg_privativo']) ? 1 : 0;

        $dt_janela_viagem_inicio1 = str_replace('/', '-', $this->request->dt_janela_viagem_inicio);
        $servico->dt_janela_viagem_inicio = date('Y-m-d', strtotime($dt_janela_viagem_inicio1));

        $dt_janela_viagem_fim1 = str_replace('/', '-', $this->request->dt_janela_viagem_fim);
        $servico->dt_janela_viagem_fim = date('Y-m-d', strtotime($dt_janela_viagem_fim1));


        $servico->save();

        return $this->listar();
    }

    /**
     * Apagar um servico conforme o id informado
     */
    public function excluir($dados) {
        $id = (int) $dados['id'];
        $servico = Servico::destroy($id);
        return $this->listar();
    }

}
