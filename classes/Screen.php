<?php


class Screen extends Piece
{
    protected float $size = 0;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getSize(): float
    {
        return $this->size;
    }

    public function setSize(float $size): self
    {
        $this->size = $size;
        return $this;
    }
}


?>