<?php
class GraficCard extends Piece
{
    protected int $id;
    protected string $chipset = '';
    protected int $memory = 0;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['chipset'])) {
            $this->setChipset($data['chipset']);

        }
        if (!empty($data['memory'])) {
            $this->setMemory($data['memory']);
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

    public function getChipset(): string
    {
        return $this->chipset;
    }

    public function setChipset(string $chipset): self
    {
        $this->chipset = $chipset;
        return $this;
    }

    public function getMemory(): int
    {
        return $this->memory;
    }

    public function setMemory(int $memory): self
    {
        $this->memory = $memory;
        return $this;
    }
}