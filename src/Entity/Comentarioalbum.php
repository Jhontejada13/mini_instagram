<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentarioalbum
 *
 * @ORM\Table(name="comentarioalbum", indexes={@ORM\Index(name="fk_comentarioImagen_album", columns={"idAlbum"})})
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioAlbumRepository")
 */
class Comentarioalbum
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=300, nullable=true)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="idAlbum", type="integer", nullable=false)
     */
    private $idalbum;


    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado_el", type="datetime", nullable=true)
     */
    private $creadoEl;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Persona", inversedBy="comentariosAlbum")
     */
    private $persona;

    public function getPersona(): ?Persona
    {
        return $this->persona;
    }

    public function setPersona(Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdalbum(): ?int
    {
        return $this->idalbum;
    }

    public function setIdalbum(int $idalbum): self
    {
        $this->idalbum = $idalbum;

        return $this;
    }


    public function getCreadoEl(): ?\DateTimeInterface
    {
        return $this->creadoEl;
    }

    public function setCreadoEl(?\DateTimeInterface $creadoEl): self
    {
        $this->creadoEl = $creadoEl;

        return $this;
    }


}
