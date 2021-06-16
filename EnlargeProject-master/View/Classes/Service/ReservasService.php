<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Service;

use Util\ConstantesGenericasUtil;
use Repository\ReservasRepository;
use InvalidArgumentException;

/**
 * Description of ResevasService
 *
 * @author Adans
 */
class ReservasService {

    public const TABELA = 'tb_reservas';
    public const RECURSOS_GET = ['listar'];
    //public const RECURSOS_DELETE = ['deletar'];
    public const RECURSOS_POST = ['cadastrar'];
    public const RECURSOS_PUT = ['atualizar'];

    private array $dados;
    private array $dadosCorpoRequest = [];
    private object $ReservasRepository;

    public function __construct($dados = []) {
        $this->dados = $dados;
        $this->ReservasRepository = new ReservasRepository();
    }

    public function validarGet() {
        $retorno = null;
        $recurso = $this->dados['recurso'];

        if (in_array($recurso, self::RECURSOS_GET, true)) {
            $retorno = $this->dados['num_reserva'] > 0 ? $this->getOneByKey() : $this->$recurso();
        } else {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if ($retorno === null) {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        return $retorno;
    }

    /* public function validarDelete() {

      $retorno = null;
      $recurso = $this->dados['recurso'];

      if(in_array($recurso, self::RECURSOS_DELETE, true)){
      if($this->dados['num_reserva'] > 0){
      $retorno = $this->$recurso();
      }else{
      throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_ID_OBRIGATORIO);
      }
      }else{
      throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
      }

      if($retorno === null){
      throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
      }

      //return $retorno;

      } */

    public function validarPost() {

        $retorno = null;
        $recurso = $this->dados['recurso'];

        if (in_array($recurso, self::RECURSOS_POST, true)) {
            $retorno = $this->$recurso();
        } else {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if ($retorno === null) {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        return $retorno;
    }

    public function validarPut() {
        $retorno = null;
        $recurso = $this->dados['recurso'];

        if (in_array($recurso, self::RECURSOS_PUT, true)) {
            if ($this->dados['num_reserva'] > 0) {
                $retorno = $this->$recurso();
            } else {
                throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_ID_OBRIGATORIO);
            }
        } else {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if ($retorno === null) {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        //return $retorno;
    }

    public function setDadosCorpoRequest($dadosRequest) {
        $this->dadosCorpoRequest = $dadosRequest;
    }

    private function getOneByKey() {
        return $this->ReservasRepository->getMySQL()->getOneByKey(self::TABELA, $this->dados['num_reserva']);
    }

    private function listar() {
        return $this->ReservasRepository->getMySQL()->getALL(self::TABELA);
    }

    private function deletar() {
        //$this->ReservasRepository->getMySQL()->delete(self::TABELA, $this->dados['num_reserva']);
    }

    private function cadastrar() {
        [$cod_tarifario, $horario, $nome_titular, $idade_titular, $idade_junior, $idade_senior, $info_voo_htl, $qtde_pax] =
            [$this->dadosCorpoRequest['cod_tarifario'], $this->dadosCorpoRequest['horario'],
            $this->dadosCorpoRequest['nome_titular'], $this->dadosCorpoRequest['idade_titular'],
            $this->dadosCorpoRequest['idade_junior'], $this->dadosCorpoRequest['idade_senior'],
            $this->dadosCorpoRequest['info_voo_htl'], $this->dadosCorpoRequest['qtde_pax']];
                
        if ($cod_tarifario && $horario && $nome_titular && $idade_titular && $idade_junior && $idade_senior && $info_voo_htl && $qtde_pax) {
            if ($this->ReservasRepository->insereReserva($cod_tarifario, $horario, $nome_titular, $idade_titular, $idade_junior, $idade_senior, $info_voo_htl, $qtde_pax) > 0) {
                $numInserido = $this->ReservasRepository->getMySQL()->getDb()->lastInsertId();
                $this->ReservasRepository->getMySQL()->getDb()->commit();

                $con = mysqli_connect("localhost", "root", "", "enlargebd");
                mysqli_query($con, "SET @p0='" . $qtde_pax . "'");
                mysqli_query($con, "SET @p1='" . $cod_tarifario . "'");
                mysqli_query($con, "SET @p2='" . $numInserido . "'");

                mysqli_multi_query($con, "CALL PR_ALLOTMENT(@p0, @p1, @p2)") OR DIE(mysqli_error($con));

                mysqli_close($con);

                return ['num_inserido' => $numInserido];
            }

            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }
        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_LOGIN_SENHA_OBRIGATORIO);
    }

    private function atualizar() {
        
        $codTarif = $this->dadosCorpoRequest['cod_tarifario'];
        
        if ($this->ReservasRepository->updateReserva($this->dados['num_reserva'], $this->dadosCorpoRequest) > 0) {
            $this->ReservasRepository->getMySQL()->getDb()->commit();
            
            $con = mysqli_connect("localhost", "root", "", "enlargebd");
            
            mysqli_query($con, "SET @p0='" . $this->dados['qtde_pax'] . "'");
            mysqli_query($con, "SET @p1='" . $this->dadosCorpoRequest['cod_tarifario'] . "'");
            mysqli_query($con, "SET @p2='" . $this->dados['num_reserva'] . "'");

            mysqli_multi_query($con, "CALL PR_ALLOTMENT(@p0, @p1, @p2)") OR DIE(mysqli_error($con));

            mysqli_close($con);

            return ConstantesGenericasUtil::MSG_ATUALIZADO_SUCESSO;
        }
        $this->ReservasRepository->getMySQL()->getDb()->rollBack();
        throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_NAO_AFETADO);
    }

}
