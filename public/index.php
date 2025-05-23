<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Core/Database.php';

$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);
var_dump($_SERVER);
