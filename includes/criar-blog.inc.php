<?php
session_start();
if (isset($_POST["submit"])) {
    $titulo = $_POST["titulo"];
    $desc = $_POST["desc"];
    $keywords = $_POST["keywords"];
    $keywords = str_replace(' ','',$keywords);
    $userid = $_SESSION['userid'];

    require_once 'config.php';
    require_once 'functions.php';
    criarBlog($conn, $titulo, $desc, $keywords, $userid);

} else {
    header("location: ../index.php?page=criarblog");
}
