<?php

class UsuariosController extends Controller
{

    /**
     * Lista os contatos
     */
    public function listar()
    {
        $usuarios = Usuario::all();
        return $this->view('grade_usuario', ['usuarios' => $usuarios]);
    }

    /**
     * Mostrar formulario para criar um novo contato
     */
    public function criar()
    {
        return $this->view('form_usuario');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::find($id);

        return $this->view('form_usuario', ['usuario' => $usuario]);
    }

    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $usuario           = new Usuario;
        $usuario->ds_nome     = $this->request->ds_nome;
        $usuario->nr_telefone = $this->request->nr_telefone;
        $usuario->ds_email    = $this->request->ds_email;
        $usuario->ds_senha    = $this->request->ds_senha;
        $usuario->nr_cpf    = $this->request->nr_cpf;
        if ($usuario->save()) {
            return $this->listar();
        }
    }

    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $usuario           = Usuario::find($id);
        
        $usuario->ds_nome     = $this->request->ds_nome;
        $usuario->nr_telefone = $this->request->nr_telefone;
        $usuario->ds_email    = $this->request->ds_email;
        
        $usuario->save();

        return $this->listar();
    }

    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::destroy($id);
        return $this->listar();
    }
}