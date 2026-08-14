<?php
require_once "DB.php";

//crud completo de atendimento

class Atendimento {
    private $id_atendimento;
    private $id_cliente;
    private $id_funcionario;


    public function __construct($id_cliente, $id_funcionario) {
        $this->id_cliente = $id_cliente;
        $this->id_funcionario = $id_funcionario;
    }


    // Método para salvar um atendimento no banco de dados
    public function salvar() {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO atendimentos (id_cliente, id_funcionario) VALUES (:id_cliente, :id_funcionario)");
        $stmt->bindParam(":id_cliente", $this->id_cliente);
        $stmt->bindParam(":id_funcionario", $this->id_funcionario);
        return $stmt->execute();
    }


    // Método para buscar um atendimento pelo ID
    public static function buscarPorId(int $id_atendimento) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM atendimentos WHERE id_atendimento = :id_atendimento");
        $stmt->bindParam(":id_atendimento", $id_atendimento);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os atendimentos
    public static function listarTodos() {
        $conn = getConnection();
        $stmt = $conn->query("SELECT * FROM atendimentos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para atualizar um atendimento
    public function atualizar(int $id_atendimento) {
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE atendimentos SET id_cliente = :id_cliente, id_funcionario = :id_funcionario WHERE id_atendimento = :id_atendimento");
        $stmt->bindParam(":id_cliente", $this->id_cliente);
        $stmt->bindParam(":id_funcionario", $this->id_funcionario);
        $stmt->bindParam(":id_atendimento", $id_atendimento);
        return $stmt->execute();
    }


    // Método para excluir um atendimento
    public static function excluir($id_atendimento) {
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM atendimentos WHERE id_atendimento = :id_atendimento");
        $stmt->bindParam(":id_atendimento", $id_atendimento);
        return $stmt->execute();
    }
}
