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

#solicitud_autoevaluacion

$rut_representante_solicitud = $_POST['rut_representante_solicitud'];
$nombre_representante_solicitud = $_POST['nombre_representante_solicitud'];
$empresa_institucion = $_POST['empresa_institucion'];
$razon_social = $_POST['razon_social'];
$actividad_giro = $_POST['actividad_giro'];
$nacionalidad = $_POST['nacionalidad'];
$tipo_autoriacion = $_POST['tipo_autorizacion'];

$nuevo_rut_empresa = $_POST['nuevo_rut_empresa'];
$nuevo_correo_electronico = $_POST['nuevo_correo_electronico'];
$nuevo_contraseña = $_POST['nuevo_contraseña'];
$nuevo_nombre = $_POST['nuevo_nombre'];
$nuevo_telefono = $_POST['nuevo_telefono'];
$nuevo_direccion = $_POST['nuevo_direccion'];

$nuevo_rut_representante_solicitud = $_POST['nuevo_rut_representante_solicitud'];
$nuevo_nombre_representante_solicitud = $_POST['nuevo_nombre_representante_solicitud'];
$nuevo_empresa_institucion = $_POST['nuevo_empresa_institucion'];
$nuevo_razon_social = $_POST['nuevo_razon_social'];
$nuevo_actividad_giro = $_POST['nuevo_actividad_giro'];
$nuevo_nacionalidad = $_POST['nuevo_nacionalidad'];
$nuevo_tipo_autoriacion = $_POST['nuevo_tipo_autorizacion'];

#same as above, but just updating
$sql = "UPDATE tramite SET rut_emp = '$nuevo_rut_empresa', correo_electronico = '$nuevo_correo_electronico', contraseña = '$nuevo_contraseña', nombre = '$nuevo_nombre', telefono = '$nuevo_telefono', direccion = '$nuevo_direccion' WHERE rut_emp = '$rut_empresa'";
#same as above, but just updating
$sql2 = "UPDATE solicitud_autoevaluacion SET rut_representante_solicitud = '$nuevo_rut_representante_solicitud', nombre_representante_solicitud = '$nuevo_nombre_representante_solicitud', empresa_institucion = '$nuevo_empresa_institucion', razon_social = '$nuevo_razon_social', actividad_giro = '$nuevo_actividad_giro', nacionalidad = '$nuevo_nacionalidad', tipo_autoriacion = '$nuevo_tipo_autoriacion' WHERE rut_empresa = '$rut_empresa'";
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