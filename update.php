<?php
include 'resources/partials/header.php';
?>

<div class="contenedor-barra">
    <h1 class="titulo h1">Actualizar Usuarios</h1>
</div>
<div class="contenedor-volver">
    <a href="index.php" class="btn volver">Volver</a>
</div>
<div class="bg-aqua contenedor sombra form">
    <form id="usuario" action="#">
        <legend>Actualice el usuario</legend>
        <div class="fields">
            <div class="field">
                <label for="name">Nombre:</label>
                <input type="text" id="name" placeholder="Nombre"
                       value=""
                >
            </div>
            <div class="field send">
                <input type="hidden" id="accion" value="update">
                <input type="submit" value="Editar">
            </div>
    </form>
</div>
