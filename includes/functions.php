<?php
function thumb($arq)
{
    $path = "pictures/$arq";
    if (is_null($arq) || !file_exists($path)) {
        return "pictures/indisponivel.png";
    } else {
        return $path;
    }
}
