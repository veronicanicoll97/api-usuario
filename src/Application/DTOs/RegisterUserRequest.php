<?php
declare(strict_types=1);

namespace Application\DTOs;

use Domain\Entities\User;

class RegisterUserRequest
{
    private string $name;
    private string $email;
    private string $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }
}