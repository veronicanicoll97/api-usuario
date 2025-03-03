<?php

declare(strict_types=1);
namespace Domain\ValueObject;

use Domain\Exception\InvalidEmailException;

class Name
{
    private string $name;
    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 50;
    private const REGEX = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u';

    public function __construct(string $name)
    {
        $this->isValidName($name);
        $this->name = $name;
    }

    private function isValidName(string $name): void
    {
        $length = mb_strlen($name);

        if ($length < self::MIN_LENGTH || $length > self::MAX_LENGTH) {
            throw new InvalidArgumentException('En nombre debe tener entre '.self::MIN_LENGTH.' y '.self::MAX_LENGTH.' caracteres.');
        }

        if (!preg_match(self::REGEX, $name)) {
            throw new InvalidArgumentException('El nombre solo puede contener letras y espacios.');
        }
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
