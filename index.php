<?php
session_start();
include_once __DIR__.'/models/components/Autoload.php';


$router = new Router();
$router->run();

