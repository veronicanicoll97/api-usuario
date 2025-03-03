<?php
declare(strict_types=1);

namespace Application\DTOs;

use Domain\Entities\User;

class UserResponse
{
    private string $id;
    private string $name;
    private string $email;
    private string $createdAt;

    public function __construct(User $user)
    {
        $this->id = (string) $user->id();
        $this->name = $user->name()->value();
        $this->email = $user->email()->value();
        $this->createdAt = $user->createdAt()->format('Y-m-d H:i:s');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'createdAt' => $this->createdAt,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }
}
