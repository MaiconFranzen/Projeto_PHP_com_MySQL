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

$banco->query("SET NAMES 'utf8'");
$banco->query("SET character_set_connection=UTF8");
$banco->query("SET character_set_client=utf8");
$banco->query("SET character_set_results=utf8");
