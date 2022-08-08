<?php
    include_once 'includes/config.php';
    include_once 'includes/functions.php';
    $blogid = $_REQUEST['blogid'];
    $actualBlog = displayBLog($conn, $blogid);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset=“utf-8”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $actualBlog->blogsTitle; ?></title>
</head>
<body>
<header><?php include_once 'includes/header.php' ?></header>
<main class="blog-main">
    <div>
        <h1><?php echo $actualBlog->blogsTitle; ?></h1>
    </div>
    <div class="blog-main-desc">
        "<?php echo $actualBlog->blogsDesc; ?>"
    </div>

</main>
</body>
</html>
