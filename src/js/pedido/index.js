const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaPedido = document.getElementById('tablaPedido')
const formulario = document.querySelector('form')

btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'


const getPedido = async (alerta='si') => {
    const url = `/cafeteria_js/controllers/pedido/index.php`
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        // console.log(respuesta)
        const data = await respuesta.json();
        // console.log(data)
        tablaPedido.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;
        // console.log(data);
        if (respuesta.status == 200) {
            if(alerta == 'si'){
                Swal.mixin({
                    toast: true,
                    position: "top-right",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Pedidos encontrados',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }

            if (data.length > 0) {
                data.forEach(pedido => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const celda7 = document.createElement('td')
                    const celda8 = document.createElement('td')
                    const celda9 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = pedido.cliente_completo;
                    celda3.innerText = pedido.empleado_completo;
                    celda4.innerText = pedido.pedido_plato
                    celda5.innerText = pedido.pedido_bebida;
                    celda6.innerText = pedido.pedido_postre;
                    celda7.innerText = pedido.pedido_observaciones;


                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-secondary', 'w-100')
                    buttonModificar.innerHTML = '<i class="bi bi-back"></i>'
                    buttonModificar.addEventListener('click', () => llenarDatos(pedido))

                    buttonEliminar.textContent = 'Eliminar'
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100')
                    buttonEliminar.innerHTML = '<i class="bi bi-person-x-fill"></i>'
                    buttonEliminar.addEventListener('click', () => EliminarPedidos(pedido.pedido_id))

                    celda8.appendChild(buttonModificar)
                    celda9.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    tr.appendChild(celda7)
                    tr.appendChild(celda8)
                    tr.appendChild(celda9)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay Pedidos disponibles'
                td.classList.add('text-center')
                td.colSpan = 9;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            // console.log('hola');
        }

        tablaPedido.tBodies[0].appendChild(fragment)
    } catch (error) {
        // console.log(error);
    }
}

//GUARDAR

const guardarPedidos = async (e) => {
    e.preventDefault()
    btnGuardar.disabled = true

    const url = '/cafeteria_js/controllers/pedido/index.php'
    const formData = new FormData(formulario)
    // console.log(formData);
    formData.append('tipo', 1)
    formData.delete('pedido_id')

    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const {mensaje, codigo, detalle } = data
        // console.log(data)

        Swal.mixin({
            toast: true,
            position: "top-right",
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
            getPedido(alerta='no');
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnGuardar.disabled = false
}


const llenarDatos = (pedido) => {

    console.log(pedido)

    formulario.pedido_id.value = pedido.pedido_id
    formulario.pedido_cliente.value = pedido.pedido_cliente
    formulario.pedido_empleado.value = pedido.pedido_empleado
    formulario.pedido_observaciones.value = pedido.pedido_observaciones

    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'

}

//MODIFICAR

const ModificarPedidos = async (e) => {
    e.preventDefault()
    btnModificar.disabled = true

    const url = '/cafeteria_js/controllers/pedido/index.php'
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
            position: "top-right",
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
            getPedido(alerta='no');
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
    getPedido();
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'
    btnGuardar.parentElement.style.display = ''
    btnBuscar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
}

//ELIMINAR

const EliminarPedidos = async (pedido) => {

    // console.log(pedido)

    const url = '/cafeteria_js/controllers/pedido/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 3)
    formData.append('pedido_id', pedido)
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
            position: "top-right",
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
            getPedido(alerta='no');
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

getPedido();


formulario.addEventListener('submit', guardarPedidos)
btnModificar.addEventListener('click', ModificarPedidos)
btnBuscar.addEventListener('click',() => { getPedido(alerta='si') } )
btnCancelar.addEventListener('click', cancelar)