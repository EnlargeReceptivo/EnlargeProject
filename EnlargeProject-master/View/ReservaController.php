<?php

class ReservaController extends Controller {

    /**
     * Lista os Reservas
     */
    public function listar() {
        $reservas = Reserva::all();

        return $this->view('grade_reserva', ['reservas' => $reservas]);
    }

    /* Mostrar formulario para criar uma nova reserva */

    public function criar() {
        return $this->view('form_reserva');
    }

    /* public function store(Request $request)
      {
      return response()->json(Reserva::create(['nome_titular' => $request->nome_titular]));
      } */

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados) {
        $id = (int) $dados['id'];
        $reserva = Reserva::find($id);

        return $this->view('form_reserva', ['reserva' => $reserva]);
    }

    /* Traz o overview da reserva */

    public function overview($dado) {
        $id = (int) $dado['id'];
        $reserva = Reserva::find($id);

        return $this->view('overview_reserva', ['reserva' => $reserva]);
    }

    /**
     * Salvar o contato submetido pelo formulário (NAO SERA UTILIZADO POR HORA)

      public function salvar()
      {
      $reserva           = new Reserva;
      $reserva->cod_tarifario = $this->request->cod_tarifario;

      if ($reserva->save()) {
      return $this->listar();
      }
      } */

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados) {
        $id = (int) $dados['id'];
        $reserva = Reserva::find($id);
                
        $reserva->nome_titular = $this->request->nome_titular;
        $reserva->cod_tarifario = $this->request->cod_tarifario;
        $reserva->idade_titular = intval($this->request->idade_titular);
        $reserva->qtde_pax = $this->request->qtde_pax;
        $reserva->info_voo_htl = $this->request->info_voo_htl;
        $reserva->status_reserva = $this->request->status_reserva;

        if ($reserva->save()) {
            $con = mysqli_connect("localhost", "root", "", "enlargebd");

            mysqli_query($con, "SET @p0='" . $reserva->qtde_pax . "'");
            mysqli_query($con, "SET @p1='" . $reserva->cod_tarifario . "'");
            mysqli_query($con, "SET @p2='" . $id . "'");

            mysqli_multi_query($con, "CALL PR_ALLOTMENT(@p0, @p1, @p2)") OR DIE(mysqli_error($con));

            mysqli_close($con);
        }

        return $this->listar();
    }

    /**
     * Apagar um reserva conforme o id informado
     */
    public function excluir($dados) {
        $id = (int) $dados['id'];
        $reserva = Reserva::destroy($id);
        return $this->listar();
    }

}
