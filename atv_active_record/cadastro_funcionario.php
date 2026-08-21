<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário do Funcionário</title>
</head>
<body>
    <h1>Cadastro do Funcionário</h1>
    <form action="Funcionario.php" method="post" enctype="multipart/form-data">
        <label for="">
            Nome do Funcionário: <input type="text" name="nome" id="nome">
        </label>
        <label for="">
            CPF: <input type="int" name="cpf" id="cpf">
        </label>
        <label for="">
            Telefone: <input type="number" name="telefone" id="telefone">
        </label>
        <label for="">
            Currículo: <input type="text" name="curriculo" id="curriculo">
        </label>
        <button type="submit">Enviar</button>
    </form>
<table border="1">
    <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Currículo</th>
            </tr>
    </thead>
<?php

// 1. Configurações do Banco de Dados
$host = 'localhost';
$db   = 'test';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=sist_floricultura;charset=utf8mb4", $user, $pass);

    $sql = "SELECT * FROM Funcionario ORDER BY id_funcionario DESC";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $resultado = $stmt->fetchall();
} catch (PDOException $e) {
    // Caso dê algum erro na conexão ou na query
    echo "Erro: " . $e->getMessage();
}
    
foreach($resultado as $funcionario):
?>
    
    <tbody>
    <tr>
        <td>
            <?= $funcionario['nome'] ?>
        </td>
        <td>
            <?php echo $funcionario['cpf']; ?>
        </td>
        <td>
            <?php echo $funcionario['telefone']; ?>
        </td>
        <td>
            <?php echo $funcionario['curriculo']; ?>
        </td>
    </tr>
</tbody>
<?php
endforeach;
?>
</table>
</body>
</html>