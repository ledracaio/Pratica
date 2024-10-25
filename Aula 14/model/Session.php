<?php

namespace app\model;

class Session {
    private $sessionId;
    private $status;
    private $usuario;
    private $dataHoraInicio;
    private $dataHoraUltimoAcesso;

    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    public function iniciaSessao() {
        $this->sessionId = session_id();
        $this->status = "Sessão Iniciada";
        $this->dataHoraInicio = date("Y-m-d H:i:s");
        $this->dataHoraUltimoAcesso = $this->dataHoraInicio;
    }

    public function finalizaSessao() {
        $this->status = "Sessão Finalizada";
        session_destroy();
    }

    public function getUsuarioSessao() {
        return $this->usuario;
    }

    public function getSessionStatus() {
        return $this->status;
    }

    public function atualizaUltimoAcesso() {
        $this->dataHoraUltimoAcesso = date("Y-m-d H:i:s");
    }

    public function getSessionDataHoraInicio() {
        return $this->dataHoraInicio;
    }

    public function getSessionDataHoraUltimoAcesso() {
        return $this->dataHoraUltimoAcesso;
    }
}
?>
