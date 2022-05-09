<?php

//Mostrar errores de PHP (En caso que existan)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Conectarse a la BD
include("php/connect.php");

//Limpiar las tablas
limpiarTablas();

// Insertar los registros de usuarios
for ($i = 0; $i < count($data); $i++) {
    $sql = "INSERT INTO `usuario` (tipo, documento, nombre, apellido, email, edad, genero, telefono) 
        VALUES ('"
        . $data[$i][0] . "','"
        . $data[$i][1] . "','"
        . $data[$i][2] . "','"
        . $data[$i][3] . "','"
        . $data[$i][10] . "','"
        . $data[$i][13] . "','"
        . $data[$i][15] . "','"
        . $data[$i][16] . "');";

    if (mysqli_query($db, $sql)) {
        // Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

// Insertar los registros de direccion
for ($i = 0; $i < count($data); $i++) {
    $sql = "INSERT INTO `direccion` (numero, nombre, ciudad, codPostal, latitud, longitud, idUsuario) 
        VALUES ('"
        . $data[$i][4] . "','"
        . $data[$i][5] . "','"
        . $data[$i][6] . "','"
        . $data[$i][7] . "','"
        . $data[$i][8] . "','"
        . $data[$i][9] . "','"
        . $data[$i][1] . "');";

    if (mysqli_query($db, $sql)) {
        // Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

//Insertar los registros de los datos de registro
for ($i = 0; $i < count($data); $i++) {
    $sql = "INSERT INTO `registro` (username, pass, imagenUrl, idUsuario) 
        VALUES ('"
        . $data[$i][11] . "','"
        . $data[$i][12] . "','"
        . $data[$i][14] . "','"
        . $data[$i][1] . "');";

    if (mysqli_query($db, $sql)) {
        // Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}


function limpiarTablas()
{
    include("php/connect.php"); //Se conecta a la BD

    //Deshabilitar llaves foraneas para limpiar la BD
    $sql = "SET FOREIGN_KEY_CHECKS = 0;";

    if (mysqli_query($db, $sql)) {
        //Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    $sql = "TRUNCATE TABLE `Direccion`;";

    if (mysqli_query($db, $sql)) {
        //Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }


    $sql = "TRUNCATE TABLE `Registro`;";

    if (mysqli_query($db, $sql)) {
        //Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }


    $sql = "TRUNCATE TABLE `Usuario`;";

    if (mysqli_query($db, $sql)) {
        //Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    //Habilitar las llaves foraneas nuevamente
    $sql = "SET FOREIGN_KEY_CHECKS = 1;";

    if (mysqli_query($db, $sql)) {
        //Do nothing
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
