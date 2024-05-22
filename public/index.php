<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\ProductoController;
use MVC\Router;
$router = new Router();

//Login
$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);

//Agregar productos
$router->get('/agregar',[LoginController::class,'agregar']);
$router->post('/agregar',[LoginController::class,'agregar']);

//Mostrar productos
$router->get('/mostrar',[ProductoController::class,'mostrar']);
$router->post('/mostrar',[ProductoController::class,'mostrar']);

//Ver producto
$router->get('/info',[ProductoController::class,'info']);
$router->post('/info',[ProductoController::class,'info']);
//Editar productos
$router->get('/editar',[ProductoController::class,'editar']);
$router->post('/editar',[ProductoController::class,'editar']);

//Editar productos
$router->get('/editarDatos',[ProductoController::class,'editarDatos']);
$router->post('/editarDatos',[ProductoController::class,'editarDatos']);

//Eliminar productos
$router->get('/eliminar',[ProductoController::class,'eliminar']);
$router->post('/eliminar',[ProductoController::class,'eliminar']);

//Agregar productos
$router->get('/agregar',[ProductoController::class,'agregar']);
$router->post('/agregar',[ProductoController::class,'agregar']);

//Restar productos
$router->get('/restar',[ProductoController::class,'restar']);
$router->post('/restar',[ProductoController::class,'restar']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();