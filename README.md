# API de Consultas Médicas (PHP + MySQL)

Este projeto é uma API RESTful simples desenvolvida em PHP para gerenciamento de consultas médicas. É possível listar, agendar e cancelar consultas por meio de requisições HTTP.

## 🚀 Funcionalidades

- ✅ Listar consultas ativas
- 🗓️ Agendar nova consulta
- ❌ Cancelar consulta (cancelamento lógico)

## 🛠 Tecnologias utilizadas

- PHP (com PDO)
- MySQL
- JSON como formato de comunicação
- REST (GET, POST, DELETE)

## 📁 Estrutura de pastas

├── API/
│ └── index.php # Roteador da API
├── CLASS/
│ └── classes.php # Classe Consulta com métodos CRUD
├── DB/
│ └── conector.php # Conexão com o banco de dados (PDO)


## 📦 Requisitos

- PHP 7.4 ou superior
- MySQL
- Servidor Apache ou PHP embutido (`php -S localhost:8000`)

## ⚙️ Como rodar o projeto localmente

1. Clone o repositório:
  git clone https://github.com/seu-usuario/seu-repo.git
  cd seu-repo/projeto_api
  
  
  Configure o banco de dados MySQL com a tabela abaixo:
  
  CREATE DATABASE agenda;
  USE agenda;
  
  CREATE TABLE consulta (
    id_consulta INT AUTO_INCREMENT PRIMARY KEY,
    paciente VARCHAR(100) NOT NULL,
    medico VARCHAR(100) NOT NULL,
    horario DATETIME NOT NULL,
    cancelada BOOLEAN DEFAULT 0
  );
  
  Edite o arquivo DB/conector.php com seus dados de acesso ao MySQL.
  
  Inicie o servidor PHP:
  
  php -S localhost:8000 -t API/
  🔁 Exemplos de requisições
  GET /index.php
  Retorna todas as consultas ativas.
  
  POST /index.php
  Agendar uma nova consulta (Content-Type: application/json):
  
  {
    "paciente": "João da Silva",
    "dentista": "Dra. Maria",
    "horario": "2025-07-15 14:00:00"
  }
  DELETE /index.php
  Cancelar uma consulta (Content-Type: application/x-www-form-urlencoded):
  
  id_consulta=3
  📌 Observações
  Cancelamentos não apagam registros do banco — apenas marcam como cancelados.
  
  A API está aberta para qualquer origem (CORS habilitado).
  
  Pronta para integração com qualquer frontend (Web ou Mobile).
  
  📚 Aprendizado
  Este é meu primeiro projeto de API em PHP e foi essencial para entender o funcionamento de requisições HTTP, manipulação com PDO e organização do backend em camadas reutilizáveis.
  
  
  
