<?php
namespace Src\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dispositivos")
 */
class Dispositivo {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $tipo;

    /**
     * @ORM\Column(type="string")
     */
    private $identificador;

    // Getters e setters
}
