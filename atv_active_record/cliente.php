<?php
require_once "DB.php";

//crud completo do cliente

class Cliente {
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $data_nasc;


    public function __construct($nome, $cpf, $telefone, $data_nasc) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->data_nasc = $data_nasc;
    }


    // Método para salvar um cliente no banco de dados
    public function salvar() {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO clientes (nome, cpf, telefone, data_nasc) VALUES (:nome, :cpf, :telefone, :data_nasc)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":data_nasc", $this->data_nasc);
        return $stmt->execute();
    }


    // Método para buscar um cliente pelo ID
    public static function buscarPorId(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os clientes
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para atualizar um cliente
    public function atualizar(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE clientes SET nome = :nome, cpf = :cpf, telefone = :telefone, data_nasc = :data_nasc WHERE id = :id");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":data_nasc", $this->data_nasc);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }


    // Método para excluir um cliente
    public static function excluir($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
