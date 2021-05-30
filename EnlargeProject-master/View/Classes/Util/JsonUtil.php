<?php

namespace Util;

use JsonException as JsonExceptionAlias;
use InvalidArgumentException;

class JsonUtil {

    public static function tratarCorpoReqJson() {

        try {
            $postJson = json_decode(file_get_contents('php://input'), true);
        } catch (JsonExceptionAlias $exception) {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_JSON_VAZIO);
        }

        if (is_array($postJson) && count($postJson) > 0) {
            return $postJson;
        }
    }

    public function processarArrayParaRetorno($retorno) {
        $dados = [];
        //$dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_ERRO;

        $retorno = ConstantesGenericasUtil::MSG_ATUALIZADO_SUCESSO;
        $dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_SUCESSO;
        $dados[ConstantesGenericasUtil::RESPOSTA] = $retorno;

        $this->retornarJson($dados);
    }

    private function retornarJson($json) {
        header('Content-Type: application/json');
        header('Cach-Control: no-cache, no-store, must-revalidate');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

        echo json_encode($json);
    }

}
