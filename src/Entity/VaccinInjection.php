<?php

namespace App\Entity;

use App\Repository\VaccinInjectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinInjectionRepository::class)]
class VaccinInjection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $injection_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_period = null;

    #[ORM\ManyToMany(targetEntity: Animal::class, mappedBy: 'vaccin_injection')]
    private Collection $animals;



    public function __construct()
    {
 
        $this->animals = new ArrayCollection();

    }
    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getInjectionDate(): ?\DateTimeInterface
    {
        return $this->injection_date;
    }

    public function setInjectionDate(\DateTimeInterface $injection_date): self
    {
        $this->injection_date = $injection_date;

        return $this;
    }

    public function getEndPeriod(): ?\DateTimeInterface
    {
        return $this->end_period;
    }

    public function setEndPeriod(?\DateTimeInterface $end_period): self
    {
        $this->end_period = $end_period;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): self
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->addVaccinInjection($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): self
    {
        if ($this->animals->removeElement($animal)) {
            $animal->removeVaccinInjection($this);
        }

        return $this;
    }



}
