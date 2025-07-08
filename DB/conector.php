<?php

class Conexao {
    private $host = 'localhost';
    private $dbname = 'consulta';
    private $usuario = 'root';
    private $senha = 'Br_133487';
    private $conexao;

    public function conectar() {
        try {
            $this->conexao = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Configura o PDO para lançar exceções em caso de erro
            return $this->conexao;
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            return null;
        }
    }
}
