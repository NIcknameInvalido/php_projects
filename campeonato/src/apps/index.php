<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

// Lógica para manipular diferentes métodos HTTP (GET, POST, PUT, DELETE, etc.)
switch ($method) {
    case 'GET':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($_GET['endpoint'] === 'exemplo') {
                // Lógica para o endpoint 'exemplo'
                echo json_encode(['mensagem' => 'Requisição GET para /exemplo']);
            } else {
                http_response_code(404); // Não encontrado
                echo json_encode(['error' => 'Endpoint não encontrado']);
            }
        }
        break;
    case 'POST':
        // Lógica para manipular requisições POST
        break;
    case 'PUT':
        // Lógica para manipular requisições PUT
        break;
    case 'DELETE':
        // Lógica para manipular requisições DELETE
        break;
    default:
        http_response_code(405); // Método não permitido
        echo json_encode(['error' => 'Método não permitido']);
        break;
}