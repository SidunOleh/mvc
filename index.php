<?php

error_reporting(E_ALL); // відображення помиллок

session_start(); // сесія

define('ROOT', __DIR__); // корінь проекта

// підключення файлів
require_once ROOT . '/components/autoload.php';

// маршрутизація
$router = new Router();
$router->run();