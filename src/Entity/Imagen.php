<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Image;

/**
 * Imagen
 *
 * @ORM\Table(name="imagen", indexes={@ORM\Index(name="fk_imagen_usuario", columns={"idUsuario"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagenRepository")
 */
class Imagen
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=300, nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     * @Assert\Image(allowLandscape = true, allowPortrait = true, allowSquare = true)
     *
     * @ORM\Column(name="foto", type="string", length=300, nullable=true)
     */
    private $foto;

    /**
     * @var int
     *
     * @ORM\Column(name="idUsuario", type="integer", nullable=false)
     */
    private $idusuario;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado_el", type="datetime", nullable=true)
     */
    private $creadoEl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
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

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getIdusuario(): ?int
    {
        return $this->idusuario;
    }

    public function setIdusuario(int $idusuario): self
    {
        $this->idusuario = $idusuario;

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
