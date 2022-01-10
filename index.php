<?php
require __DIR__ . "/vendor/autoload.php";

use App\Domain\Entity\Paciente;
use App\Domain\ObjectValues\Endereco;
use App\Domain\ObjectValues\NIF;
use App\Domain\UseCase\Medico\CadastrarPaciente;
use App\Domain\UseCase\Paciente\CancelarConsulta;
use App\Domain\UseCase\Paciente\SolicitarConsulta;
use App\Infrastructure\Repositories\MYSQL\Paciente\DBCadastrarPacienteRepository;
use App\Infrastructure\Repositories\MYSQL\Paciente\DBCancelarConsultaRepository;
use App\Infrastructure\Repositories\MYSQL\Paciente\DBLoadConsultaRepository;
use App\Infrastructure\Repositories\MYSQL\Paciente\DBSolicitarConsultaRepository;
use CoffeeCode\Router\Router;

$appConfig = require_once __DIR__ . '/Config/app.php';

$router = new Router($appConfig["URL_BASE"]);


$router->namespace("App\Http")->group(null);
$router->get("/","HomeController:index");



$router->group("ops");
$router->get("/{errcode}","HomeController:error");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}











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






// $loader = new \Twig\Loader\FilesystemLoader('views');
// $twig = new \Twig\Environment($loader);


// echo $twig->render('home.twig.php', ['name' => 'Fabien']);


try {


    //solicitar consulta;
    $paciente = new Paciente(new Endereco('A', 'Palanca', 'Luanda'), new NIF('50040030020050'), 26, 'F', 'Delfina Garcia João');
    $solicitarConsultaRepository = new DBSolicitarConsultaRepository($pdo);
    $LoadConsultaRepository = new DBLoadConsultaRepository($pdo);
    $solicitarConsulta = new SolicitarConsulta($solicitarConsultaRepository, $LoadConsultaRepository);
    $consulta = $solicitarConsulta->handle('18', $paciente, '2021-12-26 23:07:00');
    //fim solicitar consulta;


    //cancelar consulta
    $cancelarConsultaRepository = new DBCancelarConsultaRepository($pdo);
    $loadConsultaRepository  = new DBLoadConsultaRepository($pdo);
    $cancelarConsulta = new CancelarConsulta($cancelarConsultaRepository, $loadConsultaRepository);
    $cancelarConsulta->handle('18', '1');
    //fim cancelar consulta

    //Cadastrar Paciente
    $paciente = new Paciente(new Endereco('A', 'Palanca', 'Luanda'), new NIF('50040030020051'), 30, 'M', 'Paulo Gonçalo Garcia João');

    $cadastrarPacienteRepository = new DBCadastrarPacienteRepository($pdo);
    $loadPacienteRepository = new DBLoadConsultaRepository($pdo);
    $cadastrarPaciente = new CadastrarPaciente($cadastrarPacienteRepository, $loadConsultaRepository);
    $cadastrarPaciente->handler($paciente);
    //fim Cadastrar Paciente

} catch (\Exception $e) {
    var_dump($e->getMessage());
}



// $consulta = $DBSolicitarConsultaRepository->solicitarConsulta($consulta);


// $solicitarConsulta = new SolicitarConsulta();
