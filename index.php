<?php
require __DIR__ . "/vendor/autoload.php";

use Domain\Entity\Paciente;
use Domain\UseCase\Paciente\SolicitarConsulta;
use Infrastructure\Repositories\Paciente\DBLoadConsultaRepository;
use Infrastructure\Repositories\Paciente\DBSolicitarConsultaRepository;
$appConfig = require_once __DIR__ . '/Config/app.php';


// Use cases
$dsn = sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=%s',
    $appConfig['db']['host'],
    $appConfig['db']['port'],
    $appConfig['db']['dbname'],
    $appConfig['db']['charset']
);

$pdo = new PDO($dsn, $appConfig['db']['username'], $appConfig['db']['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_PERSISTENT => TRUE
]);

try {
   
    $paciente = new Paciente('Palanca, Rua A','500400300200',26,'F','Delfina Garcia João');

    $solicitarConsultaRepository = new DBSolicitarConsultaRepository($pdo);
    $LoadConsultaRepository = new DBLoadConsultaRepository($pdo);
    $solicitarConsulta = new SolicitarConsulta($solicitarConsultaRepository, $LoadConsultaRepository);
    $consulta = $solicitarConsulta->handle('44', $paciente, '2021-12-26 23:07:00');

} catch (\Exception $e) {
    var_dump($e->getMessage());
}



// $consulta = $DBSolicitarConsultaRepository->solicitarConsulta($consulta);


// $solicitarConsulta = new SolicitarConsulta();
