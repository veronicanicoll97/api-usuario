<?php

declare(strict_types=1);
namespace Infraestructure\Http;

use Application\UseCases\RegisterUserUseCase;
use Application\DTOs\RegisterUserRequest;

class RegisterUserController {
    private RegisterUserUseCase $registerUserUseCase;

    public function __construct(RegisterUserUseCase $registerUserUseCase) {
        $this->registerUserUseCase = $registerUserUseCase;
    }

    public function handle(array $data): array {
        try {
            print_r("HOLA: ");
            print_r($data);
            $request = new RegisterUserRequest($data['name'], $data['email'], $data['password']);
            $userResponse = $this->registerUserUseCase->execute($request);
            // Response in JSON Format
            http_response_code(201);
            echo $userResponse->toJson();
        } catch (\Exception $e) {
            http_response_code(400);
            return ['error' => $e->getMessage()];
        }
    }
}
