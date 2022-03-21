<h1 class="nombre-pagina">Crea tu Cuenta</h1>
<p class="descripcion-pagina">Ingresa tus datos y crea tu cuenta</p>

<?php include_once __DIR__ . "/../templates/alertas.php";?>

<form action="/crear-cuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input 
            type="text" 
            id="nombre"
            placeholder="Tu Nombre"
            name="nombre"
            value="<?php echo s($usuario->nombre);?>"
        >
    </div>
    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input 
            type="text" 
            id="apellido"
            placeholder="Tu Apellido"
            name="apellido"
            value="<?php echo s($usuario->apellido);?>"
        >
    </div>
    <div class="campo">
        <label for="telefono">Telefono:</label>
        <input 
            type="tel" 
            id="telefono"
            placeholder="Tu Telefono"
            name="telefono"
            value="<?php echo s($usuario->telefono);?>"
        >
    </div>
    <div class="campo">
        <label for="email">E-mail:</label>
        <input 
            type="email" 
            id="email"
            placeholder="Tu E-mail"
            name="email"
            value="<?php echo s($usuario->email);?>"
        >
    </div>
    <div class="campo">
        <label for="password">Password:</label>
        <input 
            type="password" 
            id="password"
            placeholder="Tu Password"
            name="password"
        >
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">

</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta?Inicia Sesion Aqui</a>
    <a href="/olvide">¿Olvidaste tu Password?Recuperalo Aquí</a>
</div>
