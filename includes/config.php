<?php
    //show me the errors please
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //let's connect
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "root";
    $dBName = "wpclone";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("A conexão com o database falhou: ".mysqli_connect_error());
    }
