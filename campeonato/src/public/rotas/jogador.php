<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function retornaUmJogador($params)
{
    $jogador = Jogador::selectOne($params);
    $resposta = [];
    if (isset($jogador)) {
        $resposta = [
            'id' => $jogador->id,
            'nome' => $jogador->nome,
            'sobrenome' => $jogador->sobrenome,
            'cpf' => $jogador->cpf,
            'dt_nascimento' => $jogador->dt_nascimento
        ];
    } else {
        $resposta = "Nenhum jogador encontrado com os parametros informados";
    }
    return json_encode($resposta);
}

function retornaTodosJogadores($params=[])
{
    $jogadores = Jogador::selectAll();
    $resposta = [];
    
    foreach($jogadores as $ch => $jogador){
        array_push($resposta, [
            'id' => $jogador->id,
            'nome' => $jogador->nome,
            'sobrenome' => $jogador->sobrenome,
            'cpf' => $jogador->cpf,
            'dt_nascimento' => $jogador->dt_nascimento
        ]);
    }
    return json_encode($resposta);
}

// require_once(dirname(realpath('../configuracoes')."\configuracoes")."\config.php");
require_once('../configuracoes/config.php');
$method = $_SERVER['REQUEST_METHOD'];

// Lógica para manipular diferentes métodos HTTP (GET, POST, PUT, DELETE, etc.)
switch ($method) {
    case 'GET':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['unico'])) {
                if ($_GET['unico'] == true && (isset($_GET['id']) || isset($_GET['cpf']))) {
                    echo retornaUmJogador($_GET);
                }
            } else {
                echo retornaTodosJogadores();
            }
        }
        break;
    case 'POST':
        $jogador = new Jogador($_POST);
        $id = $jogador->save();
        echo $id;
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
