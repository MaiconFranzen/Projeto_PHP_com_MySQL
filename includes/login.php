<?php

//include_once "engines.php";

session_start();

if (!isset($_SESSION['user'])) {
$_SESSION['user'] = "Maicon";
$_SESSION['nome'] = "MAicon F";
$_SESSION['tipo'] = "";
}


/*************************************************
 ********* PASSWORD ENCRYPTION FUNCTIONS *********
 *************************************************/


function cripto($password) {
    $c='';
    for($pos = 0; $pos < strlen($password); $pos++){
        $letter = ord($password[$pos]) +1;
        $c .= chr($letter);
    }
    return $c;
}

function generateHash($password) {
    $txt = cripto($password);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
    echo $hash;
}

function testHash($password, $hash){
    $ok = password_verify(cripto($password), $hash);
    return $ok;
}

cripto(1234);