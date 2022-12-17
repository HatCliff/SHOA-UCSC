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

$nuevo_rut_empresa = $_POST['nuevo_rut_empresa'];
$nuevo_correo_electronico = $_POST['nuevo_correo_electronico'];
$nuevo_contraseña = $_POST['nuevo_contraseña'];
$nuevo_nombre = $_POST['nuevo_nombre'];
$nuevo_telefono = $_POST['nuevo_telefono'];
$nuevo_direccion = $_POST['nuevo_direccion'];

$nuevo_tipo_datos = $_POST['nuevo_tipo_datos'];
$nuevo_intencion_uso = $_POST['nuevo_intencion_uso'];
$nuevo_organizacion = $_POST['nuevo_organizacion'];
$nuevo_nombre_solicitante = $_POST['nuevo_nombre_solicitante'];
$nuevo_detalle_datos = $_POST['nuevo_detalle_datos'];

#same as above, but just updating
$sql = "UPDATE tramite SET rut_empresa = '$nuevo_rut_empresa', correo_electronico = '$nuevo_correo_electronico', contraseña = '$nuevo_contraseña', nombre = '$nuevo_nombre', telefono = '$nuevo_telefono', direccion = '$nuevo_direccion' WHERE rut_empresa = '$rut_empresa' AND correo_electronico = '$correo_electronico' AND contraseña = '$contraseña' AND nombre = '$nombre' AND telefono = '$telefono' AND direccion = '$direccion'";
#same as above, but just updating
$sql2 = "UPDATE solicitud_datos SET tipo_datos = '$nuevo_tipo_datos', intencion_uso = '$nuevo_intencion_uso', organizacion = '$nuevo_organizacion', nombre_solicitante = '$nuevo_nombre_solicitante', detalle_datos = '$nuevo_detalle_datos' WHERE rut_empresa = '$rut_empresa' AND correo_electronico = '$correo_electronico' AND contraseña = '$contraseña' AND nombre = '$nombre' AND telefono = '$telefono' AND direccion = '$direccion' AND tipo_datos = '$tipo_datos' AND intencion_uso = '$intencion_uso' AND organizacion = '$organizacion' AND nombre_solicitante = '$nombre_solicitante' AND detalle_datos = '$detalle_datos'";
#Insert sql query
$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);

#Display if the query was successful or not
if (!$result2  && !$result) {
        echo "An error occurred.\n";
        exit;
    } else {
        echo "Datos ingresados correctamente.\n";
    }
?>