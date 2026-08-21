<?php
require_once "DB.php";

//crud completo do funcionario

class Funcionario {
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $curriculo;

    //gets e sets
    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome(String $nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf(String $cpf){
        $this->cpf = $cpf;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone(String $telefone){
        $this->telefone = $telefone;
    }

    public function getCurriculo(){
        return $this->curriculo;
    }
    public function setCurriculo(String $curriculo){
        $this->curriculo = $curriculo;
    }



    //quando quero passar todos os parâmetros de uma vez (é tipo um get e set junto)
    // public function __construct($nome, $cpf, $telefone, $curriculo) {
    //     $this->nome = $nome;
    //     $this->cpf = $cpf;
    //     $this->telefone = $telefone;
    //     $this->curriculo = $curriculo;
    // }


    // Método para salvar um funcionario no banco de dados
    public function salvar() {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO funcionario (nome, cpf, telefone, curriculo) VALUES (:nome, :cpf, :telefone, :curriculo)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":curriculo", $this->curriculo);
        return $stmt->execute();
    }


    // Método para buscar um funcionario pelo ID
    public static function buscarPorId(int $id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os funcionarios
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM funcionarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para atualizar um funcionario
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


    // Método para excluir um funcionario
    public static function excluir($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM funcionarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
