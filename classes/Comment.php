<?php

class Comment
{
    protected int $id;

    protected string $comment;
    protected string $name;
    protected bool $isRead;
    protected int $id_1; //id model
    protected int $id_2; //id user

    protected string $commentDate;
    protected bool $isConceptor;



    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function getComment(): string
    {
        return $this->comment;
    }


    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function getIsRead(): bool
    {
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): self
    {
        $this->isRead = $isRead;
        return $this;
    }

    public function getId_1(): int
    {
        return $this->id_1;
    }

    public function setId_1(int $id_1): self
    {
        $this->id_1 = $id_1;
        return $this;
    }

    public function getId_2(): int
    {
        return $this->id_2;
    }

    public function setId_2(int $id_2): self
    {
        $this->id_2 = $id_2;
        return $this;
    }

    public function getCommentDate(): string
    {
        return $this->commentDate;
    }

    public function setCommentDate(string $commentDate): self
    {
        $this->commentDate = $commentDate;
        return $this;
    }

	public function getName(): string {
		return $this->name;
	}

	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	public function getIsConceptor(): bool {
		return $this->isConceptor;
	}
	
	public function setIsConceptor(bool $isConceptor): self {
		$this->isConceptor = $isConceptor;
		return $this;
	}
}

?>