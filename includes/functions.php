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

function goback(){
    return "<a  href='index.php' id='goback'><span class='material-symbols-outlined'>arrow_back</span></a>";
}

function msg_success ($m){
    $answer= "<div class='success'><span class='material-symbols-outlined'>check_circle</span>$m</div>";
    return $answer;
}

function msg_notice ($m){
    $answer= "<div class='notice'><span class='material-symbols-outlined'>info</span>$m</div>";
    return $answer;
}

function msg_warning ($m){
    $answer= "<div class='warning'><span class='material-symbols-outlined'>error</span>$m</div>";
    return $answer;
}


