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
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

#solicitud_datos

$tipo_datos = $_POST['tipo_datos'];
$intencion_uso = $_POST['intencion_uso'];  
$organizacion = $_POST['organizacion'];
$nombre_solicitante = $_POST['nombre_solicitante'];
$detalle_datos = $_POST['detalle_datos'];

#Same as above but not inserting, just deleting
$sql = "DELETE FROM Tramite WHERE rut_empresa = '$rut_empresa' AND correo_electronico = '$correo_electronico' AND contraseña = '$contraseña' AND nombre = '$nombre' AND telefono = '$telefono' AND direccion = '$direccion'";
#Insert sql query
$result = pg_query($conn, $sql);


#Get id_tramite from tramite SQL
$id_tramiteSQL = "SELECT max(id_tramite) FROM tramite"; 
$result = pg_query($conn, $id_tramiteSQL);
$id_tramite = pg_fetch_result($result, 0, 0);




$sql2 = "INSERT INTO solicitud_datos (id_tramite, tipo_datos, intencion_uso, organizacion, nombre_solicitante, detalle_datos)
        VALUES ('$id_tramite' ,'$tipo_datos', '$intencion_uso', '$organizacion', '$nombre_solicitante', '$detalle_datos')";


$result2 = pg_query($conn, $sql2);

#Print if the query was successful or not
if (!$result) {
        echo "An error occurred.\n";
        exit;
} else {
        echo "Datos ingresados correctamente";
}


?>