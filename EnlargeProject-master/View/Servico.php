<?php

/**
 * Classe Servico, nesta classe deve conter todos as acoes que o usuario do sistema deve fazer relacionado a servicos
 * @author Victor Machado Lobo da silva - 06-04-2021
 */

class Servico {
    
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
        if (!isset($this->id_servico)) {
            $query = "INSERT INTO tb_servicos (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values($colunas)).");";
        } else {
            foreach ($colunas as $key => $value) {
                if ($key !== 'id_servico') {
                    $definir[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE tb_servicos SET ".implode(', ', $definir)." WHERE id_servico='{$this->id_servico}';";
        }
        if ($conexao = Conexao::getInstance()) {
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        }
        return false;
    }
    
    public function cadastrarServico($ds_nome_servico, $dt_criacao_data, $ds_cidade, $nr_idade_minima, $nr_idade_maxima, $dt_janela_viagem_inicio, $dt_janela_viagem_fim, $ds_dias_semana, $nr_deadline, $fg_exige_pickup, $fg_ativo, $ds_descricao_servico, $nr_quantidade_loteamento, $nr_valor_unitario, $nr_qt_min_passageiros, $fg_privativo){
        $conexao = Conexao::getInstance();
        
        $query = "INSERT INTO tb_servicos (ds_nome_servico, dt_criacao_data, ds_cidade, nr_idade_minima, nr_idade_maxima, dt_janela_viagem_inicio, dt_janela_viagem_fim, ds_dias_semana, nr_deadline, fg_exige_pickup, fg_ativo, ds_descricao_servico, nr_quantidade_loteamento, nr_valor_unitario, nr_qt_min_passageiros, fg_privativo) "
                . "values ('$ds_nome_servico', '$dt_criacao_data', '$ds_cidade', '$nr_idade_minima', '$nr_idade_maxima', '$dt_janela_viagem_inicio', '$dt_janela_viagem_fim', '$ds_dias_semana', '$nr_deadline', '$fg_exige_pickup', '$fg_ativo', '$ds_descricao_servico', '$nr_quantidade_loteamento', '$nr_valor_unitario', '$nr_qt_min_passageiros', '$fg_privativo'); ";
        echo $query;
        if ($conexao = Conexao::getInstance()) {
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
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
        $stmt    = $conexao->prepare("SELECT * FROM tb_servicos;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Servico::class)) {
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
        $count   = $conexao->exec("SELECT count(*) FROM tb_servicos;");
        if ($count) {
            return (int) $count;
        }
        return false;
    }

    /**
     * Encontra um recurso pelo id_servico
     * @param type $id_servico
     * @return type
     */
    public static function find($id_servico)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM tb_servicos WHERE id_servico='{$id_servico}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject('Servico');
                    if ($resultado) {
                        return $resultado;
                    }
            }
        }
        return false;
    }

    /**
     * Destruir um recurso
     * @param type $id_servico
     * @return boolean
     */
    public static function destroy($id_servico)
    {
        $conexao = Conexao::getInstance();
        if ($conexao->exec("DELETE FROM tb_servicos WHERE id_servico='{$id_servico}';")) {
            return true;
        }
        return false;
    }
    
}