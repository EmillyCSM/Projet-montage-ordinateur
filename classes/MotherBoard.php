<?php
class MotherBoard extends Piece
{
    protected int $id;
    protected bool $isSocket = false;
    protected string $format = '';

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['isSocket'])) {
            $this->setIsSocket($data['isSocket']);

        }
        if (!empty($data['format'])) {
            $this->setFormat(trim($data['format']));
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

    public function getIsSocket(): bool
    {
        return $this->isSocket;
    }

    public function setIsSocket(bool $isSocket): self
    {
        $this->isSocket = $isSocket;
        return $this;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;
        return $this;
    }
}