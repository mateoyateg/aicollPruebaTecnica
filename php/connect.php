<?php

//Conexión a la Base de Datos
$servername = "localhost";  // Servidor Local
$username = "aicoll";          // Usuario en MySQL
$password = "aicoll";        // Contraseña de usuario en MySQL
$dbname = "aicoll";            // Nombre de la base de datos

// Crear la conexion
$db = mysqli_connect($servername, $username, $password, $dbname); 

// Verificar conexion a la BD
if (!$db) {       
    die("Error de conexion: " . mysqli_connect_error());
}



?>