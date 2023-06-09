<?php
declare(strict_types=1);

define("DEBUG", true);

// show errors in development environment
if (DEBUG) {
    ini_set('show_errors', 'On');
    ini_set('display_errors', '1');
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
} else {
    ini_set('show_errors', 'Off');
    ini_set('display_errors', '0');
}

// Project root i.e. /home/u202001264/DBProject
define("PROJECT_ROOT", __DIR__);

// Base URL i.e. /~u202001264/DBProject
define("BASE_URL", preg_replace('/\/home\/(\w+)\/public_html\/(.*)/', '/~$1/$2', PROJECT_ROOT));


// include the database class automatically
include_once PROJECT_ROOT . "/Database.php";

// include model classes automatically
spl_autoload_register(function ($c) {
    include_once PROJECT_ROOT . "/models/$c.php";
});

// start session
session_start();