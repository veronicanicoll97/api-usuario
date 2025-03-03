<?php

use Infraestructure\Http\RegisterUserController;
use Application\UseCases\RegisterUserUseCase;
use Infraestructure\Persistence\DoctrineUserRepository;
use Domain\Events\EventDispatcher;

require_once __DIR__ . '/../src/Infraestructure/Config/bootstrap.php';
echo __DIR__ . '/../src/Infraestructure/Config/bootstrap.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if($method === 'POST' && $path === '/users' ) {
    // Instanciar dependencias
    $dispatcher = new EventDispatcher();
    $userRepository = new DoctrineUserRepository($entityManager);
    $useCase = new RegisterUserUseCase($userRepository, $dispatcher);
    $controller = new RegisterUserController($useCase);

    // Capturar datos de la solicitud
    $requestData = json_decode(file_get_contents("php://input"), true);
    print_r($requestData);
    // Ejecutar el controlador
    $controller->handle($requestData);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}