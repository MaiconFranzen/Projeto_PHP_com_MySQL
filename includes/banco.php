<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "bd_games";

$banco = new mysqli($host, $user, $pass, $db);


if ($banco->connect_errno) {
    echo "<p>Erro encontrado $banco->errno --> $banco->connect_error</p>";
    die();
}

$busca = $banco->query("SELECT * FROM generos");
if (!$busca) {
    echo "<p>Falha na busca $banco->error </p>";
} else {
    while ($reg = $busca->fetch_object()) {
        
    }
   
}





