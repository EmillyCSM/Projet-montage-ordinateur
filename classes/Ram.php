<?php

class Ram extends Piece
{
    protected int $id;
    protected int $capacity = 0;
    protected string $details = '';
    protected int $barsNumber = 0;


    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['capacity'])) {
            $this->setCapacity($data['capacity']);
        }
        if (!empty($data['details'])) {
            $this->setDetails($data['details']);
        }
        if (!empty($data['barsNumber'])) {
            $this->setBarsNumber($data['barsNumber']);
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

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;
        return $this;
    }
    public function getDetails(): string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;
        return $this;
    }

    public function getBarsNumber(): int
    {
        return $this->barsNumber;
    }

    public function setBarsNumber(int $barsNumber): self
    {
        $this->barsNumber = $barsNumber;
        return $this;
    }
}
?>