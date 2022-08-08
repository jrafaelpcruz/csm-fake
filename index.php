<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset=“utf-8”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio</title>
</head>
<body>
    <header><?php include_once 'includes/header.php' ?></header>
    <main>
            <?php
            switch(@$_REQUEST["page"]) {
                case 'criar':
                    include_once 'includes/novo-usuario.php';
                    break;
                case 'logar':
                    include_once 'includes/login.php';
                    break;
                case 'perfil':
                    include_once 'includes/perfil.php';
                    break;
                case 'adimin':
                    include_once 'includes/admin.php';
                    break;
                case 'sair':
                    include_once 'includes/sair.php';
                    break;
                case 'displayBlog';
                    include_once 'includes/display-blog.php';
                    break;
                default:
                    if (isset($_SESSION["useruid"])) {
                    /* pegando as informaçes do usuario com a função getUsuario */
                        include_once "includes/functions.php";
                        include_once "includes/config.php";
                        $myUser = getUsuario($conn);
                        echo "<div class='barra-usuario'>";
                            echo "<div class='barra-usuario-imagem'><img src='{$myUser->usersImg}' /></div>";
                            echo "<div class='barra-usuario-titulo'>Olá, <b>{$myUser->usersName}</b>.</div>";
                            echo "<a href='index-blog.php'>Try me</a>";
                            $res = displayMyBlogs($conn);
                            $qtd = $res->num_rows;
                            if ($qtd > 0) {
                                echo "<div>Aqui estão seus blogs:</div>";
                            }
                        echo "</div>";
                        echo "<div class='blog-grid'>";
                            while($row = $res->fetch_object()) {
                                    displayOneBlog($row);
                                    echo "</div>";
                                }
                        echo "</div>";        
                    } else {
                        echo "<div class='form-titulo'>Olá visitante.</div>";
                    }
            }
            ?>
        </section>
    
    </div>
    </main>    
    <footer><?php include_once 'includes/footer.php' ?></footer>
</body>
</html>
