<?php

namespace Controllers;

use    model\Manager\RouteManager;


$router = new RouteManager($twig, $db);

// Register routes
// GENERAL ROUTES
$router->registerRoute('home', MainController::class, 'index');
$router->registerRoute("logout", ConnectionController::class, "logout");
$router->registerRoute('404', ErrorController::class, 'error404');
$router->registerRoute('shortened', MainController::class, 'shortened');
$router->registerRoute('gotoShort', MainController::class, 'gotoShort');

if (isset($_GET["s"])) {
    $_GET["route"] = "gotoShort";
}
    $route = $_GET['route'] ?? 'home';

// Handle request
$router->handleRequest($route);