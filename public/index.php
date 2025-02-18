<?php
require_once '../App/routes.php';
require_once '../App/Controllers/UserController.php';
require_once '../App/Controllers/TaskController.php';

$router = new Router();

// Routes User
$router->add("GET", "/", [new UserController(), 'showLoginForm']);
$router->add("POST", "/login", [new UserController(), 'login']);
$router->add("GET", "/logout", [new UserController(), 'logout']);
$router->add("POST", "/register", [new UserController(), 'register']);
$router->add("GET", "/register", [new UserController(), 'showRegisterForm']);

// Routes Tasks
$router->add("GET", "/tasks", [new TaskController(), 'showTasks']);
$router->add("POST", "/tasks/create", [new TaskController(), 'createTask']);
$router->add("POST", "/tasks/edit/{id}", [new TaskController(), 'updateTask']);
$router->add("POST", "/tasks/delete/{id}", [new TaskController(), 'deleteTask']);

// Dispatcher la requête
$router->dispatch($_SERVER["REQUEST_METHOD"], parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
