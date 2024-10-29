<?php

    require_once "model\Usuario.php";
    require_once "model\Session.php";

    $usuario = new app\model\Usuario;
    $usuario->setUserName("Caio");
    $usuario->setUserLogin(1033490);
    $usuario->setUserPass("1033490Caio");

?>
