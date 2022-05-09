<?php

include('php/connect.php');

//Limpiar la BD
$sql = "TRUNCATE TABLE IF EXISTS `Direccion` CASCADE;";

if (mysqli_query($db, $sql)) {
    echo "La tabla fue limpiada.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo "Hola2";

$sql = "TRUNCATE TABLE IF EXISTS `Registro` CASCADE;";

if (mysqli_query($db, $sql)) {
    echo "La tabla fue limpiada.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "TRUNCATE TABLE IF EXISTS `Usuario` CASCADE;";

if (mysqli_query($db, $sql)) {
    echo "La tabla fue limpiada.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>