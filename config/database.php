<?php

// return [
//     $dsn      = "mysql:host=blu-ray.student.bth.se;dbname=alvo16;",
//     $login    = "alvo16",
//     $password = "_Azer666",
//     $options  = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
// ]

return [
    "dsn"              => "mysql:host=localhost;dbname=oophp;charset=utf8",
    "username"         => "root",
    "password"         => "",
    "driver_options"   => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    ],
];
