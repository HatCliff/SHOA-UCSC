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

#Tramite
$rut_empresa = $_POST['rut_empresa'];
$correo_electronico = $_POST['correo_electronico'];
$contraseña = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

#solicitud_datos

$tipo_datos = $_POST['tipo_datos'];
$intencion_uso = $_POST['intencion_uso'];  
$organizacion = $_POST['organizacion'];
$nombre_solicitante = $_POST['nombre_solicitante'];
$detalle_datos = $_POST['detalle_datos'];

#sql query to insert the values on product
$sql = "INSERT INTO Tramite (id_tramite, rut_empresa, correo_eletronico, contraseña, nombre, telefono, direccion)
        VALUES (1 ,'$rut_empresa', '$correo_electronico', '$contraseña', '$nombre', '$telefono', '$direccion')";
$sql2 = "INSERT INTO solicitud_datos (RUT_empresa, tipo_datos, intencion_uso, organizacion, nombre_solicitante, detalle_datos)
        VALUES (1 ,'$tipo_datos', '$intencion_uso', '$organizacion', '$nombre_solicitante', '$detalle_datos')";
#Insert sql query
$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);


?>