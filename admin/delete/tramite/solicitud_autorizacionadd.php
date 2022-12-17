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

#sql query to insert the values on product
$sql = "DELETE FROM Tramite (rut_empresa, correo_electronico, contraseña, nombre, telefono, direccion)
        VALUES ('$rut_empresa', '$correo_electronico', '$contraseña', '$nombre', '$telefono', '$direccion')";

$sql2 = "DELETE FROM solicitud_autorizacion WHERE rut_emp_solicitud = '$rut_empresa', rut_representante_sol = '$rut_representante_solicitud' , 
        nombre_rep = '$nombre_representante_solicitud', empresa_institucion='$empresa_institucion',
        razon_social='$razon_social', actividad_giro='$actividad_giro', nacionalidad = '$nacionalidad',
        tipo_autorizacion='$tipo_autoriacion')";
#Insert sql query
$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);

#Display if the query was successful or not
if (!$result) {
        echo "An error occurred.\n";
        exit;
} else {
        echo "Datos ingresados correctamente";
}


?>