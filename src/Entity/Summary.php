<?php

namespace App\Entity;

use App\Repository\SummaryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SummaryRepository::class)
 */
class Summary
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Number1;

    /**
     * @ORM\Column(type="integer")
     */
    private $Number2;

    /**
     * @ORM\Column(type="integer")
     */
    public $result;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber1(): ?int
    {
        return $this->Number1;
    }

    public function setNumber1(int $Number1): self
    {
        $this->Number1 = $Number1;

        return $this;
    }

    public function getNumber2(): ?int
    {
        return $this->Number2;
    }

    public function setNumber2(int $Number2): self
    {
        $this->Number2 = $Number2;

        return $this;
    }

    public function getResult(): ?int
    {
        return $this->result;
    }

    public function setResult(int $result): self
    {
        $this->result = $result;

        return $this;
    }
}
