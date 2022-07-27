<form action="includes/novo-usuario-inc.php" method="POST">
   <div>
        <label>Nome:</label>
        <input type="text" name="nome" required />
   </div>
   <div>
        <label>Usuário:</label>
        <input type="text" name="usuario" required />
   </div>
   <div>
        <label>Email:</label>
        <input type="email" name="email" required />
   </div>
   <div>
        <label>Senha:</label>
        <input type="password" name="pwd" required />
   </div>
   <div>
        <label>Repita a Senha:</label>
        <input type="password" name="pwdr" required />
   </div>
    <div>
        <button type="submit" name="submit">Enviar</button>
    </div>
</form>

<div>
<?php
    if(isset($_GET["error"])) {
        if ($_GET["error"] == "usuarioinvalido") {
            echo "Por favor não utilize acentos ou caracteres especiais no campo usuário.";   
        } else if ($_GET["error"] == "emailinvalido") {
            echo "Por favor digite um email válido.";
        } else if ($_GET["error"] == "senhainvalida") {
            echo "As senhas não são iguais.";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "Algo deu errado. Tente novamente.";
        } else if ($_GET["error"] == "usuarioexiste") {
            echo "Usuário ou email já existente.";
        } else if ($_GET["error"] == "none") {
            echo "Registrado com sucesso.";
        }
    }
?>
</div>
