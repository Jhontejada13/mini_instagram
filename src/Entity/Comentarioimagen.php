<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentarioimagen
 *
 * @ORM\Table(name="comentarioimagen", indexes={@ORM\Index(name="fk_comentarioImagen_imagen", columns={"idImagen"}), @ORM\Index(name="fk_comentarioImagen_usuario", columns={"idUsuario"})})
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioImagenRepository")
 */
class Comentarioimagen
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
     * @ORM\Column(name="idImagen", type="integer", nullable=false)
     */
    private $idimagen;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdimagen(): ?int
    {
        return $this->idimagen;
    }

    public function setIdimagen(int $idimagen): self
    {
        $this->idimagen = $idimagen;

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
