<?php
    if (isset($_POST["submit"])) {
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $senha = $_POST["pwd"];
        $senhaRp = $_POST["pwdr"];

        require_once 'config.php';
        require_once 'functions.php';

        if (usuarioInvalido($usuario) !== false) {
            header("location: ../index.php?page=criar&error=usuarioinvalido");
            exit();
        }
        if (emailInvalido($email) !== false) {
            header("location: ../index.php?page=criar&error=emailinvalido");
            exit();
        }
        if (pwdMatch($senha, $senhaRp) !== false) {
            header("location: ../index.php?page=criar&error=senhainvalida");
            exit();
        }
        if (usuarioExiste($conn, $email, $usuario) !== false) {
            header("location: ../index.php?page=criar&error=usuarioexiste");
            exit();
        }
        
        criarUsuario($conn, $nome, $email, $usuario, $senha);

    } else {
        header("location: ../index.php?page=criar");
        }
