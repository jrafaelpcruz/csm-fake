<?php
    if (isset($_POST["submit"])) {
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $senha = $_POST["pwd"];
        $senhaRp = $_POST["pwdr"];
        $file = $_FILES["file"];
        $faceb = $_POST["faceb"];
        $twitter = $_POST["twitter"];
        /* tratamento do upload: */
        $fileName = $_FILES['file']['name'];
        $filetmp = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

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

        $imagemp = uploadFile($conn, $fileName, $filetmp, $fileSize, $fileError, $fileType);
        criarUsuario($conn, $nome, $email, $usuario, $senha, $imagemp, $faceb, $twitter);

    } else {
        header("location: ../index.php?page=criar");
        }
