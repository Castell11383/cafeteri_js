<?php

require '../../models/Empleado.php';

$_POST['empleado_nacimiento'] = str_replace('T', ' ', $_POST['empleado_nacimiento']);
$_POST['empleado_contra'] = str_replace('T', ' ', $_POST['empleado_contra']);

header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];

// echo json_encode($_GET);
// exit;
try {
    switch ($metodo) {
        case 'POST':
            $empleado = new Empleado($_POST);
            switch ($tipo) {
                case '1':
                    $ejecucion = $empleado->guardar();
                    $mensaje = "Empleado Guardado correctamente";
                    $codigo = 1;
                    break;

                case '2':
                    $ejecucion = $empleado->modificar();
                    $mensaje = "Empleado Modificado correctamente";
                    $codigo = 2;
                    break;
                
                case '3':
                    $ejecucion = $empleado->eliminar();
                    $mensaje = "Empleado Eliminado correctamente";
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
            $empleado = new Empleado($_GET);
            $empleados = $empleado->buscar();
            echo json_encode($empleados);
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
