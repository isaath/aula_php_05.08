<?php
require_once("conexao.php");

$sql = "INSERT INTO produto (nome, preco) VALUES (:nome, :preco)";
$stmt = $pdo->prepare($sql);

//etapa de vareira de dados
$nome = $_POST['nome'];
$preco = $_POST['preco'];

$stmt->execute([
    ':nome' => $nome,
    ':preco' => $preco,
]);
echo "<br>Produto inserido com ID " . $pdo->lastInsertId();