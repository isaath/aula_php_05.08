<?php
require_once "DB.php";


class Aluno {
    private $id;
    private $nome;
    private $numeroMatricula;
    private $dataCadastro;


    public function __construct($nome, $numeroMatricula) {
        $this->nome = $nome;
        $this->numeroMatricula = $numeroMatricula;
    }


    // Método para salvar um aluno no banco de dados
    public function salvar() {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO alunos (nome, numeroMatricula) VALUES (:nome, :numeroMatricula)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":numeroMatricula", $this->numeroMatricula);
        return $stmt->execute();
    }


    // Método para buscar um aluno pelo ID
    public static function buscarPorId(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM alunos WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os alunos
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM alunos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para atualizar um aluno
    public function atualizar(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE alunos SET nome = :nome, numeroMatricula = :numeroMatricula WHERE id = :id");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":numeroMatricula", $this->numeroMatricula);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }


    // Método para excluir um aluno
    public static function excluir($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM alunos WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
