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


    <title>Aicoll - Desplegar datos de clientes</title>

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

        <!-- Tarjetas de usuarios. -->
        <div class="container">

            <div class="row ">

                <?php

                include("php/connect.php"); //Se conecta a la BD
                $sql = "SELECT documento, nombre, apellido, email, edad, genero, telefono, imagenUrl, username FROM usuario u, registro r WHERE u.documento = r.idUsuario ";
                $result = mysqli_query($db, $sql);


                while ($mostrar = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col">
                        <div class="card" style="width: 20rem;">

                            <img alt="imgUsuario" src="<?php echo $mostrar['imagenUrl']; ?>" class="img-thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $mostrar['nombre'] . " " . $mostrar['apellido']; ?> </h5>
                                <p class="card-text"><?php echo "ID: " . $mostrar['documento']; ?></p>


                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo "Usuario: " . $mostrar['username']; ?></li>
                                <li class="list-group-item"><?php echo "Telefono: " . $mostrar['telefono']; ?></li>
                                <li class="list-group-item"><?php echo "Email: " . $mostrar['email']; ?></li>
                                <li class="list-group-item"><?php echo "Genero: " . $mostrar['genero']; ?></li>
                                <li class="list-group-item"><?php echo "Edad: " . $mostrar['edad']; ?></li>
                                <li class="list-group-item">

                                    <form action="actualizarcliente.php" method="POST">
                                        <?php echo "<input name=identificacionUsuario type=\"hidden\" value=\"" . $mostrar['documento'] . "\">";
                                        ?>
                                        <button type="submit" name=<?php echo "btn" . $mostrar['documento'] ?> class="btn btn-success">Actualizar usuario</button>
                                    </form>

                                    <form action="php/eliminarcliente.php" method="POST">

                                        <?php echo "<input name=identificacionUsuario type=\"hidden\" value=\"" . $mostrar['documento'] . "\">";
                                        ?>

                                        <button type="submit" name=<?php echo "btn" . $mostrar['documento'] ?> class="btn btn-warning">Eliminar usuario</button>

                                    </form>



                                </li>
                            </ul>

                        </div>
                    </div>

                <?php } ?>
            </div>


        </div>


        <br>

    </body>

</html>