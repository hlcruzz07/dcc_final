<?php
include "./Controllers/RouteController.php";

$router = new Router();
//USER SIDE
$router->addRoute('', './user/app.php');
$router->addRoute('register', './user/pages/register.php');
$router->addRoute('home', './user/pages/auth/home.php');
$router->addRoute('about', './user/pages/auth/about.php');
$router->addRoute('features', './user/pages/auth/features.php');
$router->addRoute('user-location', './user/pages/auth/locations.php');
$router->addRoute('visit', './user/pages/auth/visit.php');
$router->addRoute('scanned', './user/pages/auth/scanned.php');
$router->addRoute('unauthorize', './user/pages/unauthorize.php');
//ADMIN SIDE
$router->addRoute('admin-login', './admin/app.php');
$router->addRoute('dashboard', './admin/pages/dashboard.php');
$router->addRoute('visitors', './admin/pages/visitors.php');
$router->addRoute('locations', './admin/pages/locations.php');
$router->addRoute('archive', './admin/pages/archive.php');
$router->addRoute('accounts', './admin/pages/accounts.php');
$router->addRoute('activity-logs', './admin/pages/activity-logs.php');
$router->addRoute('location-scene', './admin/pages/location-scene.php');
$router->handleRequest();
