<?php

include_once "templates/header.php";
require_once "includes/banco.php";
require_once "includes/functions.php";

?>

<?php
$c = $_GET['cod'] ?? 0;
$busca = $banco->query("SELECT * FROM jogos WHERE cod='$c'");
?>
<h1>Game Details</h1>
<table class="details">
    <?php
    if (!$busca) {
        echo "<tr><td> Search Fail";
    } else {
        if ($busca->num_rows == 1) {
            $reg = $busca->fetch_object();
            $t = thumb($reg->capa);
            echo "<td rowspan='3'><img src='$t' class='full'></td>";
            echo "<td><h2>$reg->nome</h2>";
            echo "Nota: " . number_format($reg->nota, 1) .  " / 10.0";
            echo "<tr><td>$reg->descricao";
            echo "<tr><td>Adm";
        } else {
            echo "<tr><td>No record found";
        }
    }
    ?>
</table>
<a href="index.php"><img src="icons/icoback.png"></a>