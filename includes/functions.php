<?php
    function usuarioInvalido($usuario) {
        $resultado;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $usuario)) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    function emailInvalido($email) {
        $resultado;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    function pwdMatch($senha, $senhaRp) {
        $resultado;
        if ($senha !== $senhaRp) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    function usuarioExiste($conn, $email, $usuario) {
         $resultado;
         $sql = "SELECT * FROM users WHERE usersEmail = ? OR usersUid = ?;";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?page=criar&error=usuarioexiste");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $email, $usuario);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
           return $row;
        } else {
            $resultado = false;
            return $resultado;
        }

        mysqli_stmt_close($stmt);
    }
    function criarUsuario($conn, $nome, $email, $usuario, $senha, $imagemp, $faceb, $twitter) {
         $resultado;
         $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, typeId, usersImg, usersFaceb, usersTwitter) VALUES (?, ?, ?, ?, 1, ?, ?, ?);";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?page=criar&error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($senha, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssssss", $nome, $email, $usuario, $hashedPwd,  $imagemp, $faceb, $twitter);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../index.php?page=criar&error=none");
        exit();
    }
    function logarUsuario($conn, $usuario, $senha) {
        $usuarioExiste = usuarioExiste($conn, $email, $usuario);

        if ($usuarioExiste === false) {
            header("location: ../index.php?page=logar&error=loginerrado");
            exit();
        }

        $senhaHashed = $usuarioExiste["usersPwd"];
        $verifSenha = password_verify($senha, $senhaHashed);

        if ($verifSenha === false) {
            header("location: ../index.php?page=logar&error=loginerrado");
        } else if ($verifSenha === true) {
            session_start();
            $_SESSION["userid"] = $usuarioExiste["usersId"];
            $_SESSION["useruid"] = $usuarioExiste["usersUid"];
            $_SESSION["username"] = $usuarioExiste["usersName"];
            header("location: ../index.php");
            exit();
        }
    }
