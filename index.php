    <?php
    require_once "includes/banco.php";
    require_once "includes/functions.php";
    include_once "templates/header.php";
    require_once "includes/login.php";

    $sortby = $_GET['o'] ?? "n";
    $key = $_GET['c'] ?? "";
    ?>

    <h1>Selecione um jogo</h1>
    <form id="busca" method="get" action="index.php">
        Ordenar:
        <a href="index.php?o=n&c=<?php echo $key; ?>">Nome</a> |
        <a href="index.php?o=p&c=<?php echo $key; ?>">Produtora</a> |
        <a href="index.php?o=n1&c=<?php echo $key; ?>">Nota Alta</a> |
        <a href="index.php?o=n2&c=<?php echo $key; ?>">Nota Baixa</a> |
        <a href="index.php">Mostrar Todos</a> |
        Buscar: <input type="text" name="c" size="10" maxlength="40" />
        <input type="submit" value="OK" />
    </form>
    <table class="listagem">
        <?php
        $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.capa FROM jogos j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod ";

        if (!empty($key)) {
            $q .= "WHERE j.nome like '%$key%' OR p.produtora like '%$key%' OR g.genero like '%$key%' ";
        }

        switch ($sortby) {
            case "p":
                $q .= "ORDER BY p.produtora";
                break;
            case "n1":
                $q .= "ORDER BY j.nota DESC";
                break;
            case "n2":
                $q .= "ORDER BY j.nota";
                break;
            default:
                $q .= "ORDER BY j.nome";
                break;
        }
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
    <?php
    include_once("templates/footer.php");
    ?>