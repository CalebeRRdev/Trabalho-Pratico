<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Permitir requisições de qualquer origem (para testes no Postman)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Verificar se a requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados JSON enviados
    $input_data = json_decode(file_get_contents("php://input"), true);

    if (!isset($input_data['login']) || !isset($input_data['senha'])) {
        echo json_encode(["erro" => "Login e senha são obrigatórios"]);
        exit;
    }

    // Responder com os dados recebidos
    echo json_encode([
        "login_recebido" => $input_data['login'],
        "senha_recebida" => $input_data['senha']
    ]);
} else {
    echo json_encode(["erro" => "Método não permitido, use POST"]);
}
?>