<?php

require_once "../Funcionario.php";

$funcionario = new Funcionario();

$funcionario->setNome('Emilli');
$funcionario->setCpf('12345678912');
$funcionario->setTelefone('222222222');
$funcionario->setCurriculo('aaaaaaa');

$funcionario->salvar();

echo "funcionario salvo com sucesso!";