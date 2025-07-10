<?php


header("Access-Control-Allow-Origin: *"); //Permite que qualquer cliente (de qualquer domínio) acesse a API (CORS).
header("Content-Type: application/json"); // Informa que as respostas serão em JSON.

require_once '../DB/Conector.php';
require_once '../CLASS/classes.php';

//Instancia a "class Consulta" 
$consulta = new Consulta($pdo);

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET'){
    echo json_encode($consulta->Listar());

}elseif($metodo == 'POST'){
    //json_decode(..., true) Converte o JSON recebido para um array associativo PHP.Se o true não fosse usado, o retorno seria um objeto.
    
    $dados = json_decode(file_get_contents("php://input"), true);  //file_get_contents("php://input") Lê o corpo da requisição HTTP (geralmente um JSON enviado em um POST, PUT, ou DELETE)
    
    if ($consulta->Agendar($dados['paciente'], $dados['dentista'], $dados['horario'])){
        echo json_encode(["mensagem" => "Consulta agendada com sucesso."]);
    }else{
        echo json_encode(["mensagem" => "Erro ao agendar"]);
    }
}elseif($metodo == 'DELETE'){
    
    //parse_str(..., $dados) Converte uma string no formato chave=valor&chave2=valor2 em um array associativo.
    parse_str(file_get_contents("php://input"), $dados);

    if ($consulta->Cancelar($dados['id_consulta'],)){
        echo json_encode(["mensagem" => "Consulta cancelada com sucesso."]);
    }else{
        echo json_encode(["mensagem" => "Erro ao cancelar"]);
    }
}