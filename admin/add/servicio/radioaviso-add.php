<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#get information of the radioaviso
$ciudad = $_POST['ciudad'];
$descripcion = $_POST['descripcion'];
$coordenadas = $_POST['coordenadas'];
$nurnav_codigo = $_POST['nurnav_codigo'];
$sistema_aviso = $_POST['sistema_aviso'];

#insert information of the radioaviso
$sql2 = "INSERT INTO radioaviso (id_servicio,ciudad, descripcion, coordenada, nurnav_codigo, sistema_avisos) 
VALUES ('4','$ciudad', '$descripcion', '$coordenadas', '$nurnav_codigo', '$sistema_aviso')";
$result2 = pg_query($conn, $sql2);

#Display if the query was successful or not
if (!$result2) {
    echo "An error occurred.\n";
    exit;
} else {
    echo "Datos ingresados correctamente.\n";
}

?>