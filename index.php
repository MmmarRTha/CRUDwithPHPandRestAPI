<?php
include 'resources/partials/header.php';
?>

<div class="contenedor-barra">
    <h1 class="titulo h1">CRUD Rest API Fetch </h1>
</div>
<div class="bg-aqua contenedor sombra form">
    <form id="createForm" action="#">
        <legend>Alta de usuarios <span>Todos los datos son obligatorios</span>
        </legend>
        <!--        formulario-->
        <div class="fields">
            <div class="field">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Nombre">
            </div>
            <div class="field send">
                <input type="submit" value="Agregar">
            </div>
    </form>
</div>
<!--contenedor resultados-->
<div class="bg-white contenedor sombra usuarios">
    <div class="contenedor-usuarios">
        <h2 class="h2">Usuarios</h2>

        <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar Usuarios...">
        <div id="total-usuarios" class="total-usuarios">
            <p class="total-usuarios"><span></span> Usuarios</p>
        </div>
        <div class="contenedor-tabla">
            <table id="listado-usuarios" class="listado-usuarios">
                <thead>
                <tr>
                    <th>ID:</th>
                    <th>Nombre:</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody id="contenido-tabla">
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a id="modalEditBtn" class="btn-editar btn" ><span class="las la-edit"></span></a>
                        <a href="#" class="btn-borrar btn" id="delete-user"> <span class="las la-trash"></span></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <div id="my-modal" class="modal">
        <div class="modal-content">
            <div class="contenedor-barra">
                <h1 class="titulo h1">Actualizar Usuarios</h1>
            </div>
            <div class="contenedor-volver">
                <a href="index.php" class="btn volver">Volver</a>
            </div>
            <div class="bg-aqua contenedor sombra form">
                <form id="updateForm">
                    <legend>Actualice el usuario</legend>
                    <div class="fields">
                        <div class="pintarNombre">
                            <div class="field">
                                <input type="number" value="${data.id}" hidden="true">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" placeholder="Nombre" value="${data.name}">
                            </div>
                            <div class="field send">
                                <input id="send-update" data-id="${data.id}" type="submit" value="Editar">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php include 'resources/partials/footer.php';


