const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaEmpleados = document.getElementById('tablaEmpleados')
const formulario = document.querySelector('form')

btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'

const getEmpleado = async (alerta = 'si') => {
    const nombre = formulario.empleado_nombre.value
    const apellido = formulario.empleado_apellido.value
    const genero = formulario.empleado_genero.value
    const correo = formulario.empleado_correo.value
    const nacimiento = formulario.empleado_nacimiento.value
    const telefono = formulario.empleado_genero.value
    const estado = formulario.empleado_estado.value
    const contra = formulario.empleado_contra.value
    const direccion = formulario.empleado_direccion.value
    const url = `/cafeteria_js/controllers/empleado/index.php?empleado_nombre=${nombre}&empleado_apellido=${apellido}&empleado_genero=${genero}&empleado_correo=${correo}&empleado_nacimiento=${nacimiento}&empleado_telefono=${telefono}&empleado_estado=${estado}&empleado_contra=${contra}&empleado_direccion=${direccion}`
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        // console.log(respuesta)
        const data = await respuesta.json();
        tablaEmpleados.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;
        // console.log(data);
        if (respuesta.status == 200) {
            if (alerta == 'si') {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Empleados encontrados',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }


            if (data.length > 0) {
                data.forEach(empleado => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const celda7 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = empleado.empleado_nombre;
                    celda3.innerText = empleado.empleado_apellido;
                    celda4.innerText = empleado.empleado_genero;
                    celda5.innerText = empleado.empleado_puesto;


                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-secondary', 'w-100')
                    buttonModificar.innerHTML = '<i class="bi bi-back"></i>'
                    buttonModificar.addEventListener('click', () => llenarDatos(empleado))

                    buttonEliminar.textContent = 'Eliminar'
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100')
                    buttonEliminar.innerHTML = '<i class="bi bi-person-x-fill"></i>'
                    buttonEliminar.addEventListener('click', () => EliminarEmpleados(empleado.empleado_id))

                    celda6.appendChild(buttonModificar)
                    celda7.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    tr.appendChild(celda7)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay empleados disponibles'
                td.classList.add('text-center')
                td.colSpan = 6;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            // console.log('hola');
        }

        tablaEmpleados.tBodies[0].appendChild(fragment)
    } catch (error) {
        // console.log(error);
    }
}

//GUARDAR
const guardarEmpleados = async (e) => {
    e.preventDefault()
    btnGuardar.disabled = true

    const url = '/cafeteria_js/controllers/empleado/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 1)
    formData.delete('empleado_id')
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const { mensaje, codigo, detalle } = data
        // console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        }).fire()
        if (codigo == 1 && respuesta.status == 200) {
            formulario.reset()
            getEmpleado(alerta = 'no');
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnGuardar.disabled = false
}


const llenarDatos = (empleado) => {

    // console.log(empleado)
    formulario.empleado_id.value = empleado.empleado_id
    formulario.empleado_nombre.value = empleado.empleado_nombre
    formulario.empleado_apellido.value = empleado.empleado_apellido
    formulario.empleado_genero.value = empleado.empleado_genero
    formulario.empleado_puesto.value = empleado.empleado_puesto
    formulario.empleado_nacimiento.value = empleado.empleado_nacimiento
    formulario.empleado_telefono.value = empleado.empleado_telefono
    formulario.empleado_correo.value = empleado.empleado_correo
    formulario.empleado_estado.value = empleado.empleado_estado
    formulario.empleado_contra.value = empleado.empleado_contra
    formulario.empleado_direccion.value = empleado.empleado_direccion

    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'

}

//MODIFICAR

const ModificarEmpleados = async (e) => {
    e.preventDefault()
    btnModificar.disabled = true

    const url = '/cafeteria_js/controllers/empleado/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 2)
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const { mensaje, codigo, detalle } = data
        console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        }).fire()
        if (codigo == 2 && respuesta.status == 200) {
            formulario.reset()
            getCliente(alerta = 'no');
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'
            btnGuardar.parentElement.style.display = ''
            btnBuscar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnModificar.disabled = false
}

const cancelar = () => {
    formulario.reset()
    getCliente();
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'
    btnGuardar.parentElement.style.display = ''
    btnBuscar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
}

//ELIMINAR

const EliminarEmpleados = async (empleado) => {

    console.log(empleado)
    const url = '/cafeteria_js/controllers/empleado/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 3)
    formData.append('empleado_id', empleado)
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const { mensaje, codigo, detalle } = data
        console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        }).fire()
        if (codigo == 3 && respuesta.status == 200) {
            formulario.reset()
            getEmpleado(alerta = 'no');
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'
            btnGuardar.parentElement.style.display = ''
            btnBuscar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnModificar.disabled = false
}

getEmpleado();


formulario.addEventListener('submit', guardarEmpleados)
btnModificar.addEventListener('click', ModificarEmpleados)
btnBuscar.addEventListener('click', () => { getEmpleado(alerta = 'si') })
btnCancelar.addEventListener('click', cancelar)