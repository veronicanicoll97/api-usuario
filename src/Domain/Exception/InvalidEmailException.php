<?php
namespace Domain\Exception;

class InvalidEmailException extends \Exception
{
    private string $email;
    // Redefine the exception so message isn't optional
    public function __construct(string $email, $message, $code = 0, Throwable $previous = null)
    {
        $this->email = $email;
        parent::__construct("$message: $email", $code, $previous);
    }

    // custom string representation of object
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
