<?php
/*
Classe que faz conexao com o banco de dados. Essa classe pode ser reutilizada em outras classes para abrir conexao
*/
class Conexao
{
    private static $conexao;

    private function __construct()
    {}

    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            self::$conexao = new \PDO('mysql:host=localhost;port=3306;dbname=enlargebd', 'root', '');
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
        }
        return self::$conexao;
    }
}