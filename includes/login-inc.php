<?php

if (isset($_POST["submit"])) {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    require_once 'config.php';
    require_once 'functions.php';

    logarUsuario($conn, $usuario, $senha);
} else {
    header("location: ../index.php?page=login");
    exit();
}
