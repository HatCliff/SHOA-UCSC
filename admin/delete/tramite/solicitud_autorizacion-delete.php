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

#same as above but not inserting, just deleting
$sql = "DELETE FROM Tramite WHERE rut_empresa = '$rut_empresa' AND correo_electronico = '$correo_electronico' AND contraseña = '$contraseña' AND nombre = '$nombre' AND telefono = '$telefono' AND direccion = '$direccion'";
$sql2 = "DELETE FROM solicitud_autorizacion WHERE rut_emp_solicitud = '$rut_empresa' AND rut_representante_sol = '$rut_representante_solicitud' AND nombre_rep = '$nombre_representante_solicitud' AND empresa_institucion = '$empresa_institucion' AND razon_social = '$razon_social' AND actividad_giro = '$actividad_giro' AND nacionalidad = '$nacionalidad' AND tipo_autorizacion = '$tipo_autoriacion'";


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