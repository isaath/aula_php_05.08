<?php

//testando para ver se entra na regra do preco maior que zero e salvando no banco

require_once '../Produto.php';

$produto = new Produto();
$produto->setNome('Flores amarelas');
if(!!!$produto->setPreco(3)){
    echo 'Preço tem que ser maior que zero';
}else{
    $produto->save();
    echo 'salvo com sucesso';
}
