<?php
    session_start();
?>
<div>
    <h1><a href='index.php?page=default'>FAKE CSM</a></h1>
</div>
<div class="quote">
    <div>
        <p>"Faça elevar o cosmo no seu coração."</p>
    </div>
    <div>
        <p>-Saint Seiya</p>
    </div>
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
                        echo "<li><a href='?page=adimin'>Administrar</a></li>";
                    }
                    if ($flag->typeManager == 1) {
                        echo "<li><a href='?page=manager'>Conteúdo</a></li>";
                    }
                    if ($flag->typeMod == 1) {
                        echo "<li><a href='?page=mod'>Moderar</a></li>";
                    }

                    echo "
                        <li><a href='?page=perfil'>Meu Perfil</a></li>
                        <li><a href='?page=sair'>Sair</a></li>
                    ";
                } else {
                    echo "
                        <li><a href='?page=criar'>Criar</a></li>
                        <li><a href='?page=logar'>Logar</a></li>
                    ";
                }
            ?>
        </ul>
    </nav>
</div>
