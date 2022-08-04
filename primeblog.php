<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset=“utf-8”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/primeblog.css">
    <title>Prime Blog</title>
</head>
<body>
    <header>
        <?php
            include_once 'includes/header.php';
        ?>
    </header>
<?php include_once 'includes/blog-titulo.php'; ?>
    <main>
            <?php
            switch(@$_REQUEST["page"]) {
                case 'criar':
                    header("location:index.php?page=criar");
                    break;
                case 'logar':
                    header("location:index.php?page=logar");
                    break;
                case 'perfil':
                    header("location:index.php?page=perfil");
                    break;
                case 'adimin':
                    header("location:index.php?page=adimin");
                    break;
                case 'sair':
                    header("location:index.php?page=sair");
                    break;
            }
            ?>
        </section>
    </main>    
    <footer><?php include_once 'includes/footer.php' ?></footer>
</body>
</html>
