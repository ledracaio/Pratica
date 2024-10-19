<?php

namespace app\model;

class Pessoa {

    private $nome;
    private $sobreNome;
    private $dataNascimento;
    private $cpfCnpj;
    private $tipo;
    private $telefone;
    private $endereco;

    public function __construct() {
        $this->nome = "";
        $this->sobreNome = "";
        $this->dataNascimento = "";
        $this->cpfCnpj = "";
        $this->tipo = "";
        $this->telefone = "";
        $this->endereco = "";
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobreNome($sobreNome) {
        $this->sobreNome = $sobreNome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobreNome() {
        return $this->sobreNome;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setCpfCnpj($cpfCnpj) {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getNomeCompleto() {
        return $this->nome . " " . $this->sobreNome;
    }
}

?>
