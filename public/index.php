<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\ApiController;
use Controllers\CitaController;
use Controllers\LoginController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();

    /**Iniciar Sesión */
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);

    /**Cerrar Sesión */
$router->get('/logout', [LoginController::class, 'logout']);

    /**Recuperar Password */
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

    /**Crear Cuenta */
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

    /**Confirmar cuenta */
if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $router->get('/confirmar-cuenta=$token', [LoginController::class, 'confirmar']);
}else{
    $router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
}

    /**Area Privada */
$router->get('/cita',[CitaController::class, 'index']);
$router->get('/admin',[AdminController::class, 'index']);

    /**API de citas */
$router->get('/api/servicios',[ApiController::class, 'index']);
$router->post('/api/citas',[ApiController::class, 'guardar']);
$router->post('/api/eliminar',[ApiController::class, 'eliminar']);

    /**CRUD de servicios */
$router->get('/servicios', [ServicioController::class, 'index']);

$router->get('/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);

if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $router->get("/reestablecer?token=$token", [LoginController::class, "reestablecer"]);
    $router->post("/reestablecer?token=$token", [LoginController::class, "reestablecer"]);
}else{
    $router->get("/reestablecer", [LoginController::class, "reestablecer"]);
    $router->post("/reestablecer", [LoginController::class, "reestablecer"]);
}

$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();