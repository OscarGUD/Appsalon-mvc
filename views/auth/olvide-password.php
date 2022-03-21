<h1 class="nombre-pagina">Recupera tu Password</h1>
<p class="descripcion-pagina">Ingresa tu E-mail para recuperar tu password</p>

<?php include_once __DIR__ . "/../templates/alertas.php"?>

<form action="/olvide" class="formulario" method="POST"> 
    <div class="campo">
        <label for="email">E-mail:</label>
        <input 
            placeholder="Tu-email"
            name="email"
            for="email"
            id="email"     
        ></input>
    </div>

    <input type="submit" value="Recuperar Password" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta?Inicia Sesion Aqui</a>
    <a href="/crear-cuenta">¿No tienes una cuenta?Creala Aqui</a>
</div>

