<?php

namespace Proyecto\PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autores
 *
 * @ORM\Table(name="autores")
 * @ORM\Entity
 */
class Autores
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuario
     *
     * @param \Proyecto\PrincipalBundle\Entity\Usuario $usuario
     * @return Autores
     */
    public function setUsuario(\Proyecto\PrincipalBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Proyecto\PrincipalBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}