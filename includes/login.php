<div class="form-titulo">
    <h1>Logar!</h1>
</div>
<section>
<form action="includes/login-inc.php" method="POST">
   <div>
        <label>Usuário:</label>
        <input type="text" name="usuario" required />
   </div>
   <div>
        <label>Senha:</label>
        <input type="password" name="senha" required />
   </div>
   <div>
        <button type="submit" name="submit">Enviar</button>
   </div>
</form>
<div>
<?php
    if(isset($_GET["error"])) {
        if ($_GET["error"] == "loginerrado") {
            echo "Informações incorretas. Tente novamente.";   
        }
    }
?>
</div>
