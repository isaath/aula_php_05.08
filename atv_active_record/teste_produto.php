<?php 

require_once 'produto.php';

$produto = new produto();
$produto->nome='Flores amarelas';
if(!!!$produto->setPreco(3)){
    echo 'Preço '
}

?>