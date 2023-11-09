<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]  // primary key
    #[ORM\GeneratedValue]  // auto increment
    #[ORM\Column] // type integer declared by default as a column 
    private ?int $id = null;

    #[ORM\Column(length: 255)] // type varchar(255)
    private ?string $username = null;

    #[ORM\Column(length: 255)] // type varchar(255)
    private ?string $email = null; 

    public function getId(): ?int // ?int means that the return value can be null
    {
        return $this->id;
    }

    public function getUsername(): ?string // ?string means that the return value can be null
    {
        return $this->username;
    }

    public function setUsername(string $username): static 
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
