<?php
class Piece
{
    const CATEGORIES = [
        'graficCard' => 'Carte graphique',
        'hardDisk' => 'Disque dur/SSD',
        'keyboard' => 'Clavier',
        'motherBoard' => 'Carte mère',
        'mouse' => 'Souris/pad',
        'processor' => 'Processeur',
        'ram' => 'Mémoire vive (RAM)',
        'screen' => 'Ecran',
        'supply' => 'Alimentation',
    ];

    protected int $id;
    protected string $name = '';
    protected string $brand = '';
    protected float $buyingPrice = 0.0; // Stocké en BDD en centime et converti ici avec *100
    protected int $quantity = 0;
    protected bool $isDesktop = false;
    protected bool $isArchived = false;
    protected ?string $description = '';
    protected ?string $category = '';

    public function __construct(array $data = [])
    {
        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        if (!empty($data['name'])) {
            $this->setName(trim($data['name']));
        }
        if (!empty($data['brand'])) {
            $this->setBrand(trim($data['brand']));
        }
        if (!empty($data['buyingPrice'])) {
            $this->setBuyingPrice($data['buyingPrice']);
        }
        if (!empty($data['quantity'])) {
            $this->setQuantity($data['quantity']);
        }
        if (!empty($data['isDesktop'])) {
            $this->setIsDesktop($data['isDesktop']);
        }
        if (!empty($data['isArchived'])) {
            $this->setIsArchived($data['isArchived']);
        }
        if (!empty($data['description'])) {
            $this->setDescription(trim($data['description']));
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


    /**
     * @return 
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param  $category 
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->category = $category;
        return $this;
    }
}