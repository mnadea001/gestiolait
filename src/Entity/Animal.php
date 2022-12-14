<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $height = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birth_date = null;

    #[ORM\ManyToMany(targetEntity: Farm::class, mappedBy: 'animal')]
    private Collection $farms;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $race = null;

    #[ORM\Column(length: 255)]
    private ?string $espece = null;

    #[ORM\ManyToMany(targetEntity: VaccinInjection::class, inversedBy: 'animals')]
    #[JoinTable(name:"animal_vaccin_injection")]
    private Collection $vaccin_injection;



    public function __construct()
    {
        $this->farms = new ArrayCollection();
        $this->vaccin_injection = new ArrayCollection();


    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(?\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * @return Collection<int, Farm>
     */
    public function getFarms(): Collection
    {
        return $this->farms;
    }

    public function addFarm(Farm $farm): self
    {
        if (!$this->farms->contains($farm)) {
            $this->farms->add($farm);
            $farm->addAnimal($this);
        }

        return $this;
    }

    public function removeFarm(Farm $farm): self
    {
        if ($this->farms->removeElement($farm)) {
            $farm->removeAnimal($this);
        }

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * @return Collection<int, VaccinInjection>
     */
    public function getVaccinInjection(): Collection
    {
        return $this->vaccin_injection;
    }

    public function addVaccinInjection(VaccinInjection $vaccinInjection): self
    {
        if (!$this->vaccin_injection->contains($vaccinInjection)) {
            $this->vaccin_injection->add($vaccinInjection);
        }

        return $this;
    }

    public function removeVaccinInjection(VaccinInjection $vaccinInjection): self
    {
        $this->vaccin_injection->removeElement($vaccinInjection);

        return $this;
    }




}
