<?php
class Keyboard extends Piece
{
    protected int $id;
    protected bool $isWireless = false;
    protected bool $isNumeric = false;
    protected bool $isAzerty = false;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['isWireless'])) {
            $this->setIsWireless($data['isWireless']);

        }
        if (!empty($data['isNumeric'])) {
            $this->setIsNumeric($data['isNumeric']);
        }
        if (!empty($data['isAzerty'])) {
            $this->setIsAzerty($data['isAzerty']);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
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

    public function getIsNumeric(): bool
    {
        return $this->isNumeric;
    }

    public function setIsNumeric(bool $isNumeric): self
    {
        $this->isNumeric = $isNumeric;
        return $this;
    }

    public function getIsAzerty(): bool
    {
        return $this->isAzerty;
    }

    public function setIsAzerty(bool $isAzerty): self
    {
        $this->isAzerty = $isAzerty;
        return $this;
    }
}