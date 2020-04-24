<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_persona", columns={"idPersona"})})
 * @ORM\Entity
 */
class Usuario
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
     * @var int
     *
     * @ORM\Column(name="idPersona", type="integer", nullable=false)
     */
    private $idpersona;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdpersona(): ?int
    {
        return $this->idpersona;
    }

    public function setIdpersona(int $idpersona): self
    {
        $this->idpersona = $idpersona;

        return $this;
    }


}
