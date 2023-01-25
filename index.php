<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Listagem de Jogos</title>
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/functions.php";
    ?>
    <div id="corpo">
        <h1>Selecione um jogo</h1>
        <table class="listagem">
            <?php
            $busca = $banco->query("SELECT * FROM jogos order by nome");
            if (!$busca) {
                echo "<tr><td>Erro na busca";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td> Nenhum registro encontrado";
                } else {
                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class= 'small'/><td>$reg->nome";
                        echo "<td> Adm";
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php $banco->close(); ?>
</body>

</html>