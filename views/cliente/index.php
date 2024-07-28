<?php include_once '../../includes/header.php' ?>

<div class="container mt-5 pt-3">
    <h1 class="text-center text-black">Registro de Clientes</h1>
    <div class="row justify-content-center">
        <form id="form" class="col-lg-8 border border-dark bg-dark bg-gradient text-white text-center p-3 rounded shadow">
            <input type="hidden" name="cliente_id" id="cliente_id">

            <div class="row mb-3">
                <div class="col">
                    <label for="cliente_nombre">Nombres del cliente</label>
                    <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" required>
                </div>
                <div class="col">
                    <label for="cliente_apellido">Apellidos del cliente</label>
                    <input type="text" name="cliente_apellido" id="cliente_apellido" class="form-control" required>
                </div>
                <div class="col-3">
                    <label for="cliente_genero">Género</label>
                    <select name="cliente_genero" id="cliente_genero" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="cliente_correo">Correo</label>
                    <input type="email" name="cliente_correo" id="cliente_correo" class="form-control" placeholder="Apellido@gmail.com" required>
                </div>
                <div class="col-5">
                    <label for="cliente_telefono">Teléfono</label>
                    <input type="number" name="cliente_telefono" id="cliente_telefono" class="form-control" required>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <div class="col">
                    <button type="submit" id="btnGuardar" class="btn btn-info w-100"><i class="bi bi-floppy-fill"></i> Registrar</button>
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

    <div class="container mt-5 pt-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 table-responsive">
                <h2 class="text-center">Listado de Clientes</h2>
                <table class="table table-bordered table-hover border-dark" id="tablaClientes">
                    <thead class="text-center table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Genero</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white bg-gradient">
                        <tr>
                            <td colspan="6">No hay clientes disponibles</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script defer src="../../src/js/cliente/index.js"></script>
    <script defer src="../../src/funciones.js"></script>

    <?php include_once '../../includes/footer.php' ?>