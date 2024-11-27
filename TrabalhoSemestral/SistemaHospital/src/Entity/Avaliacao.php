<?php
namespace Src\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    private $setorId;

    /**
     * @ORM\Column(type="json")
     */
    private $respostas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $feedback;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    // Getters e Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function getSetorId(): ?int {
        return $this->setorId;
    }

    public function setSetorId(int $setorId): void {
        $this->setorId = $setorId;
    }

    public function getRespostas(): array {
        return $this->respostas;
    }

    public function setRespostas(array $respostas): void {
        $this->respostas = $respostas;
    }

    public function getFeedback(): ?string {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): void {
        $this->feedback = $feedback;
    }

    public function getData(): ?\DateTime {
        return $this->data;
    }

    public function setData(\DateTime $data): void {
        $this->data = $data;
    }
}
