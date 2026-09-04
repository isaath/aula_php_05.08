<?php
function carregar($classe){
    $caminho = "src/Models" . $classe . ".php";
    if(file_exists($caminho)){
        require_once($caminho);
    }

}

//fala o php quando não achar uma classe executa a função carregar
spl_autoload_register('carregar');