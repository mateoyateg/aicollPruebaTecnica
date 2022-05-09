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


    <title>Aicoll - Insertar un cliente</title>

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

        <form action="php/registrarusuario.php" method="POST">

            <div class="mb-3">
                <label for="select" class="form-label">Tipo de Documento</label>
                <select class="form-select" name="documentType">
                    <option selected value="SSN">SSN</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="document" class="form-label">Documento</label>
                <input type="text" class="form-control" name="document" value="000-00-0000">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="surname">
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" value="alguien@example.com" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="number" class="form-control" name="age" value=0 min="1" max="100">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Genero</label>
                <select class="form-select" name="gender">
                    <option selected value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="phone" value="(000)-000-0000">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="username" value="usuario">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="mb-3">
                <label for="select" class="form-label">Imagen</label>
                <select class="form-select" name="userImage">
                    <option selected value="https://randomuser.me/api/portraits/men/10.jpg">Male</option>
                    <option value="https://randomuser.me/api/portraits/women/10.jpg">Female</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

    </body>

</html>