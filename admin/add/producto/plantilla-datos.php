<?php
#Primero incluimos el archivo de configuración
include("../../../key/conn.php");
#Creamos la conexión a la base de datos
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Comprobamos si la conexión es exitosa
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#Obtenemos los valores del formulario que deseamos insertar
#Por ejemplo:
#Obtenemos el valor del campo nombre
$nombre = $_POST['nombre'];
#Obtenemos el valor del campo apellido
$apellido = $_POST['apellido'];
#Obtenemos el valor del campo correo
$correo = $_POST['correo'];
#Hay que reemplazar el nombre de variable ($estoEsVariable)
#y tambien hay que reemplazar el post ($_POST['estoEsVariable'])
#por el nombre del campo que deseamos insertar
#En el archivo html hay una etiqueta form como esta:
#<form action="boletinadd.php" method="post">
#dentro hay inputs como este:
#<input type="text" name="nombre" placeholder="Nombre">
#el nombre de la variable $_POST['nombre'] es el mismo que el name="nombre"
#es decir, hay que fijarse en el atributo name del input
?>