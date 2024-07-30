<?php
require_once 'Conexion.php';

class Pedido extends Conexion
{
    public $pedido_id;
    public $pedido_cliente;
    public $pedido_empleado;
    public $pedido_plato;
    public $pedido_bebida;
    public $pedido_postre;
    public $pedido_observaciones;
    public $pedido_situacion;


    public function __construct($args = [])
    {
        $this->pedido_id = $args['pedido_id'] ?? null;
        $this->pedido_cliente = $args['pedido_cliente'] ?? '';
        $this->pedido_empleado = $args['pedido_empleado'] ?? '';
        $this->pedido_plato = $args['pedido_plato'] ?? '';
        $this->pedido_bebida = $args['pedido_bebida'] ?? '';
        $this->pedido_postre = $args['pedido_postre'] ?? '';
        $this->pedido_observaciones = $args['pedido_observaciones'] ?? '';
        $this->pedido_situacion = $args['pedido_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO pedidos(pedido_cliente, pedido_empleado, pedido_plato, pedido_bebida, pedido_postre, pedido_observaciones) VALUES ('$this->pedido_cliente','$this->pedido_empleado', '$this->pedido_plato', '$this->pedido_bebida', '$this->pedido_postre', '$this->pedido_observaciones')";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT PEDIDO_ID, CLIENTE_NOMBRE || ' ' || CLIENTE_APELLIDO AS CLIENTE_COMPLETO, EMPLEADO_NOMBRE || ' ' || EMPLEADO_APELLIDO AS EMPLEADO_COMPLETO, PEDIDO_PLATO, PEDIDO_BEBIDA, PEDIDO_POSTRE, PEDIDO_OBSERVACIONES FROM PEDIDOS
        INNER JOIN CLIENTES ON PEDIDO_CLIENTE = CLIENTE_ID
        INNER JOIN EMPLEADOS ON PEDIDO_EMPLEADO = EMPLEADO_ID
        WHERE PEDIDO_SITUACION = 1";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE PEDIDOS SET PEDIDO_OBSERVACIONES = (SELECT CLIENTE_NOMBRE || ' ' || CLIENTE_APELLIDO || ' - ' || EMPLEADO_NOMBRE || ' ' || EMPLEADO_APELLIDO FROM CLIENTES
        INNER JOIN EMPLEADOS ON PEDIDOS.PEDIDO_EMPLEADO = EMPLEADOS.EMPLEADO_ID
        WHERE PEDIDOS.PEDIDO_CLIENTE = CLIENTES.CLIENTE_ID)
        WHERE PEDIDO_SITUACION = 1";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE pedidos SET pedido_situacion = 0 WHERE pedido_id = $this->pedido_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}