<?php

require_once 'Cliente.php';

$cliente = new Cliente();
$cliente->setNome('Isadora');
$cliente->save();
echo 'salvo com sucesso';
