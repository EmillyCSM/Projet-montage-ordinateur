<?php

class Mouse extends Piece
{
    protected int $id;
    protected int $buttonNumber;
    protected bool $isWireless;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getButtonNumber(): int
    {
        return $this->buttonNumber;
    }

    public function setButtonNumber(int $buttonNumber): self
    {
        $this->buttonNumber = $buttonNumber;
        return $this;
    }

    public function getIsWireless(): bool
    {
        return $this->isWireless;
    }

    public function setIsWireless(bool $isWireless): self
    {
        $this->isWireless = $isWireless;
        return $this;
    }
}
?>