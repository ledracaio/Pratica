<?php
namespace Src\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Src\Repository\PerguntaRepository")
 * @ORM\Table(name="perguntas")
 */
class Pergunta
{
    // Defina os atributos e métodos da entidade aqui
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $texto;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ativa;

    // Getters e setters
    public function getId() {
        return $this->id;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function isAtiva() {
        return $this->ativa;
    }

    public function setAtiva($ativa) {
        $this->ativa = $ativa;
    }
}
