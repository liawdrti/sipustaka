<?php

session_start();
require_once '../../config/Database.php';

spl_autoload_register(function ($class) {
    require_once '../../classes/' . $class . '.php';
});



//membuat objek baru dari User
$user = new User();
