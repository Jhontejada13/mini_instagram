<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Persona
 *
 * @ORM\Table(name="persona")
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona implements UserInterface
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
     * @ORM\Column(name="nombre", type="string", length=40, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=40, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="apodo", type="string", length=50, nullable=false)
     */
    private $apodo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avatar", type="blob", length=65535, nullable=true)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=250, nullable=false)
     */
    private $clave;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Imagen", mappedBy="persona")
     */
    private $imagenes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Imagen", mappedBy="persona")
     */
    private $albumes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ComentarioAlbum", mappedBy="persona")
     */
    private $comentariosAlbum;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ComentarioImagen", mappedBy="persona")
     */
    private $comentariosImagen;

    public function __construct()
    {
        $this->imagenes = new ArrayCollection();
        $this->comentariosAlbum = new ArrayCollection();
        $this->comentariosImagen = new ArrayCollection();
        $this->albumes = new ArrayCollection();

    }

    /**
     * @return Collection|ComantarioImagen[]
     */
    public function getComentariosImagen(): Collection
    {
        return $this->comentariosImagen;
    }


    /**
     * @return Collection|ComantarioAlbum[]
     */
    public function getComentariosAlbum(): Collection
    {
        return $this->comentariosAlbum;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbumnes(): Collection
    {
        return $this->albumes;
    }

    /**
     * @return Collection|Imagen[]
     */
    public function getImagenes(): Collection
    {
        return $this->imagenes;
    }


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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getApodo(): ?string
    {
        return $this->apodo;
    }

    public function setApodo(string $apodo): self
    {
        $this->apodo = $apodo;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    //Métodos implementados desde UserInterface para cifrado de clave
    public function getUserName(){
        return $this->email;
    }

    public function getSalt(){
        return null;
    }

    public function getPassword(){
        return $this->clave;
    }

    public function getRoles(){
        return array('ROLE_USER');
    }

    public function eraseCredentials(){}


}
