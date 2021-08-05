<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
#[ApiResource(
    normalizationContext:['groups' => ['read:image']],
    denormalizationContext:['groups' => ['write:image']],
    itemOperations:[
        'get' => [
            'normalization_context'=>['groups' => ['read:image']]
        ]
    ]
)]
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:image','write:image'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:image','write:image'])]
    private $url;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    #[Groups(['read:image','write:image'])]
    private $taille;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    #[Groups(['read:image','write:image'])]
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="images")
     */
    #[Groups(['read:image','write:image'])]
    private $document;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

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

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }
}
