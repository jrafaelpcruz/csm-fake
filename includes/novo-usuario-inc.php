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

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf');
        /* verificaçoes do arquivo do upload */
        if ( ! in_array($fileActualExt, $allowed)) {
            header("location: ../index.php?page=criar&error=filetypeinvalido");
            exit();
        }
        if ( ! $fileError === 0) {
            header("location: ../index.php?page=criar&error=fileerror");
            exit();
        }
        if ($fileSize > 5000000) {
            header("location: ../index.php?page=criar&error=filesizeinvalido");
            exit();
        }

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

        /* fazendo o upload do arquivo para o server */
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = '../img/profile/'.$fileNameNew;
        $imagemp = 'img/profile/'.$fileNameNew;
        move_uploaded_file($filetmp, $fileDestination);

        criarUsuario($conn, $nome, $email, $usuario, $senha, $imagemp, $faceb, $twitter);

    } else {
        header("location: ../index.php?page=criar");
        }
