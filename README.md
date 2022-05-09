# Prueba técnica - Junior Backend Developer - Aicoll

Aplicación desarrollada en PHP-MySQL con Bootstrap que busca consumir data de una API especificada en las instrucciones de la prueba y la registra en una BD alojada en MySQL para realizar sobre ella los procesos CRUD.

## Comenzando

Para obtener una copia de este proyecto en su máquina local de click al botón **Code** y seleccione *Download ZIP* o ejecute el siguiente comando en la consola de Git.

```
$ git clone https://github.com/mateoyateg/aicollPruebaTecnica.git
```

## Pre-requisitos 

* Dado que la aplicación fue desarrollada en local, se requiere instalar el programa Xampp con el fin de ejecutar la BD en MySQL y el servidor Apache que aloja toda la infraestructura de la página web. Este aplicativo puede ser descargado [aquí](https://www.apachefriends.org/es/index.html).

## Instalación

Luego de instalar Xampp, debe pegar el contenido de este repositorio en la carpeta descrita por la siguiente ruta:
```
C:\xampp\htdocs\aicoll
```

Adicionalmente, debe crear la BD en MySQL. Para ello asista a Xampp -> Start MySQL -> Admin

En la ventana de administacion de MySQL debe crear la cuenta de usuario que se emplea en el aplicativo y la base de datos a la cual se conectará el aplicativo
```
Cuenta de usuarios -> Agregar cuenta de usuario

Username: aicoll
pass: aicoll

Generar la base de datos con el nombre aicoll

```

Luego de generar la base de datos, debe situarse sobre la misma y ejecutar el script de creación de las tablas alojado en _"sql/MR_Aicoll.sql"_. Este script contiene la estructura de toda la base de datos.

## Ejecución

Para ejecutar el aplicativo, verifique que el servicio de Apache y MySQL se encuentran corriendo en Xampp, luego de ello dirigase a la ruta del proyecto alojado en _localhost_:

```
http://localhost/aicoll/
```

Allí se dirigirá a la página index.php la cual es la interfaz inicial.

## Directorios del proyecto

### /php/

En este directorio se encuentran los archivos del back que permiten interactuar con el API y con la base de datos de MySQL cómo era requisito de la prueba misma.

### /sql/

En este directorio se encuentra toda la información relacionada a la base de datos (script de generacion, imagen del modelo relacional, diseño de la base de datos en la herramienta Enterprise Architect).

## Desarrollo y funcionamiento del proyecto

### Supuestos
* Para el correcto desarrollo del proyecto se contó con los siguientes supuestos:
    * Los clientes recogidos de la API se encuentran localizados en Estados Unidos (Esta decisión hace parte de las decisiones de diseño tomadas en el desarrollo del proyecto, sin embargo esta propiedad puede cambiarse al momento de recuperar los datos del API quitando la especificación de la región de los usuarios).
    * Se cargan únicamente 10 registros del API (Esta decisión se tomó por temas de agilidad y desempeño del aplicativo, pueden tomarse más o menos registros editando el atributo _numResultados_ en PHP).

### Base de datos
Inicialmente, se optó por el desarrollo de la base de datos con base en la estructura de los datos del API. El modelo relacional que describe a esta base de datos se ilustra a continuación:

![MR](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/sql/MR.png)

Luego de ello se estructuró el script SQL que tiene su base en el modelo descrito anteriormente y se montó en la base de datos MySQL de Xampp.

### Aplicación

La aplicación simula la recepción de datos de usuarios de un API externa. En este caso, dado el tamaño de la API solo se tuvieron en cuenta los siguientes elementos para cada usuario:

* Tipo Id.
* Id.
* Nombre
* Apellido
* Direccion (Numero, Apartado, Ciudad y Cod. Postal)
* Coordenadas de ubicación
* Correo electronico
* Datos de un eventual _login_ (Usuario y contraseña)
* Edad
* Genero
* Teléfono

La aplicación inicialmente (en _index.php_) realiza una carga inicial de datos de la API y los registra en la base de datos. Luego de ello procede a realizar un procedimiento de Read para listar en manera de tarjetas los principales datos de cada uno de los usuarios. Es de destacar el uso de varias tablas en el desarrollo de las sentencias SQL.

Luego de ello, el usuario presenta la siguiente interfaz

![Interfaz Inicial](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/img/img1.jpg)

En esta interfaz puede visualizar los datos cargados de la API. 
* Si el usuario desea cargar nuevos datos del API puede hacer click en el botón de "Cargar nuevos datos del API", el cual limpia la base de datos y trae nuevos registros a la BD.

![Nuevos datos Api](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/img/img2.jpg)

* Si el usuario desea Crear un nuevo cliente, puede hacer click en el botón de "Crear un nuevo cliente" el cual despliega un formulario con los campos de registro del nuevo cliente. Al final de este se encuentra el botón para enviar los datos al back y registrarlos en la BD por medio de PHP.

![Formulario de creacion](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/img/img3.jpg)

* Si el usuario desea realizar las operaciones de Eliminar y Actualizar (Delete & Update) puede hacer click en el botón de "Gestionar clientes de BD" el cual le permite visualizar los principales datos de los usuarios pero habilita dos botones, uno que permite desplegar un formulario para actualizar datos ("Actualizar usuario") y otro que permite eliminar los datos del usuario en la BD ("Eliminar usuario").

![Gestionar usuarios](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/img/img4.jpg)

* Al hacer click en el botón de actualizar, se despliega el siguiente formulario con los datos del usuario almacenados en la BD.

![Actualizar usuario](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/img/img5.jpg)

* Si se hace click en el botón de eliminar usuario, el sistema elimina el registro del usuario en la BD y vuelve a listar los registros de usuarios disponibles en la misma

![Usuario eliminado](https://github.com/mateoyateg/aicollPruebaTecnica/blob/main/img/img6.jpg)


