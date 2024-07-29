<?php include_once '../../includes/header.php' ?>

<div class="container mt-5 pt-3">
    <h1 class="text-center text-black">Registro de Empleados</h1>
    <div class="row justify-content-center">
        <form id="form" class="col-lg-8 border border-dark bg-dark bg-gradient text-white text-center p-3 rounded shadow">
            <input type="hidden" name="empleado_id" id="empleado_id">

            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_nombre">Nombres del empleado</label>
                    <input type="text" name="empleado_nombre" id="empleado_nombre" class="form-control" required>
                </div>
                <div class="col">
                    <label for="empleado_apellido">Apellidos del empleado</label>
                    <input type="text" name="empleado_apellido" id="empleado_apellido" class="form-control" required>
                </div>
                <div class="col-3">
                    <label for="empleado_genero">Género</label>
                    <select name="empleado_genero" id="empleado_genero" class="form-select" aria-label="Default select example" required>
                        <option value="">Select</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_puesto">Puesto</label>
                    <select name="empleado_puesto" id="empleado_puesto" class="form-select" aria-label="Default select example" required>
                        <option value="">Select</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Sub-Gerente">Sub-Gerente</option>
                        <option value="Cocinero">Cocinero</option>
                        <option value="Mesero">Mesero</option>
                        <option value="Bartender">Bartender</option>
                    </select>
                </div>
                <div class="col">
                    <label for="empleado_nacimiento">Fecha de Nacimiento</label>
                    <input type="datetime-local" name="empleado_nacimiento" id="empleado_nacimiento" class="form-control" required>
                </div>
                <div class="col">
                    <label for="empleado_telefono">Teléfono</label>
                    <input type="number" name="empleado_telefono" id="empleado_telefono" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-5">
                    <label for="empleado_correo">Correo</label>
                    <input type="email" name="empleado_correo" id="empleado_correo" class="form-control" placeholder="Apellido@gmail.com" required>
                </div>
                <div class="col">
                    <label for="empleado_estado">Estado</label>
                    <select name="empleado_estado" id="empleado_estado" class="form-select" aria-label="Default select example" required>
                        <option value="">Select</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <label for="empleado_contra">Fecha de Contratación</label>
                    <input type="datetime-local" name="empleado_contra" id="empleado_contra" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_direccion">Direccion</label>
                    <input type="text" name="empleado_direccion" id="empleado_direccion" class="form-control" required>
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
                    <button type="button" id="btnCancelar" class="btn btn-info w-100"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
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
                <h2 class="text-center">Listado de Empleados</h2>
                <table class="table table-bordered table-hover border-dark table-striped " id="tablaEmpleados">
                    <thead class="text-center table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Genero</th>
                            <th>Puesto</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white bg-gradient">
                        <tr>
                            <td colspan="6">No hay Empleados disponibles</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script defer src="../../src/js/empleado/index.js"></script>
    <script defer src="../../src/funciones.js"></script>

    <?php include_once '../../includes/footer.php' ?>