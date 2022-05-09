<?php

//Mostrar errores de PHP (En caso que existan)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php'; //Conectarse a la BD

//Recuperar las variables
$document = $_POST['identificacionUsuario'];

//Construir la sentencia
$sql = "DELETE FROM registro WHERE
        idUsuario = '$document';
        ";

if (mysqli_query($db, $sql)) {
    echo "Registro eliminado en Registro";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

$sql = "DELETE FROM direccion WHERE
        idUsuario = '$document';
        ";

if (mysqli_query($db, $sql)) {
    echo "Registro eliminado en Registro";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

$sql = "DELETE FROM usuario WHERE
        documento = '$document';
        ";

if (mysqli_query($db, $sql)) {
    echo "Registro eliminado en Usuario";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("refresh:0;url=/aicoll/desplegardatos.php");
header("Location: /aicoll/desplegardatos.php");

