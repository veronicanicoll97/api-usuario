<?php

declare(strict_types=1);

namespace Application\Listeners;

use Domain\Events\UserRegisteredEvent;

class SendWelcomeEmailListener
{
    public function __invoke(UserRegisteredEvent $event): void
    {
        $user = $event->user();
        $email = $user->email();

        // Simular el envío de un email
        echo "📧 Enviando email de bienvenida a: {$email}\n";
    }
}
