<?php
require '../../models/Pedido.php';

header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];

try {
    switch ($metodo) {
        case 'POST':
            $pedido = new Pedido($_POST);
            switch ($tipo) {
                case '1':
                    $ejecucion = $pedido->guardar();
                    $mensaje = "Pedido Guardado correctamente";
                    $codigo = 1;
                    break;

                case '2':
                    $ejecucion = $pedido->modificar();
                    $mensaje = "Pedido Modificado correctamente";
                    $codigo = 2;
                    break;
                
                case '3':
                    $ejecucion = $pedido->eliminar();
                    $mensaje = "Pedido Eliminado correctamente";
                    $codigo = 3;
                    break;

                default:
                    $mensaje = "Acción no reconocida";
                    $codigo = 0;
                    break;
            }
            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => $codigo,
            ]);
            break;

        case 'GET':
            http_response_code(200);
            $pedido = new Pedido($_GET);
            $pedidos = $pedido->buscar();
            echo json_encode($pedidos);
            break;

        default:
            http_response_code(405);
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;