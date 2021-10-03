const contenidoTabla = document.querySelector('#contenido-tabla'),
      form = document.querySelector('#form');

eventListener();

function eventListener()
{
    //cuando el form de editar o crear se ejecuta
    form.addEventListener('submit', leerForm);
    //listener para eliminar el boton
    //listadoUsuarios.addEventListener('click', eliminarUsuario);

    //buscador
    //inputBuscador.addEventListener('input', buscarUsuarios);

    //numeroUsuarios();
}

function leerForm(e)
{
    e.preventDefault();
    const dataForm = new FormData(form);
    let nombre = dataForm.get('name');

    if( nombre === '') {
        //dos parametros: texto y clase
        mostrarNotificacion('Todos los Campos son Obligatorios', 'error');
    } else {
        fetch('app/api/user/post.php', {
            method: 'POST',
            body: dataForm
        })
            .then(data => data.json())
            .then(data => {
                console.log('success', data);
            })
        //resetear el form
        form.reset();
        //mostrar notificacion
        mostrarNotificacion('Usuario creado correctamente', 'correcto');
        //actualizar numero
        numeroUsuarios();
    }
}

fetch('app/api/user/read.php')
    .then(response => response.json())
    .then(datos => {
        //console.log(datos);
        table(datos)
    })

function table(datos) {
    //console.log(datos)
    contenidoTabla.innerHTML = ''
    for(let i of datos){
        contenidoTabla.innerHTML += `
        <tr>
            <td>${i.id}</td>
            <td>${i.name}</td>
            <td>
                <a class="btn-editar btn"><span class="las la-edit"></span></a>
                <button type="button" class="btn-borrar btn">
                    <span class="las la-trash"></span>
                </button>
            </td>
        </tr>
        `
    }
}

//notificacion en pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;
    //formulario
    form.insertBefore(notificacion, document.querySelector('form legend'));
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