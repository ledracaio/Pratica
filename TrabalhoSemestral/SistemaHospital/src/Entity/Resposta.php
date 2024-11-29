<?php
namespace Src\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="respostas")
 */
class Resposta {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Avaliacao", inversedBy="respostas")
     * @ORM\JoinColumn(name="avaliacao_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $avaliacao;

    /**
     * @ORM\ManyToOne(targetEntity="Pergunta")
     * @ORM\JoinColumn(name="pergunta_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $pergunta;

    /**
     * @ORM\Column(type="integer")
     */
    private $nota;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $feedback;

    public function getId(): ?int {
        return $this->id;
    }

    public function getAvaliacao(): ?Avaliacao {
        return $this->avaliacao;
    }

    public function setAvaliacao(?Avaliacao $avaliacao): void {
        $this->avaliacao = $avaliacao;
    }

    public function getPergunta(): ?Pergunta {
        return $this->pergunta;
    }

    public function setPergunta(?Pergunta $pergunta): void {
        $this->pergunta = $pergunta;
    }

    public function getNota(): ?int {
        return $this->nota;
    }

    public function setNota(int $nota): void {
        $this->nota = $nota;
    }

    public function getFeedback(): ?string {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): void {
        $this->feedback = $feedback;
    }
}
