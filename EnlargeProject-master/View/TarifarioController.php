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
        $id = (int) $dado['id'];
        $tarifario = Tarifario::find($id);

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

    public function inativar($dados) {
        $id = (int) $dados['id'];
        $tarifario = Tarifario::find($id);

        if ($tarifario) {
            $con = mysqli_connect("localhost", "root", "", "enlargebd");
            mysqli_query($con, "UPDATE tb_tarifarios SET ativo = FALSE WHERE cod_tarifario = $tarifario->cod_tarifario");
        }

        /*
         * Array API
         */
        $data_array = array(
            'id' => $tarifario->cod_tarifario,
            'id_servico' => $tarifario->id_servico,
            'ativo' => 'false',
            'data' => $tarifario->data_servico
        );

        $this->pullAPI('PUT', 'https://my-json-server.typicode.com/EnlargeReceptivo/fake_api_teste/reservas/' . $tarifario->cod_tarifario, json_encode($data_array));
        
        return $this->view('overview_tarifario', ['tarifario' => $tarifario]);
    }

    public function pullAPI($param1, $uri, $data) {
        $curl = curl_init();
        switch ($param1) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $uri = sprintf("%s?%s", $uri, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        //var_dump($uri);exit;
        return $result;
    }

    /**
     * Salvar o tarifário submetido pelo formulário (NAO SERA UTILIZADO)

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
        //$tarifario->data_servico = $this->request->data_servico;
        //$tarifario->qtdeAllotment = $this->request->qtdeAllotment;
        //$tarifario->ativo = isset($_POST['ativo']) ? 1 : 0;

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
