<?php

namespace Proyecto\PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sistema
 *
 * @ORM\Table(name="sistema")
 * @ORM\Entity
 */
class Sistema
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=400, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=50, nullable=false)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcioncorta", type="text", nullable=false)
     */
    private $descripcioncorta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionlarga", type="text", nullable=false)
     */
    private $descripcionlarga;

    /**
     * @var string
     *
     * @ORM\Column(name="acercade", type="text", nullable=false)
     */
    private $acercade;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Sistema
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Sistema
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set descripcioncorta
     *
     * @param string $descripcioncorta
     * @return Sistema
     */
    public function setDescripcioncorta($descripcioncorta)
    {
        $this->descripcioncorta = $descripcioncorta;
    
        return $this;
    }

    /**
     * Get descripcioncorta
     *
     * @return string 
     */
    public function getDescripcioncorta()
    {
        return $this->descripcioncorta;
    }

    /**
     * Set descripcionlarga
     *
     * @param string $descripcionlarga
     * @return Sistema
     */
    public function setDescripcionlarga($descripcionlarga)
    {
        $this->descripcionlarga = $descripcionlarga;
    
        return $this;
    }

    /**
     * Get descripcionlarga
     *
     * @return string 
     */
    public function getDescripcionlarga()
    {
        return $this->descripcionlarga;
    }

    /**
     * Set acercade
     *
     * @param string $acercade
     * @return Sistema
     */
    public function setAcercade($acercade)
    {
        $this->acercade = $acercade;
    
        return $this;
    }

    /**
     * Get acercade
     *
     * @return string 
     */
    public function getAcercade()
    {
        return $this->acercade;
    }
}