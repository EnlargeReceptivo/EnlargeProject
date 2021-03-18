<?php

class UsuariosController extends Controller
{

    /**
     * Lista os contatos
     */
    public function listar()
    {
        $usuarios = Usuario::all();
        return $this->view('grade', ['usuarios' => $usuarios]);
    }

    /**
     * Mostrar formulario para criar um novo contato
     */
    public function criar()
    {
        return $this->view('form');
    }

    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::find($id);

        return $this->view('form', ['usuario' => $usuario]);
    }

    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $usuario           = new Usuario;
        $usuario->nome     = $this->request->nome;
        $usuario->telefone = $this->request->telefone;
        $usuario->email    = $this->request->email;
        $usuario->senha    = $this->request->senha;
        $usuario->cpf    = $this->request->cpf;
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
        $usuario->nome     = $this->request->nome;
        $usuario->telefone = $this->request->telefone;
        $usuario->email    = $this->request->email;
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