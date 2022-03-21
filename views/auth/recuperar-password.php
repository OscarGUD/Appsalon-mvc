<h1 class="nombre-pagina">Reestablece tu password</h1>
<p class="descripcion-pagina">Llena los siguientes campos para reestablecer tu password</p>

<?php include_once __DIR__ . "/../templates/alertas.php"?>


<?php if($error) return;?>
<form method="POST" class="formulario">
    <div class="campo">
        <label for="password">Password:</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu Nuevo Password"
        >
    </div>

    <input type="submit" class="boton" value="Guardar Nuevo Password">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta?Inicia Sesion Aquí</a>
    <a href="/crear-cuenta">¿Aun no tienes cuenta?Crea una Aquí</a>
</div>

