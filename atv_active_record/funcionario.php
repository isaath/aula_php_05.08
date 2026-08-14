<?php
require_once "DB.php";

//crud completo do funcionario

class Funcionario {
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $curriculo;


    public function __construct($nome, $cpf, $telefone, $curriculo) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->curriculo = $curriculo;
    }


    // Método para salvar um aluno no banco de dados
    public function salvar() {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO alunos (nome, cpf, telefone, curriculo) VALUES (:nome, :cpf, :telefone, :curriculo)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":curriculo", $this->curriculo);
        return $stmt->execute();
    }


    // Método para buscar um aluno pelo ID
    public static function buscarPorId(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os alunos
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM funcionarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para atualizar um aluno
    public function atualizar(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE funcionarios SET nome = :nome, cpf = :cpf, telefone = :telefone, curriculo = :curriculo WHERE id = :id");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":curriculo", $this->curriculo);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }


    // Método para excluir um aluno
    public static function excluir($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM funcionarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
