<?php

class Model
{
	protected int $id;
	protected string $name;
	protected bool $isDesktop;
	protected int $computerCreationNumber;
	protected string $addDate;


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
	public function getIsDesktop(): bool
	{
		return $this->isDesktop;
	}

	public function setIsDesktop(bool $isDesktop): self
	{
		$this->isDesktop = $isDesktop;
		return $this;
	}
	public function getComputerCreationNumber(): int
	{
		return $this->computerCreationNumber;
	}

	public function setComputerCreationNumber(int $computerCreationNumber): self
	{
		$this->computerCreationNumber = $computerCreationNumber;
		return $this;
	}

	public function getAddDate(): string
	{
		return $this->addDate;
	}

	public function setAddDate(string $addDate): self
	{
		$this->addDate = $addDate;
		return $this;
	}
}
?>