<?php

class user
{
    protected int $id;
    protected string $name;
    protected string $password;
    protected string $email;
    protected bool $isConceptor;


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function getIsConceptor(): bool
    {
        return $this->isConceptor;
    }


    public function setIsConceptor(bool $isConceptor): self
    {
        $this->isConceptor = $isConceptor;
        return $this;
    }
}
?>