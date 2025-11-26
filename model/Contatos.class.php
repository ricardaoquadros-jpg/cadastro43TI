<?php
declare(strict_types=1);

class Contatos
{

    public function __construct(
        private ?int $id = null,
        private ?string $nome = null,
        private ?string $telefone = null,
        private ?string $email = null
    ) {
    }

    // GETTERS
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    // SETTERS (Mantidos para flexibilidade, mas o construtor é preferível)
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}