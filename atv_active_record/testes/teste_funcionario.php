<?php

require_once "../Funcionario.php";

$funcionario = new Funcionario();

$funcionario->setNome('Emilli');
$funcionario->setCpf('12345678912');
$funcionario->setTelefone('555555555');
$funcionario->setCurriculo('aaaaaaa');

$funcionario->save();

echo "funcionario salvo com sucesso!";