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

    #[ORM\OneToMany(mappedBy: 'vaccinInjection', targetEntity: Animal::class)]
    private Collection $animal;

    public function __construct()
    {
        $this->animal = new ArrayCollection();
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
    public function getAnimal(): Collection
    {
        return $this->animal;
    }

    public function addAnimal(Animal $animal): self
    {
        if (!$this->animal->contains($animal)) {
            $this->animal->add($animal);
            $animal->setVaccinInjection($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): self
    {
        if ($this->animal->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getVaccinInjection() === $this) {
                $animal->setVaccinInjection(null);
            }
        }

        return $this;
    }
}
