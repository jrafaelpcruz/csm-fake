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
        <?php echo "Olá $_SESSION[useruid]."; ?> 
    </main>
</body>
</html>
