<?php
abstract class Piece
{
    const CATEGORIES = [
        'supply' => 'Alimentation',
        'graficCard' => 'Carte graphique',
        'motherBoard' => 'Carte mère',
        'keyboard' => 'Clavier',
        'screen' => 'Ecran',
        'ram' => 'Mémoire vive',
        'processor' => 'Processeur',
        'mouse' => 'Souris/pad',
        'hardDisk' => 'Disque dur/SSD',
    ];
    protected int $id;
    protected string $name = '';
    protected string $brand = '';
    protected float $buyingPrice = 0.0; // Stocké en BDD en centime et converti ici avec *100
    protected int $quantity = 0;
    protected bool $isDesktop;
    protected bool $isArchived;
    protected ?string $description = '';


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    public function getBuyingPrice(): float
    {
        return $this->buyingPrice;
    }

    public function setBuyingPrice(float $buyingPrice): self
    {
        $this->buyingPrice = $buyingPrice;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getIsDesktop(): bool
    {
        return $this->isDesktop;
    }

    public function setIsDesktop(bool $isDesktop): self
    {
        $this->isDesktop = $isDesktop;
        return $this;
    }

    public function getIsArchived(): bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): self
    {
        $this->isArchived = $isArchived;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

}