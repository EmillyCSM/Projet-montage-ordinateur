<?php
class HardDisk extends Piece
{
    protected int $id;
    protected bool $isSSD = false;
    protected int $capacity = 0;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['isSSD'])) {
            $this->setIsSSD(($data['isSSD']));

        }
        if (!empty($data['capacity'])) {
            $this->setCapacity($data['capacity']);
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