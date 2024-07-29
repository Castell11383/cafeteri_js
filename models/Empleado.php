<?php
require_once 'Conexion.php';

class Empleado extends Conexion
{
    public $empleado_id;
    public $empleado_nombre;
    public $empleado_apellido;
    public $empleado_genero;
    public $empleado_puesto;
    public $empleado_nacimiento;
    public $empleado_correo;
    public $empleado_telefono;
    public $empleado_estado;
    public $empleado_contra;
    public $empleado_direccion;
    public $empleado_situacion;


    public function __construct($args = [])
    {
        $this->empleado_id = $args['empleado_id'] ?? null;
        $this->empleado_nombre = $args['empleado_nombre'] ?? '';
        $this->empleado_apellido = $args['empleado_apellido'] ?? '';
        $this->empleado_genero = $args['empleado_genero'] ?? '';
        $this->empleado_puesto = $args['empleado_puesto'] ?? '';
        $this->empleado_nacimiento = $args['empleado_nacimiento'] ?? '';
        $this->empleado_correo = $args['empleado_correo'] ?? '';
        $this->empleado_telefono = $args['empleado_telefono'] ?? '';
        $this->empleado_estado = $args['empleado_estado'] ?? '';
        $this->empleado_contra = $args['empleado_contra'] ?? '';
        $this->empleado_direccion = $args['empleado_direccion'] ?? '';
        $this->empleado_situacion = $args['empleado_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO empleados(empleado_nombre, empleado_apellido, empleado_genero, empleado_puesto, empleado_nacimiento, empleado_correo, empleado_telefono, empleado_estado, empleado_contra, empleado_direccion) VALUES ('$this->empleado_nombre','$this->empleado_apellido','$this->empleado_genero', '$this->empleado_puesto', '$this->empleado_nacimiento', '$this->empleado_correo', '$this->empleado_telefono', '$this->empleado_estado', '$this->empleado_contra', '$this->empleado_direccion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from empleados where empleado_situacion = 1";

        if ($this->empleado_nombre != '') {
            $sql .= " and empleado_nombre like '%$this->empleado_nombre%' ";
        }

        if ($this->empleado_apellido != '') {
            $sql .= " and empleado_apellido = like '%$this->empleado_apellido%' ";
        }

        if ($this->empleado_genero != '') {
            $sql .= " and empleado_genero = like '%$this->empleado_genero%' ";
        }

        if ($this->empleado_puesto != '') {
            $sql .= " and empleado_puesto = like '%$this->empleado_puesto%' ";
        }

        if ($this->empleado_nacimiento != '') {
            $sql .= " and empleado_nacimiento = like '%$this->empleado_nacimiento%' ";
        }

        if ($this->empleado_telefono != '') {
            $sql .= " and empleado_telefono = '$this->empleado_telefono'";
        }

        if ($this->empleado_correo != '') {
            $sql .= " and empleado_correo = like '%$this->empleado_correo%' ";
        }

        if ($this->empleado_estado != '') {
            $sql .= " and empleado_estado = like '%$this->empleado_estado%' ";
        }

        if ($this->empleado_contra != '') {
            $sql .= " and empleado_contra = like '%$this->empleado_contra%' ";
        }

        if ($this->empleado_direccion != '') {
            $sql .= " and empleado_direccion = like '%$this->empleado_direccion%' ";
        }

        if ($this->empleado_id != null) {
            $sql .= " and empleado_id = $this->empleado_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE empleados SET empleado_nombre = '$this->empleado_nombre', empleado_apellido = '$this->empleado_apellido', empleado_genero = '$this->empleado_genero', empleado_puesto = '$this->empleado_puesto', empleado_nacimiento = '$this->empleado_nacimiento', empleado_telefono = '$this->empleado_telefono' empleado_correo = '$this->empleado_correo', empleado_estado = '$this->empleado_estado', empleado_contra = '$this->empleado_contra', empleado_direccion = '$this->empleado_direccion' where empleado_id = $this->empleado_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE empleados SET empleado_situacion = 0 where empleado_id = $this->empleado_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}