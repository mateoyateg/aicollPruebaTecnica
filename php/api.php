<?php

//Se activa al presionar el boton de cargar nuevos datos del api
//los carga y los registra en la BD

include '../php/connect.php';

$numResultados = 12;
$url = "https://randomuser.me/api/?nat=us&results=" . $numResultados;
$json = file_get_contents($url);
$datosAPI = json_decode($json, true);

//Array vacio
$data = [];

for ($i = 0; $i < $numResultados; $i++) {

    $data[$i][] = $datosAPI["results"][$i]["id"]["name"]; //0
    $data[$i][] = $datosAPI["results"][$i]["id"]["value"]; //1
    $data[$i][] = $datosAPI["results"][$i]["name"]["first"]; //2
    $data[$i][] = $datosAPI["results"][$i]["name"]["last"]; //3
    $data[$i][] = $datosAPI["results"][$i]["location"]["street"]["number"]; //4
    $data[$i][] = $datosAPI["results"][$i]["location"]["street"]["name"]; //5
    $data[$i][] = $datosAPI["results"][$i]["location"]["city"]; //6
    $data[$i][] = $datosAPI["results"][$i]["location"]["postcode"]; //7
    $data[$i][] = $datosAPI["results"][$i]["location"]["coordinates"]["latitude"]; //8
    $data[$i][] = $datosAPI["results"][$i]["location"]["coordinates"]["longitude"]; //9
    $data[$i][] = $datosAPI["results"][$i]["email"]; //10
    $data[$i][] = $datosAPI["results"][$i]["login"]["username"]; //11
    $data[$i][] = $datosAPI["results"][$i]["login"]["password"]; //12
    $data[$i][] = $datosAPI["results"][$i]["dob"]["age"]; //13
    $data[$i][] = $datosAPI["results"][$i]["picture"]["large"]; //14
    $data[$i][] = $datosAPI["results"][$i]["gender"]; //15
    $data[$i][] = $datosAPI["results"][$i]["phone"]; //16

}

//Mostrar errores de PHP (En caso que existan)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Limpiar las tablas
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
        . $data[$i][2] . "','"
        . $data[$i][3] . "','"
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


echo "Los datos se actualizaron en la BD";




?>