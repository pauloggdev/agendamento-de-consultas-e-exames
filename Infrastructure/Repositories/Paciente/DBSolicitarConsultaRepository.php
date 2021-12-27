<?php

namespace Infrastructure\Repositories\Paciente;
use Domain\Entity\Paciente;
use Domain\UseCase\Paciente\SolicitarConsultaRepository;
use Exception;

class DBSolicitarConsultaRepository implements SolicitarConsultaRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function solicitarConsulta(int $codigoConsulta, Paciente $paciente, $data_agenda): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO consulta_solicitadas (consulta_id, nome_paciente, nif_paciente, data_agenda) VALUES(?,?,?,?)");
        try {
            $this->pdo->beginTransaction();
            $stmt->execute(array($codigoConsulta,$paciente->getNome(), $paciente->getNif(), $data_agenda));
            $this->pdo->commit();
            return  $this->pdo->lastInsertId();
        } catch (Exception $e) {
            $this->pdo->rollback();
            return $e->getMessage();
        }
    }
}
