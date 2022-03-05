<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 3,
     *      max = 10,
     *      minMessage = "description doit etre au minimum {{ limit }} characters long",
     *      maxMessage = "description ne doit pas depasser {{ limit }} characters"
     * )
     * @Assert\NotNull
     * @Groups("post:read")
     */
    private $nomProduit;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      min = 10,
     *      max = 200,
     *      minMessage = "description doit etre au minimum {{ limit }} characters long",
     *      maxMessage = "description ne doit pas depasser {{ limit }} characters"
     * )
     * @Assert\NotNull
     * @Groups("post:read")
     */
    private $DescriptionProduit;

    /**
     * @ORM\Column(type="blob")
     * @Groups("post:read")
     */
    private $imageProduit;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("post:read")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     * @Groups("post:read")
     */
    private $prixProduit;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $nomimageProduit;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("post:read")
     */
    private $restaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->DescriptionProduit;
    }

    public function setDescriptionProduit(string $DescriptionProduit): self
    {
        $this->DescriptionProduit = $DescriptionProduit;

        return $this;
    }

    public function getImageProduit()
    {
        return $this->imageProduit;
    }

    public function setImageProduit($imageProduit): self
    {
        $this->imageProduit = $imageProduit;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPrixProduit(): ?int
    {
        return $this->prixProduit;
    }

    public function setPrixProduit(int $prixProduit): self
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    public function getNomimageProduit(): ?string
    {
        return $this->nomimageProduit;
    }

    public function setNomimageProduit(string $nomimageProduit): self
    {
        $this->nomimageProduit = $nomimageProduit;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
