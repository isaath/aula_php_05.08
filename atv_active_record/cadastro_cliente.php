<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário do Cliente</title>
</head>
<body>
    <h1>Cadastro do Cliente</h1>
    <form action="cliente.php" method="post" enctype="multipart/form-data">
        <label for="">
            Nome do Cliente: <input type="text" name="nome" id="nome">
        </label>
        <label for="">
            CPF: <input type="int" name="cpf" id="cpf">
        </label> 
        <label for="">
            Data de nascimento: <input type="date" name="data_nasc" id="data_nasc">
        </label>
        <label for="">
            Telefone: <input type="number" name="telefone" id="telefone">
        </label>
        
        <button type="submit">Enviar</button>
    </form>
    <table border="1">
    <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Ações</th>
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

    $sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $resultado = $stmt->fetchall();
} catch (PDOException $e) {
    // Caso dê algum erro na conexão ou na query
    echo "Erro: " . $e->getMessage();
}
    
foreach($resultado as $cliente):
?>
    
    <tbody>
    <tr>
        <td>
            <?= $cliente['nome'] ?>
        </td>
        <td>
            <?php echo $cliente['cpf']; ?>
        </td>
        <td>
            <?php echo $cliente['data_nasc']; ?>
        </td>
        <td>
            <?php echo $cliente['telefone']; ?>
        </td>
         <td>
            <a href="deletar.php?id=<?= $produto['id'] ?>">[x]</a>
        </td>
    </tr>
</tbody>
<?php
endforeach;
?>
</table>
</body>
</html>