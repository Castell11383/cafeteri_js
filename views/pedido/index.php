<?php

require_once '../../models/Cliente.php';
require_once '../../models/Empleado.php';

try {
    $empleado = new Empleado();
    $empleados = $empleado->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {
    $cliente = new Cliente();
    $clientes = $cliente->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>

<?php include_once '../../includes/header.php' ?>


<div class="container mt-5 pt-3">
    <h1 class="text-center">Registro de Pedidos</h1>
    <div class="row justify-content-center">
        <form id="form" class="col-lg-8 border bg-dark bg-gradient text-white text-center p-3 rounded shadow">
            <input type="hidden" name="pedido_id" id="pedido_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="pedido_cliente">Cliente</label>
                    <select name="pedido_cliente" id="pedido_cliente" class="form-select" required>
                        <option value="">Select</option>
                        <?php foreach ($clientes as $key => $cliente) : ?>
                            <option value="<?= $cliente['cliente_id'] ?>"><?= $cliente['cliente_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col">
                    <label for="pedido_empleado">Empleado</label>
                    <select name="pedido_empleado" id="pedido_empleado" class="form-select" required>
                        <option value="">Select</option>
                        <?php foreach ($empleados as $key => $empleado) : ?>
                            <option value="<?= $empleado['empleado_id'] ?>"><?= $empleado['empleado_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <label for="pedido_plato">Platillo</label>
                    <select id="pedido_plato" name="pedido_plato" class="form-select" aria-label="Default select example" required>
                        <option value="">Select</option>
                        <option value="Desayuno">Desayuno</option>
                        <option value="Almuerzo">Almuerzo</option>
                        <option value="Cena">Cena</option>
                        <option value="Antojos">Antojos</option>
                        <option value="Refacciones">Refacciones</option>
                    </select>
                </div>
                <div class="col">
                    <label for="pedido_bebida">Bebidas</label>
                    <select id="pedido_bebida" name="pedido_bebida" class="form-select" aria-label="Default select example" required>
                        <option value="">Select</option>
                        <option value="Cafe">Café</option>
                        <option value="Jugo de Naranja">Jugo de Naranja</option>
                        <option value="Licuado">Licuado</option>
                        <option value="Agua">Agua</option>
                    </select>
                </div>
                <div class="col">
                    <label for="pedido_postre">Postres</label>
                    <select id="pedido_postre" name="pedido_postre" class="form-control" aria-label="Default select example" required>
                        <option value="">Select</option>
                        <option value="Platanos Fritos">Platanos Fritos</option>
                        <option value="Donas">Donas</option>
                        <option value="Pies">Pies</option>
                        <option value="Pasteles">Pasteles</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">

                <div class="col">
                    <label for="pedido_observaciones">Observaciones</label>
                    <input type="text" name="pedido_observaciones" id="pedido_observaciones" class="form-control">
                </div>

            </div>

            <div class="row justify-content-center mb-3">
                <div class="col">
                    <button type="submit" id="btnGuardar" class="btn btn-primary w-100"><i class="bi bi-floppy-fill"></i> Registrar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnBuscar" class="btn btn-warning w-100"><i class="bi bi-binoculars-fill"></i> Buscar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnModificar" class="btn btn-warning w-100"><i class="bi bi-back"></i> Modificar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnCancelar" class="btn btn-primary w-100"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
                </div>
                <div class="col">
                    <button type="reset" id="btnLimpiar" class="btn btn-success w-100"><i class="bi bi-stars"></i> Limpiar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container mt-5 pt-3 justify-content-center">
    <h2 class="text-center">Pedido</h2>
    <table class="table table-bordered table-hover border-dark table-responsive shadow" id="tablaPedido">
        <thead class="text-center table-dark">
            <tr>
                <th>No.</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Platillos</th>
                <th>Bebida</th>
                <th>Postre</th>
                <th>Observacion</th>
                <th>Modificar</th>
                <th>Entregado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="9">No hay Pedidos disponibles</td>
            </tr>
        </tbody>
    </table>
</div>

<script defer src="../../src/funciones.js"></script>
<script defer src="../../src/js/pedido/index.js"></script>

<?php include_once '../../includes/footer.php' ?>