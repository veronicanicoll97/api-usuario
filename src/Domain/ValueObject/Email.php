<?php

namespace Domain\ValueObject;

use Domain\Exception\InvalidEmailException;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException("Formato de email no válido.");
        }
        $this->email = $email;
    }

    public function getValue(): string
    {
        return $this->email;
    }
}
