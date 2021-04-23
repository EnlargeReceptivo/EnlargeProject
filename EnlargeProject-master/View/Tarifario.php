<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tarifario {
    
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

    public function save()
    {
        $colunas = $this->preparar($this->atributos);
        if (!isset($this->cod_tarifario)) {
            $query = "INSERT INTO tb_tarifarios (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values($colunas)).");";
        } else {
            foreach ($colunas as $key => $value) {
                if ($key !== 'cod_tarifario') {
                    $definir[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE tb_tarifarios SET ".implode(', ', $definir)." WHERE cod_tarifario='{$this->cod_tarifario}';";
        }
        if ($conexao = Conexao::getInstance()) {
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        }
        return false;
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
        $stmt    = $conexao->prepare("SELECT * FROM tb_tarifarios;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Tarifario::class)) {
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
        $count   = $conexao->exec("SELECT count(*) FROM tb_tarifarios;");
        if ($count) {
            return (int) $count;
        }
        return false;
    }

    /**
     * Encontra um recurso pelo cod_tarifario
     * @param type $cod_tarifario
     * @return type
     */
    public static function find($cod_tarifario)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM tb_tarifarios WHERE cod_tarifario='{$cod_tarifario}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject('Tarifario');
                    if ($resultado) {
                        return $resultado;
                    }
            }
        }
        return false;
    }

    /**
     * Destruir um recurso
     * @param type $cod_tarifario
     * @return boolean
     */
    public static function destroy($cod_tarifario)
    {
        $conexao = Conexao::getInstance();
        if ($conexao->exec("DELETE FROM tb_tarifarios WHERE cod_tarifario='{$cod_tarifario}';")) {
            return true;
        }
        return false;
    }
    
}
