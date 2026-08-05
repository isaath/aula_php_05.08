<?php
require_once("conexao.php"); //vou puxar a conexão que já existe

$sql = "INSERT INTO cliente (nome, cpf, telefone, data_nasc) VALUES (:nome, :cpf, :telefone, :data_nasc)";
$stmt = $pdo->prepare($sql);

//etapa de vareira de dados
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['data_nasc'];

$stmt->execute([
    ':nome' => $nome,
    ':cpf' => $cpf,
    ':telefone' => $telefone,
    ':data_nasc' => $data_nasc
]);
header('Location: formulario_cliente.php');
//echo "<br>Cliente inserido com ID " . $pdo->lastInsertId();