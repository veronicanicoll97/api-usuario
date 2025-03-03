<?php

declare(strict_types=1);

namespace Domain\Events;

use Domain\Entities\User;

class UserRegisteredEvent
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function user(): User
    {
        return $this->user;
    }
}
