<?php
function carregar($classe){
    require_once($classe . ".php");

}

//fala o php quando não achar uma classe executa a função carregar
spl_autoload_register('carregar');