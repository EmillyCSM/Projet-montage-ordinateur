<?php
class Supply extends Piece
{
    protected int $id;
    protected float $powerSupply = 0;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['powerSupply'])) {
            $this->setPowerSupply($data['powerSupply']);
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

    public function getPowerSupply(): float
    {
        return $this->powerSupply;
    }

    public function setPowerSupply(float $powerSupply): self
    {
        $this->powerSupply = $powerSupply;
        return $this;
    }
}

?>