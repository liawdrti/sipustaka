<?php

//menyalakan session
session_start();

//ambil semua claas dari folder classes
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

require_once 'config/Database.php';

//membuat objek baru dari User
$user = new User();
