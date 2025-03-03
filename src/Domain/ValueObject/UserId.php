<?php

namespace Domain\ValueObject;

use Ramsey\Uuid\Uuid;

class UserId
{
    private string $id;
    public function __construct(?string $id = null)
    {
        $this->id = $id ? $id : Uuid::uuid4()->toString();
    }

    public function getValue(): string
    {
        return $this->id;
    }
}
