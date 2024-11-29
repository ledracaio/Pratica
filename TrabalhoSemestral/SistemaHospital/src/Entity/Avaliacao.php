<?php
namespace Src\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="avaliacoes")
 */
class Avaliacao {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $setor_id;

    /**
     * @ORM\OneToMany(targetEntity="Resposta", mappedBy="avaliacao", cascade={"persist", "remove"})
     */
    private $respostas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $feedback_geral;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    public function __construct() {
        $this->respostas = new ArrayCollection();
    }

    // Getters e setters para as novas relações e atributos
    public function getId(): ?int {
        return $this->id;
    }

    public function getSetorId(): ?int {
        return $this->setor_id;
    }

    public function setSetorId(int $setorId): void {
        $this->setor_id = $setorId;
    }

    public function getRespostas() {
        return $this->respostas;
    }

    public function addResposta(Resposta $resposta): void {
        if (!$this->respostas->contains($resposta)) {
            $this->respostas[] = $resposta;
            $resposta->setAvaliacao($this); // Garante a bidirecionalidade
        }
    }

    public function removeResposta(Resposta $resposta): void {
        if ($this->respostas->contains($resposta)) {
            $this->respostas->removeElement($resposta);
            // Remove o vínculo na outra extremidade
            if ($resposta->getAvaliacao() === $this) {
                $resposta->setAvaliacao(null);
            }
        }
    }

    public function getFeedbackGeral(): ?string {
        return $this->feedback_geral;
    }

    public function setFeedbackGeral(?string $feedbackGeral): void {
        $this->feedback_geral = $feedbackGeral;
    }

    public function getData(): ?\DateTime {
        return $this->data;
    }

    public function setData(\DateTime $data): void {
        $this->data = $data;
    }
}
