<?php

class Cunsulta{
    private $conexao; // Objeto PDO que será usado para acessar o banco

    // Construtor recebe o objeto de conexão
    public function __construct($db) {
    $this->conexao = $db;
    }
    
    public function Agendar($paciente,$dentista, $horario) {
        $sql = "INSERT INTO consulta (paciente, medicos , horario) VALUES (?,?,?)";
        $stmt = $this->conexao->prepare($sql); // Prepara o SQL para execução
        return $stmt->execute([$paciente, $dentista, $horario]); // Executa com os valores
        
    }
    
    public function Listar() {
        $sql = "SELECT * FROM consulta WHERE cancelada =0 ";
        $stmt = $this->conexao->query($sql); // Executa direto pois não há parâmetros
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os resultados como array associativo
    }
    
    // Cancelar uma consulta (não deleta do banco, apenas marca como cancelada)
    public function Cancelar($id_consulta) {
        $sql = "UPDATE consulta SET cancelada = 1 WHERE id_paciente = ?";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$id_consulta]);
    }
    
}


    