<?php

declare(strict_types=1);
namespace Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use Domain\ValueObject\UserId;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;
use Domain\ValueObject\Name;

#[ORM\Entity]
#[ORM\Table(name: "users")]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: "string")]
    private UserId $id;
    #[ORM\Column(type: "string", length: 50)]
    private Name $name;
    #[ORM\Column(type: "string", unique: true)]
    private Email $email;
    #[ORM\Column(type: "string")]
    private Password $password;
    #[ORM\Column(type: "datetime")]
    private \DateTime $createdAt;

    public function __construct(UserId $id, Name $name, Email $email, Password $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new \DateTime();
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}
