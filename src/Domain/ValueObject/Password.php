<?php

namespace Domain\ValueObject;

use Domain\Exception\WeakPasswordException;

class Password
{
    private string $hashedPassword;

    public function __construct(string $password)
    {
        if (!$this->isValid($password)) {
            throw new WeakPasswordException("Weak password.");
        }
        $this->hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verify(string $password): bool
    {
        return password_verify($password, $this->hashedPassword);
    }

    public function getHashedValue(): string
    {
        return $this->hashedPassword;
    }

    private function isValid(string $password): bool
    {
        return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password);
    }
}
