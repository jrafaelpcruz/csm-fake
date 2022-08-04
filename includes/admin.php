<?php
if (isset($_SESSION["useruid"])) {
    include_once 'includes/config.php';
    include_once 'includes/functions.php';
    $flag = typeFlag($conn);

    if ($flag->typeAdm == 1) {
        echo "<div class='form-titulo'>Welcome</div>";
    } else {
        echo "<div class='form-titulo' style='color:red'>Isso não pode não cara, tá proibido. FBI, NASA e as WINKS foram informado(a)s.</div>";
        die();
    }
} else {
        echo "<div class='form-titulo' style='color:red'>Isso não pode não cara, tá proibido. FBI, NASA e as WINKS foram informado(a)s.</div>";
        die();
}
?>
