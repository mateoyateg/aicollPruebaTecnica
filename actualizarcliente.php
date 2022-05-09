<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Cargar la hoja de estilos en línea de Bootstrap. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Cargar el script de JQuery. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <title>Aicoll - Actualizar clientes</title>

</head>

<body>

    <body>

        <!-- Header de la pagina web -->
        <header id="header" class="header-scroll top-header headrom">

            <!-- Barra de navegación con Bootstrap. -->
            <nav class="navbar navbar-dark bg-dark">

                <div class="container-fluid">

                    <!-- Devuelve a la pagina inicial. -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="desplegardatos.php">Aicoll - Prueba Tecnica</a>
                    </div>


                    <!-- Botonera. -->
                    <div class="btn-group" role="group" aria-label="Botonera">
                        <button type="button" class="btn btn-outline-light" id="btnCargarApi">Cargar nuevos datos del API</button>
                        <script type="text/javascript">
                            $("#btnCargarApi").click(function() {
                                console.log("Boton de cargar datos del api presionado");
                                $.get("php/api.php", function(data) {
                                    alert("Respuesta: " + data);
                                });
                            });
                        </script>
                        <button type="button" class="btn btn-outline-light" onclick="location.href='crearcliente.php'">Crear un nuevo cliente</button>
                        <button type="button" class="btn btn-outline-light" onclick="location.href='desplegardatos.php'">Gestionar clientes de BD</button>

                    </div>

                </div>

            </nav>

        </header>

        <br>

        <?php

        //Mostrar errores de PHP (En caso que existan)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $id = $_POST['identificacionUsuario'];
        $id = "\"".$id."\"";
        //echo $id;
        include("php/connect.php"); //Se conecta a la BD
        $sql = "SELECT tipo, documento, nombre, apellido, email, edad, genero, telefono, imagenUrl, username, pass 
                FROM usuario u, registro r 
                WHERE u.documento = $id 
                AND u.documento = r.idUsuario ";
        //echo $sql;

        $result = mysqli_query($db, $sql);

        while ($mostrar = mysqli_fetch_assoc($result)) {
        ?>

            <!-- Desplegar formulario de actualizacion. -->
            <form action="php/actualizarBD.php" method="POST">

                <div class="mb-3">
                    <label for="select" class="form-label">Tipo de Documento</label>
                    <select class="form-select" name="documentType">
                        <option selected value=<?php echo $mostrar['tipo']; ?>> <?php echo $mostrar['tipo']; ?> </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="document" class="form-label">Documento</label>
                    <input type="text" class="form-control" name="document" value=<?php echo $mostrar['documento'];?> readonly>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value=<?php echo $mostrar['nombre'];?>>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="surname" value=<?php echo $mostrar['apellido'];?>>
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" name="email" value=<?php echo $mostrar['email'];?> aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Edad</label>
                    <input type="number" class="form-control" name="age" value=<?php echo $mostrar['edad'];?> min="1" max="100">
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Genero</label>
                    <select class="form-select" name="gender">
                        <option selected value=<?php echo $mostrar['genero'];?>>Male</option>
                        
                    </select>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="phone" value=<?php echo $mostrar['telefono'];?>>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="username" value=<?php echo $mostrar['username'];?>>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" value=<?php echo $mostrar['pass'];?>>
                </div>

                <div class="mb-3">
                    <label for="select" class="form-label">Imagen</label>
                    <input type="text" class="form-control" name="userImage" value=<?php echo $mostrar['imagenUrl'];?>>
                    
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>



        <?php } ?>



    </body>

</html>