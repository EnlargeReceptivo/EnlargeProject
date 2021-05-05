<?php

class TarifarioController extends Controller {

    /**
     * Lista os Tarifarios
     */
    public function listar() {
        $tarifarios = Tarifario::all();

        return $this->view('grade_tarifario', ['tarifarios' => $tarifarios]);
    }

    /* Traz o overview do registro */
    public function overview($dado) {
        $id         = (int) $dado['id'];
        $tarifario  = Tarifario::find($id);

        return $this->view('overview_tarifario', ['tarifario' => $tarifario]);
    }

    /* Mostrar formulario para criar um novo tarifario */

    public function criar() {
        return $this->view('form_tarifario');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados) {
        $id = (int) $dados['id'];
        $tarifario = Tarifario::find($id);

        return $this->view('form_tarifario', ['tarifario' => $tarifario]);
    }

    /**
     * Salvar o contato submetido pelo formulário (NAO SERA UTILIZADO POR HORA)

      public function salvar()
      {
      $tarifario           = new Tarifario;
      $tarifario->id_servico = $this->request->id_servico;
      $tarifario->nome_tarifario  = $this->request->nome_tarifario;
      $tarifario->data_servico  = $this->request->data_servico;
      $tarifario->qtdeAllotment  = $this->request->qtdeAllotment;
      $tarifario->ativo  = isset($_POST['ativo']) ? 1 : 0;

      if ($tarifario->save()) {
      return $this->listar();
      }
      } */

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados) {
        $id = (int) $dados['id'];
        $tarifario = Tarifario::find($id);

        $tarifario->nome_tarifario = $this->request->nome_tarifario;
        $tarifario->data_servico = $this->request->data_servico;
        $tarifario->qtdeAllotment = $this->request->qtdeAllotment;
        $tarifario->ativo = isset($_POST['ativo']) ? 1 : 0;

        $tarifario->save();

        return $this->listar();
    }

    /**
     * Apagar um tarifario conforme o id informado
     */
    public function excluir($dados) {
        $id = (int) $dados['id'];
        $tarifario = Tarifario::destroy($id);
        return $this->listar();
    }

}
