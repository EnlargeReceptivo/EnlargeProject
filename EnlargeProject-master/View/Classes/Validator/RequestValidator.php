<?php

namespace Validator;

use Repository\TokensAutorizadosRepository;
use Service\ReservasService;
use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator{
    private $request;
    private array $dadosRequest = [];
    private object $TokensAutorizadosRepository;
    
    const GET = 'GET';
    const DELETE = 'DELETE';
    const RESERVAS = 'TB_RESERVAS';
    
    public function __construct($request) {
        $this->request = $request;
        $this->TokensAutorizadosRepository = new TokensAutorizadosRepository();
    }
    
    public function processarRequest() {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        
        //$this->request['metodo'] == 'POST';
        
        if(in_array($this->request['metodo'], ConstantesGenericasUtil::TIPO_REQUEST, true)){
            $retorno = $this->direcionarRequest();
        }
                
        return $retorno;
    }
    
    private function direcionarRequest() {
        if($this->request['metodo'] !== self::GET && $this->request['metodo'] !== self::DELETE){
            $this->dadosRequest = JsonUtil::tratarCorpoReqJson();
        }
        $this->TokensAutorizadosRepository->validarToken(getallheaders()['Authorization']);
        $metodo = $this->request['metodo'];
        
        return $this->$metodo();// mesma coisa que $this->get();

    }

    private function get() {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if(in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_GET, true)){
            switch ($this->request['rota']){
                case self::RESERVAS;
                    $ReservasService = new ReservasService($this->request);
                    $retorno = $ReservasService->validarGet();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        
        return $retorno;
    }
    
    /*private function delete() {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if(in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_DELETE, true)){
            switch ($this->request['rota']){
                case self::RESERVAS;
                    $ReservasService = new ReservasService($this->request);
                    $retorno = $ReservasService->validarDelete();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        
        return $retorno;
    }*/
    
    private function post() {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        
        if(in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_POST, true)){
            switch ($this->request['rota']){
                case self::RESERVAS;
                    $ReservasService = new ReservasService($this->request);
                    $ReservasService->setDadosCorpoRequest($this->dadosRequest);
                    $retorno = $ReservasService->validarPost();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        
        return $retorno;
    }
    
    private function put() {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
                
        if(in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_PUT, true)){
            switch ($this->request['rota']){
                case self::RESERVAS;
                    $ReservasService = new ReservasService($this->request);
                    $ReservasService->setDadosCorpoRequest($this->dadosRequest);
                    $retorno = $ReservasService->validarPut();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        
        return $retorno;
    }
}