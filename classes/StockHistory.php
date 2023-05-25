<?php
class StockHistory
{
    protected int $id;
    protected string $creationDate = '';
    protected bool $isEnter = false;
    protected int $quantity = 0;
    protected int $id_1; // id de la pièce

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    public function setCreationDate(string $creationDate): self
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getIsEnter(): bool
    {
        return $this->isEnter;
    }

    public function setIsEnter(bool $isEnter): self
    {
        $this->isEnter = $isEnter;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getId_1(): int
    {
        return $this->id_1;
    }

    public function setId_1(int $id_1): self
    {
        $this->id_1 = $id_1;
        return $this;
    }
}