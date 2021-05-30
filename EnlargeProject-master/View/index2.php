<?php

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);

/* Criando um autoload de Classes */
//use api\ExemploHelper;
use Util\ConstantesGenericasUtil;
use Util\RotasUtil; 
use Util\JsonUtil;
use Validator\RequestValidator;

include 'Bootstrap.php';

//require 'autoload.php';
//$ExemploHelper = new ExemploHelper();

try {
    $requestValidator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $requestValidator->processarRequest();
    $JsonUtil = new JsonUtil();
    $JsonUtil->processarArrayParaRetorno($retorno);
    
}catch(Exception $e){
    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => utf8_encode($e->getMessage())
    ]);
}