<!-- //LUDWING ALDAIR MAMANI YUCRA// -->
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT , DELETE");
header("Content-Type: aplication/json");

$metodo = $_SERVER['REQUEST_METHOD'];

$respuesta = [];

switch ($metodo) {
    case 'GET':
        $respuesta = [
            'mensaje' => 'Metodo Get Correcto',
            'data' => $_GET
        ];
        break;

    case 'POST':
        $data_entrante = json_decode(file_get_contents('php://input'), true);
        $respuesta = [
            'mensaje' => 'El metodo HTTP utilizado es POST',
            'data' => $data_entrante
        ];
        break;
    
    case 'PUT':
        $data_entrante = json_decode(file_get_contents('php://input'), true);
        $respuesta = [
            'mensaje'=> 'El metodo HTTP utilizado es PUT',
            'data' => $data_entrante
        ];
    
    case 'DELETE':
        if (isset($_GET['Id'])) {
            $respuesta = [
                'mensaje' => 'El metodo HTTP utilizado es DELETE',
                'id_eliminado' => $_GET['Id']
            ];
        } else {
            $respuesta = [
                'mensaje' => 'El metodo HTTP utilizado es DELETE, pero no se proporciono un ID'
            ];
        }
        break;

    default:
        http_response_code(405);
        $respuesta = [
            'mensaje' => 'Metodo HTTP no permitido' 
        ];
        break;
}

echo json_encode($respuesta);