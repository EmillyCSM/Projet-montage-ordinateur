<?php

class Processor extends Piece
{
    protected int $id;
    protected float $fequencyCPU;
    protected string $chipsetCompatibility;
    protected int $heartNumber;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getFequencyCPU(): float
    {
        return $this->fequencyCPU;
    }

    public function setFequencyCPU(float $fequencyCPU): self
    {
        $this->fequencyCPU = $fequencyCPU;
        return $this;
    }

    public function getChipsetCompatibility(): string
    {
        return $this->chipsetCompatibility;
    }

    public function setChipsetCompatibility(string $chipsetCompatibility): self
    {
        $this->chipsetCompatibility = $chipsetCompatibility;
        return $this;
    }

    public function getHeartNumber(): int
    {
        return $this->heartNumber;
    }

    public function setHeartNumber(int $heartNumber): self
    {
        $this->heartNumber = $heartNumber;
        return $this;
    }
}
?>