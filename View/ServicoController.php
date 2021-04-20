<?php

class ServicoController extends Controller
{
     /**
     * Lista os Servicos
     */
    public function listar()
    {
        $servicos = Servico::all();
 
        return $this->view('grade_servico', ['servicos' => $servicos]);
    }
    /* Mostrar formulario para criar um novo servico*/
    public function criar()
    {
        return $this->view('form_servico');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $servico = Servico::find($id);

        return $this->view('form_servico', ['servico' => $servico]);
    }

    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $servico           = new Servico;
        $servico->ds_nome_servico  = $this->request->ds_nome_servico;
        $servico->dt_criacao_data  = $this->request->dt_criacao_data;
        $servico->ds_cidade  = $this->request->ds_cidade;
        $servico->nr_idade_minima  = $this->request->nr_idade_minima;
        $servico->nr_idade_maxima  = $this->request->nr_idade_maxima;
        $servico->nr_dias_semana  = $this->request->nr_dias_semana; 
         
        $servico->ds_descricao_servico  = $this->request->ds_descricao_servico;
        $servico->nr_quantidade_loteamento  = $this->request->nr_quantidade_loteamento;
        $servico->nr_valor_unitario  = $this->request->nr_valor_unitario;
        $servico->nr_qt_min_passageiros  = $this->request->nr_qt_min_passageiros;
        
        
        $servico->fg_exige_pickup  =  isset($_POST['fg_exige_pickup']) ? 1 : 0;
        $servico->fg_ativo  = isset($_POST['fg_ativo']) ? 1 : 0;
        $servico->fg_privativo  = isset($_POST['fg_privativo']) ? 1 : 0;
        
        $dt_janela_viagem_inicio1 = str_replace('/', '-', $this->request->dt_janela_viagem_inicio);
        $servico->dt_janela_viagem_inicio= date('Y-m-d', strtotime($dt_janela_viagem_inicio1));
        
        $dt_janela_viagem_fim1 = str_replace('/', '-', $this->request->dt_janela_viagem_fim);
         $servico->dt_janela_viagem_fim   = date('Y-m-d', strtotime($dt_janela_viagem_fim1));
        
        $dt_deadline1 = str_replace('/', '-', $this->request->dt_deadline);
         $servico->dt_deadline = date('Y-m-d', strtotime($dt_deadline1));
        
        if ($servico->save()) {
            return $this->listar();
        }
    }

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $servico           = Servico::find($id);
        
        $servico->ds_nome_servico  = $this->request->ds_nome_servico;
        $servico->dt_criacao_data  = $this->request->dt_criacao_data;
        $servico->ds_cidade  = $this->request->ds_cidade;
        $servico->nr_idade_minima  = $this->request->nr_idade_minima;
        $servico->nr_idade_maxima  = $this->request->nr_idade_maxima;
        $servico->nr_dias_semana  = $this->request->nr_dias_semana; 
         
        $servico->ds_descricao_servico  = $this->request->ds_descricao_servico;
        $servico->nr_quantidade_loteamento  = $this->request->nr_quantidade_loteamento;
        $servico->nr_valor_unitario  = $this->request->nr_valor_unitario;
        $servico->nr_qt_min_passageiros  = $this->request->nr_qt_min_passageiros;
        
        
        $servico->fg_exige_pickup  =  isset($_POST['fg_exige_pickup']) ? 1 : 0;
        $servico->fg_ativo  = isset($_POST['fg_ativo']) ? 1 : 0;
        $servico->fg_privativo  = isset($_POST['fg_privativo']) ? 1 : 0;
        
        $dt_janela_viagem_inicio1 = str_replace('/', '-', $this->request->dt_janela_viagem_inicio);
        $servico->dt_janela_viagem_inicio= date('Y-m-d', strtotime($dt_janela_viagem_inicio1));
        
        $dt_janela_viagem_fim1 = str_replace('/', '-', $this->request->dt_janela_viagem_fim);
        $servico->dt_janela_viagem_fim   = date('Y-m-d', strtotime($dt_janela_viagem_fim1));
        
        $dt_deadline1 = str_replace('/', '-', $this->request->dt_deadline);
        $servico->dt_deadline = date('Y-m-d', strtotime($dt_deadline1));
        
        $servico->save();

        return $this->listar();
    }

    /**
     * Apagar um servico conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $servico = Servico::destroy($id);
        return $this->listar();
    }
}