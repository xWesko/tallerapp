<?php

header("Access-Control-Allow-Origin: *");//Permite hacer peticiones desde cualquier origen
header("Content-Type: application/json");//Decirle que será un json


include_once 'db.php';
include_once 'users.php';


//validar get
if($_SERVER['REQUEST_METHOD'] ==='GET'){   
    echo getUsers($pdo);
}