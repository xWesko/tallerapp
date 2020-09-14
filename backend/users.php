<?php

//Conexión a la base de datos
include_once 'db.php';
$pdo = pdo_connect_mysql();



function getUsers($pdo){
    $sql_users = "SELECT * FROM users";
    $sql_users = $pdo->prepare($sql_users);
    $sql_users->execute();
    $resp = $sql_users->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($resp);
}


