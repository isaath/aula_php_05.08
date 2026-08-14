<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
</head>
<body>
    <h1>Cadastro de produto</h1>
    <form action="produto.php" method="post" enctype="multipart/form-data">
        <label for="">
            Nome do produto: <input type="text" name="nome" id="nome">
        </label>
        <label for="">
            Preço do produto: <input type="number" name="preco" id="preco">
        </label>
        <button type="submit">Enviar</button>
    </form>
    <table border="1">
    <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
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

    $sql = "SELECT * FROM produto ORDER BY id_prod DESC";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $resultado = $stmt->fetchall();
} catch (PDOException $e) {
    // Caso dê algum erro na conexão ou na query
    echo "Erro: " . $e->getMessage();
}
    
foreach($resultado as $produto):
?>
    
    <tbody>
    <tr>
        <td>
            <!-- //posso escrever sem o echo q da certo tbm!! -->
            <?= $produto['nome'] ?> 
        </td>
        <td>
            <?php echo $produto['preco']; ?>
        </td>

    </tr>
</tbody>
<?php
endforeach;
?>
</table>
</body>
</html>