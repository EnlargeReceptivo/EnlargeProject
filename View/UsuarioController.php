<?php

class UsuarioController extends Controller
{

    /**
     * Lista os 
     */
    public function listar()
    {
        $usuarios = Usuario::all();
        return $this->view('grade', ['usuarios' => $usuarios]);
    }

    /**
     * Mostrar formulario para criar um novo usuario
     */
    public function criar()
    {
        return $this->view('form');
    }

    /**
     * Mostrar formulário para editar um usuario
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::find($id);

        return $this->view('form', ['usuario' => $usuario]);
    }

    /**
     * Salvar o usuario submetido pelo formulário
     */
    public function salvar()
    {
        $usuario           = new Usuario;
        $usuario->nome     = $this->request->nome;
        $usuario->telefone = $this->request->telefone;
        $usuario->email    = $this->request->email;
        if ($usuario->save()) {
            return $this->listar();
        }
    }

    /**
     * Atualizar o usuario conforme dados submetidos
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
     * Apagar um usuario conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::destroy($id);
        return $this->listar();
    }
}