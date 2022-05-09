<?php

//Mostrar errores de PHP (En caso que existan)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php'; //Conectarse a la BD

//Recuperar las variables
$documentType = $_POST['documentType'];
$document = $_POST['document'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$username = $_POST['username'];
$password = $_POST['password'];
$userImage = $_POST['userImage'];

//Construir la sentencia a la tabla de usuario
$sql = "INSERT INTO usuario(tipo,documento,nombre,apellido,email,edad,genero,telefono) 
VALUES ('$documentType','$document','$name','$surname',
'$email','$age','$gender','$phone');";

if (mysqli_query($db, $sql)) {
    echo "Registro insertado";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

//Construir la sentencia a la tabla de registro
$sql = "INSERT INTO registro(username,pass,imagenUrl,idUsuario) 
VALUES ('$username','$password','$userImage', '$document')";

if (mysqli_query($db, $sql)) {
    echo "Registro insertado en registro";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

//echo $_SERVER['PHP_SELF'];

header("refresh:0;url=/aicoll/desplegardatos.php");
header("Location: /aicoll/desplegardatos.php");