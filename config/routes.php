<?php
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\Middleware\AuthMiddleware;
use App\Controllers\Middleware\GuestMiddleware;
use App\Controllers\Notas\CriarController;
use App\Controllers\Notas\IndexController as NotasIndexController;
use App\Controllers\RegistrarController;
use Core\Route;

(new Route)

    ->get('/', IndexController::class, GuestMiddleware::class)
    ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
    ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
    ->get('/registrar', [RegistrarController::class, 'index'], GuestMiddleware::class)
    ->post('/registrar', [RegistrarController::class, 'registrar'], GuestMiddleware::class)


    ->get('/notas', NotasIndexController::class, AuthMiddleware::class)
    ->get('/notas/criar', [CriarController::class, 'index'], AuthMiddleware::class)
    ->post('/notas/criar', [CriarController::class, 'store'], AuthMiddleware::class)
    ->get('/logout', LogoutController::class, AuthMiddleware::class)


    ->run();
