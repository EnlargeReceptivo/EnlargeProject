<?php

class ReservaController extends Controller
{
     /**
     * Lista os Reservas
     */
    public function listar()
    {
        $reservas = Reserva::all();
 
        return $this->view('grade_reserva', ['reservas' => $reservas]);
    }
    
    /* Mostrar formulario para criar uma nova reserva*/
    /* NAO SERA UTILIZADO POR ENQUANTO
    public function criar()
    {
        return $this->view('form_reserva');
    }*/

    /**
     * Mostrar formulário para editar um contato
     */
    
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $reserva = Reserva::find($id);

        return $this->view('form_reserva', ['reserva' => $reserva]);
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
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $reserva           = Reserva::find($id);
        
        $reserva->cod_tarifario  = $this->request->cod_tarifario;
        $reserva->nome_titular  = $this->request->nome_titular;
        $reserva->idade_titular  = $this->request->idade_titular;
        $reserva->qtde_pax  = $this->request->qtde_pax;
        $reserva->info_voo_htl  = $this->request->info_voo_htl;
        $reserva->status_reserva  = $this->request->status_reserva;
        
        $reserva->save();

        return $this->listar();
    }

    /**
     * Apagar um reserva conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $reserva = Reserva::destroy($id);
        return $this->listar();
    }
}