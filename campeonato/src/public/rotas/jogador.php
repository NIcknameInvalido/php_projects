<?php

use function PHPSTORM_META\type;

    header('Content-Type: application/json');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    function converterGetParaChaveValor($array){
        $parametros = [];
        foreach($array as $chave => $valor){
            $parametros[$chave] = $valor;
        }
        return $parametros;
    }


    // require_once(dirname(realpath('../configuracoes')."\configuracoes")."\config.php");
    require_once('../configuracoes/config.php');
    $method = $_SERVER['REQUEST_METHOD'];
    
    // Lógica para manipular diferentes métodos HTTP (GET, POST, PUT, DELETE, etc.)
    switch ($method) {
        case 'GET':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET) AND COUNT($_GET) > 0){
                    $valores = Jogador::obterRegistroUnico(converterGetParaChaveValor($_GET));
                    $jogador = new Jogador();
                    $resposta = [];
                    foreach($jogador->getColunasT() as $col){
                        $resposta[$col] = $valores[0]->$col;
                    }
                    echo json_encode($resposta);  
                }else{
                    $valores = Jogador::obterTodosRegistros();
                    $resposta = [];
                    $jogador = new Jogador();
                    echo(count($valores));
                    for($i = 0 ; $i < count($valores) ; $i++){
                        $temp = [];
                        foreach($jogador->getColunasT() as $col){
                            $temp[$col] = $valores[$i]->$col;
                        }
                        array_push($resposta, $temp);     
                    }
                    echo json_encode($resposta);
                }
            }
            break;
        case 'POST':
            $jogador = new Jogador($_POST);
            $id = $jogador->insertInto();
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
?>