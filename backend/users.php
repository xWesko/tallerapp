<?php

//Conexión a la base de datos
include_once 'db.php';
$pdo = pdo_connect_mysql();


//Obtener usuarios
function getUsers($pdo){
    $sql_users = "SELECT * FROM users";
    $sql_users = $pdo->prepare($sql_users);
    $sql_users->execute();
    $resp = $sql_users->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($resp);
}

//Agregar usuarios
function addUser($pdo, $name, $email, $password){
    $sql_user = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
    $sql_user = $pdo->prepare($sql_user);
    if( $sql_user->execute( array( $name, $email, $password ) ) ){
        $resp = ["resp" => true];
    }else{
        $resp = ["resp" => false];
    }
    return json_encode($resp);
}


//Editar usuarios
function editUser($pdo, $name, $email, $password, $id){
    $sql_user = "UPDATE users SET name=?, email=?, password=? WHERE id=?";
    $sql_user = $pdo->prepare($sql_user);
    if( $sql_user->execute( array( $name, $email, $password, $id ) ) ){
        $resp = ["resp" => true];
    }else{
        $resp = ["resp" => false];
    }
    return json_encode($resp);
}



// Eliminar/Activar usuarios
function changeStatusUser($pdo, $id){

    //Obtener status del usuario.
    $sql_user = "SELECT trash FROM users WHERE id = ?";
    $sql_user = $pdo->prepare($sql_user);
    $sql_user->execute( array( $id ) );
    $resp = $sql_user->fetchAll(PDO::FETCH_ASSOC);
    
    //Eliminar o Activar usuario.
    $sql_status = "UPDATE users SET trash=? WHERE id=?";
    $sql_status = $pdo->prepare($sql_status);
    if( $sql_status->execute ( array (  ($resp[0]['trash'] == 0 ) ? 1 : 0 , $id  ) ) ){
        $resp = ["resp" => true];
    }else{
        $resp = ["resp" => false];
    } 

    return json_encode($resp);

}

