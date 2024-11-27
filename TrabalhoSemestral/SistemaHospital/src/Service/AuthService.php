<?php
namespace Src\Service;

use Src\Entity\Usuario;

class AuthService {
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function autenticar($username, $senha) {
        $usuario = $this->entityManager->getRepository(Usuario::class)
            ->findOneBy(['username' => $username]);

        return $usuario && password_verify($senha, $usuario->getSenha());
    }
}
