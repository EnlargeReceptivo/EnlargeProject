<?php

/**
 * Classe Usuario, nesta classe deve conter todos as acoes que o usuario do sistema pode fazer.
 * @author Victor Machado Lobo da silva - 11-03-2021
 */
class Usuario
{
    private $atributos;

    public function __construct()
    {

    }

    public function __set(string $atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    public function __get(string $atributo)
    {
        return $this->atributos[$atributo];
    }

    public function __isset($atributo)
    {
        return isset($this->atributos[$atributo]);
    }

    /**
     * Inserir na tabela de usuarios
     * @return boolean
     */
    /*
    public function save()
    {
        $colunas = $this->preparar($this->atributos);
        if (!isset($this->id)) {
            $query = "INSERT INTO usuarios (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values($colunas)).");";
        
            if ($conexao = Conexao::getInstance()) {
                $stmt = $conexao->prepare($query);
                if ($stmt->execute()) {
                    return $stmt->rowCount();
                }
            }
        } 
        
        return false;
    }
    */
    public function cadastrar($nome,$cpf,$telefone,$login,$senha){
        $senhaMD5=MD5($senha);
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT ID FROM usuarios WHERE cpf = $cpf");
        if($stmt->rowCount() > 0){
            // já existe um usuario, entao vamos retornar o valor falso, para nao cadastrar novamente 
            return false;
        }else{
            // não existe, cadastrar
            $query = "INSERT INTO usuarios (nome,cpf,telefone,email,senha) values ('$nome','$cpf','$telefone','$login','$senha'); ";
           echo $query;
            if ($conexao = Conexao::getInstance()) {
                $stmt = $conexao->prepare($query);
                if ($stmt->execute()) {
                    return $stmt->rowCount();
                }
            }
        }

    }

    /**
     * Tornar valores aceitos para sintaxe SQL
     * @param type $dados
     * @return string
     */
    private function escapar($dados)
    {
        if (is_string($dados) & !empty($dados)) {
            return "'".addslashes($dados)."'";
        } elseif (is_bool($dados)) {
            return $dados ? 'TRUE' : 'FALSE';
        } elseif ($dados !== '') {
            return $dados;
        } else {
            return 'NULL';
        }
    }

    /**
     * Verifica se dados são próprios para ser salvos
     * @param array $dados
     * @return array
     */
    private function preparar($dados)
    {
        $resultado = array();
        foreach ($dados as $k => $v) {
            if (is_scalar($v)) {
                $resultado[$k] = $this->escapar($v);
            }
        }
        return $resultado;
    }

    /**
     * Retorna uma lista de usuarios
     * @return array/boolean
     */
    public static function all()
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM usuarios;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Usuario::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    /**
     * Retornar o número de registros
     * @return int/boolean
     */
    public static function count()
    {
        $conexao = Conexao::getInstance();
        $count   = $conexao->exec("SELECT count(*) FROM usuarios;");
        if ($count) {
            return (int) $count;
        }
        return false;
    }

    /**
     * Encontra um recurso pelo id
     * @param type $id
     * @return type
     */
    public static function find($id)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM usuarios WHERE id='{$id}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject('Usuario');
                    if ($resultado) {
                        return $resultado;
                    }
            }
        }
        return false;
    }

    /**
     * Destruir um recurso
     * @param type $id
     * @return boolean
     */
    public static function destroy($id)
    {
        $conexao = Conexao::getInstance();
        if ($conexao->exec("DELETE FROM usuarios WHERE id='{$id}';")) {
            return true;
        }
        return false;
    }
     /**
     * fazer login do usuario no sistema
     * @param type 
     * @return boolean
     */
    public static function login($email , $senha)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM usuarios WHERE email='{$email}' AND senha ='{$senha}' ;");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject('Usuario');
                    if ($resultado) {
                        return $resultado;
                    }
            }
        }
        return false;
    }
}