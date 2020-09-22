<?php

header("Access-Control-Allow-Origin: *");//Permite hacer peticiones desde cualquier origen
header("Content-Type: application/json");//Decirle que será un json

//Conexión a la ba se de datos
include_once 'db.php';


//Funciones
include_once 'users.php';


//Obtener usuarios
if( isset( $_GET['getusers'] ) ){   
    echo getUsers($pdo);
}

//Guardar usuario
if( isset($_POST['adduser']) ) {   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo addUser($pdo, $name, $email, $password);
}


//Actualizar usuairo
if( isset( $_POST['edituser'] ) ){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo editUser($pdo, $name, $email, $password, $id);
}


// Eliminar/Activar usuarios
if( isset( $_POST['changestatususer'] ) ){

    $id = $_POST['id'];
    echo changeStatusUser($pdo, $id);
}