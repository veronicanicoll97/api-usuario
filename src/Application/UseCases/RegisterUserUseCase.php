<?php

declare(strict_types=1);
namespace Application\UseCases;

use Domain\Repository\UserRepositoryInterface;
use Domain\Events\UserRegisteredEvent;
use Domain\Events\EventDispatcher;
use Domain\ValueObject\UserId;
use Domain\ValueObject\Email;
use Domain\ValueObject\Name;
use Domain\ValueObject\Password;
use Domain\Entities\User;
use Application\DTOs\RegisterUserRequest;

use Domain\Exception\UserAlreadyExistsException;

class RegisterUserUseCase {
    private UserRepositoryInterface $userRepository;
    private EventDispatcher $eventDispatcher;

    public function __construct(UserRepositoryInterface $userRepository, EventDispatcher $eventDispatcher) {
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function execute(RegisterUserRequest $request): void {

        print_r($request->toArray());
        $userData = $request->toArray();
        // if ($this->userRepository->findById(new Email($userData['email']))) {
        //     throw new UserAlreadyExistsException("Email already in use.");
        // }

        $user = new User(
            new UserId(),
            new Name($userData['name']),
            new Email($userData['email']),
            new Password($userData['password'])
        );

        print_r("user: ");
        print_r($user);
        $this->userRepository->save($user);
        // Aquí se podría disparar el evento UserRegisteredEvent
        $this->eventDispatcher->dispatch(new UserRegisteredEvent($user));
        
    }
}
