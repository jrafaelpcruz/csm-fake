<?php
    session_start();
/* verificando se estamos em um blog para definir o estilo da pagina: */
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    $url.= $_SERVER['HTTP_HOST'];   
    
    $url.= $_SERVER['REQUEST_URI'];    

    if (str_contains($url, 'blog')) {
        $headerClass = 'header-bar-blog';
        $headerLogo = 'Voltar';
    } else {
        $headerClass = 'header-bar';
        $headerLogo = 'FAKE CSM';
    }
?>
    <div class="<?php echo $headerClass; ?>">
    <div>
    <h1><a href='index.php?page=default'><?php echo "$headerLogo"; ?></a></h1>
    </div>
    <div>
        <nav>
            <ul>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        include_once 'includes/config.php';
                        include_once 'includes/functions.php';
                        $flag = typeFlag($conn);

                        if ($flag->typeAdm == 1) {
                            echo "<li><a href='index.php?page=adimin'>Administrar</a></li>";
                        }
                        if ($flag->typeManager == 1) {
                            echo "<li><a href='index.php?page=manager'>Conteúdo</a></li>";
                        }
                        if ($flag->typeMod == 1) {
                            echo "<li><a href='index.php?page=mod'>Moderar</a></li>";
                        }

                        echo "
                            <li><a href='?page=perfil'>Meu Perfil</a></li>
                            <li><a href='index.php?page=sair'>Sair</a></li>
                        ";
                    } else {
                        echo "
                            <li><a href='index.php?page=criar'>Criar</a></li>
                            <li><a href='index.php?page=logar'>Logar</a></li>
                        ";
                    }
                ?>
            </ul> 
        </nav>
    </div>
</div>
