<?php
class HardDisk extends Piece
{
    protected int $id;
    protected bool $isSSD;
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

    public function getIsSSD(): bool
    {
        return $this->isSSD;
    }

    public function setIsSSD(bool $isSSD): self
    {
        $this->isSSD = $isSSD;
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