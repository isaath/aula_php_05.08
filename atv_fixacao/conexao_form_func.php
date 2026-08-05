<?php
require_once("conexao.php");

$sql = "INSERT INTO funcionario (nome, cpf, telefone, curriculo) VALUES (:nome, :cpf, :telefone, :curriculo)";
$stmt = $pdo->prepare($sql);

//etapa de vareira de dados
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$curriculo = $_POST['curriculo'];

$stmt->execute([
    ':nome' => $nome,
    ':cpf' => $cpf,
    ':telefone' => $telefone,
    ':curriculo' => $curriculo
]);
echo "<br>Funcionario inserido com ID " . $pdo->lastInsertId();