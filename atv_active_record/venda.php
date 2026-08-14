<?php
require_once "DB.php";

//crud completo de venda

class Venda {
    private $id_venda;
    private $codBarras;
    private $id_prod;


    public function __construct($codBarras, $id_prod) {
        $this->codBarras = $codBarras;
        $this->id_prod = $id_prod;
    }


    // Método para salvar um aluno no banco de dados
    public function salvar() {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO vendas (codBarras, id_prod) VALUES (:codBarras, :id_prod)");
        $stmt->bindParam(":codBarras", $this->codBarras);
        $stmt->bindParam(":id_prod", $this->id_prod);
        return $stmt->execute();
    }


    // Método para buscar uma venda pelo ID
    public static function buscarPorId(int $id_venda) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM vendas WHERE id_venda = :id_venda");
        $stmt->bindParam(":id_venda", $id_venda);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os alunos
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM vendas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para atualizar uma venda
    public function atualizar(int $id_venda) {
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE vendas SET codBarras = :codBarras, id_prod = :id_prod WHERE id_venda = :id_venda");
        $stmt->bindParam(":codBarras", $this->codBarras);
        $stmt->bindParam(":id_prod", $this->id_prod);
        $stmt->bindParam(":id_venda", $id_venda);
        return $stmt->execute();
    }


    // Método para excluir uma venda
    public static function excluir($id_venda) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM vendas WHERE id_venda = :id_venda");
        $stmt->bindParam(":id_venda", $id_venda);
        return $stmt->execute();
    }
}
