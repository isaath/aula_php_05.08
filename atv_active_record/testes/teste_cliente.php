<?php

require_once '../Cliente.php';

$cliente = new Cliente();
$cliente->setNome('Isadora');
$cliente->setCpf('60100991025');
$cliente->setTelefone('123456789');
$cliente->setData_nasc('26/08/2008');
$cliente->save();
echo 'salvo com sucesso';
