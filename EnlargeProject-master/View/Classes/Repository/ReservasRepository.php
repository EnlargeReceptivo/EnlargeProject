<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Repository;

use DB\MySQL;
use InvalidArgumentException;
use Util\ConstantesGenericasUtil;

/**
 * Description of ReservasRepository
 *
 * @author Adans
 */
class ReservasRepository {

    private object $MySQL;

    public const TABELA = "tb_reservas";

    public function __construct() {
        $this->MySQL = new MySQL();
    }

    public function insereReserva($cod_tarifario, $horario, $nome_titular, $idade_titular, $idade_junior, $idade_senior, $info_voo_htl, $qtde_pax) {
        $consultaInsert = 'INSERT INTO ' . self::TABELA . ' (cod_tarifario, horario, nome_titular, idade_titular, idade_junior, idade_senior, info_voo_htl, qtde_pax) ' . ' VALUES(:cod_tarifario, :horario, :nome_titular, :idade_titular, :idade_junior, :idade_senior, :info_voo_htl, :qtde_pax)';

        $this->MySQL->getDb()->beginTransaction();

        $stmt = $this->MySQL->getDb()->prepare($consultaInsert);
        $stmt->bindParam(':cod_tarifario', $cod_tarifario);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':nome_titular', $nome_titular);
        $stmt->bindParam(':idade_titular', $idade_titular);
        $stmt->bindParam(':idade_junior', $idade_junior);
        $stmt->bindParam(':idade_senior', $idade_senior);
        $stmt->bindParam(':info_voo_htl', $info_voo_htl);
        $stmt->bindParam(':qtde_pax', $qtde_pax);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function updateReserva($id, $dados) {
        $consultaUpdate = 'UPDATE ' . self::TABELA . ' SET cod_tarifario = :cod_tarifario, horario = :horario, status_reserva = :status_reserva WHERE num_reserva = :num_reserva';

        $this->MySQL->getDb()->beginTransaction();

        $stmt = $this->MySQL->getDb()->prepare($consultaUpdate);
        $stmt->bindParam(':num_reserva', $id);
        $stmt->bindParam(':cod_tarifario', $dados['cod_tarifario']);
        $stmt->bindParam(':horario', $dados['horario']);
        $stmt->bindParam(':status_reserva', $dados['status_reserva']);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getMySQL() {
        return $this->MySQL;
    }
}