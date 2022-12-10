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
$tipo_autoriacion = $_POST['tipo_autoriacion'];

#sql query to insert the values on product
$sql = "INSERT INTO Tramite (id_tramite, rut_empresa, correo_eletronico, contraseña, nombre, telefono, direccion)
        VALUES (1 ,'$rut_empresa', '$correo_electronico', '$contraseña', '$nombre', '$telefono', '$direccion')";
       
$sql2 = "INSERT INTO solicitud_autoevaluacion (RUT_empresa, rut_representante_solicitud, nombre_representante_solicitud, empresa_institucion, razon_social, actividad_giro, nacionalidad, tipo_autoriacion)
        VALUES (1 ,'$rut_representante_solicitud', '$nombre_representante_solicitud', '$empresa_institucion', '$razon_social', '$actividad_giro', '$nacionalidad', '$tipo_autoriacion')";
#Insert sql query
$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);

?>