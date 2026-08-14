<?php
require_once "DB.php";

//crud completo do produto

class Produto {
    private $id_prod;
    private $nome;
    private $preco;

    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    //gets e sets
    public function getId() {
        return $this->id_prod;
    }
    public void setId($id_prod) {
        $this->id_prod = $id_prod;
    }

    public function getNome() {
        return $this->nome;
    }
    public void setNome($nome) {
        $this->nome = $nome;
    }

    public function getPreco() {
        return $this->preco;
    }
    public void setPreco($preco){
        $this->preco = $preco;
    }

    //metodo p salvar um prioduto no banco de dados
    public function salvar(){
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":preco", $this->preco);
        return $stmt->execute();
    }

    //metodo p buscar um produto pelo ID
    public static function buscarPorId(int $id_prod) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id_prod = :id_prod");
        $stmt->bindParam(":id_prod", $id_prod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para listar todos os produtos
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um produto
    public function atualizar(int $id_prod) {
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE produtos SET nome = :nome, preco = :preco WHERE id_prod = :id_prod");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":id_prod", $id_prod);
        return $stmt->execute();
    }

    // Método para excluir um produto
    public static function excluir($id_prod) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id_prod = :id_prod");
        $stmt->bindParam(":id_prod", $id_prod);
        return $stmt->execute();
    }
}