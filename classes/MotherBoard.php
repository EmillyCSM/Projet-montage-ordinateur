<?php
class MotherBoard extends Piece
{
    protected int $id;
    protected bool $isStock;
    protected int $capacity;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getIsStock(): bool
    {
        return $this->isStock;
    }

    public function setIsStock(bool $isStock): self
    {
        $this->isStock = $isStock;
        return $this;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;
        return $this;
    }
}