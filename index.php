    <?php
    require_once "includes/banco.php";
    require_once "includes/functions.php";
    include_once "templates/header.php";
    ?>

    <h1>Selecione um jogo</h1>
    <table class="listagem">
        <?php
        $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.capa FROM jogos j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod";
        $busca = $banco->query($q);
        if (!$busca) {
            echo "<tr><td>Erro na busca";
        } else {
            if ($busca->num_rows == 0) {
                echo "<tr><td> Nenhum registro encontrado";
            } else {
                while ($reg = $busca->fetch_object()) {
                    $t = thumb($reg->capa);
                    echo "<tr><td><img src='$t' class= 'small'/>";
                    echo "<td><a href='detais.php?cod=$reg->cod'>$reg->nome</a>";
                    echo " [ $reg->genero ]";
                    echo "<br>$reg->produtora";
                    echo "<td> Adm";
                }
            }
        }
        ?>
    </table>

    <?php $banco->close(); ?>

    <?php
    include_once("templates/footer.php");
    ?>