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
                default:
                    if (isset($_SESSION["useruid"])) {
                        echo "<div class='form-titulo'>Olá ".$_SESSION["useruid"].".</div>";
                    } else {
                        echo "<div class='form-titulo'>Olá visitante.</div>";
                    }
            }
            ?>
        </section>
    <div class="blog-grid">
        <?php
            if (isset($_SESSION["useruid"])) {
                include_once "includes/config.php";
                include_once "includes/functions.php";
                $res = displayMyBlogs($conn);
                /* var_dump($res); */ 
                /* acho válido colocar um if aqui depois pra verificar se tem blogs pra mostra ou não */
                while($row = $res->fetch_object()) {
                    displayOneBlog($row);
                }
            }
        ?>
    </div>
    </main>    
    <footer><?php include_once 'includes/footer.php' ?></footer>
</body>
</html>
