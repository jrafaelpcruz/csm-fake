<?php
    session_start();
?>
<div>
    <h1>FAKE CSM</h1>
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
