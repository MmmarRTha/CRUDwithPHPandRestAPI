const contenidoTabla = document.querySelector('#contenido-tabla'),
      totalUsuarios = document.querySelector('#total-usuarios'),
      createForm = document.querySelector('#createForm'),
      inputBuscador = document.querySelector('#buscar'),
      listadoUsuarios = document.querySelector('#listado-usuarios');

eventListener();

function eventListener()
{
    createForm.addEventListener('submit', postForm);
    //listener para eliminar el boton
    //listadoUsuarios.addEventListener('click', eliminarUsuario);
    //buscador
    inputBuscador.addEventListener('input', buscarUsuarios);
}

function postForm(e)
{
    e.preventDefault();
    const dataForm = new FormData(createForm);
    let nombre = dataForm.get('name');

    if( nombre === '') {
        //dos parametros: texto y clase
        mostrarNotificacion('Todos los Campos son Obligatorios!', 'error');
    } else {
        fetch('app/api/user/create.php', {
            method: 'POST',
            body: dataForm
        })
            .then(data => data.json())
            .then(data => {
                console.log('success', data);
                mostrarNotificacion('Usuario creado correctamente!', 'correcto');
                createForm.reset();
            }).catch(error => {
                console.log('error', error);
                mostrarNotificacion('Hubo un error al crear el usuario!', 'error');
        })
    }
}

//mostrar datos en tabla
fetch('app/api/user/read.php')
    .then(response => response.json())
    .then(datos => {
        console.log('success', datos);
        table(datos);
        buscarUsuarios(datos);
    }).catch(error =>{
        console.log('error', error);
        mostrarNotificacion('Hubo un error al mostrar la tabla de usuarios!', 'error');
})

function table(datos) {
    //console.log(datos.length)
    numeroUsuarios(datos);
    contenidoTabla.innerHTML = ''
    for(let i of datos){
        contenidoTabla.innerHTML += `
        <tr>
            <td>${i.id}</td>
            <td>${i.name}</td>
            <td>
                <a class="btn-editar btn" href="update.php?${i.id}" onclick="update(${i.id})"><span class="las la-edit"></span></a>
                <button type="button" class="btn-borrar btn">
                    <span class="las la-trash"></span>
                </button>
            </td>
        </tr>
        `
    }
}
function numeroUsuarios(datos){
    const total = datos.length;
    totalUsuarios.innerHTML = `
    <p class="total-usuarios"><span>${total}</span> Usuarios</p>
    `
    console.log(total);
}
//notificacion en pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;
    //formulario
    createForm.insertBefore(notificacion, document.querySelector('form legend'));
    //ocultar y mostrar la notifiacion
    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    }, 100);
}
//busca registros
function buscarUsuarios(datos) {
    registros = datos;
    //console.log(registros);

}

const update = (id) =>{
    alert(id);
}