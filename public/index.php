<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\GuestBookController;
use Core\Router;

Router::GET('/', AuthController::class, 'login');
Router::POST('/authenticate', AuthController::class, 'authenticate');

Router::GET('/guest-books', GuestBookController::class, 'index');
Router::POST('/guest-books', GuestBookController::class, 'create');


Router::dispatch();
