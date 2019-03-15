<?php
session_start();
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/Config.php');

if (Config::get_data("status_testing")) {
    ini_set('display_errors','On');
    error_reporting('E_ALL');
} else
    ini_set('display_errors','Off');

require_once(ROOT . '/components/modules/_autoloader/modul.php');
require_once(ROOT . '/components/Db.php');

require_once(ROOT . '/components/Router.php');

$router = new Router();

$router->run();