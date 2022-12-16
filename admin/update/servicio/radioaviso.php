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

$nueva_ciudad = $_POST['nueva_ciudad'];
$nueva_descripcion = $_POST['nueva_descripcion'];
$nuevas_coordenadas = $_POST['nuevas_coordenadas'];
$nuevo_nurnav_codigo = $_POST['nuevo_nurnav_codigo'];
$nuevo_sistema_aviso = $_POST['nuevo_sistema_aviso'];

#sql query to update the values from form
$sql = "UPDATE radioaviso SET ciudad='$nueva_ciudad', descripcion='$nueva_descripcion', coordenadas='$nuevas_coordenadas', nurnav_codigo='$nuevo_nurnav_codigo', sistema_aviso='$nuevo_sistema_aviso' WHERE ciudad='$ciudad' AND descripcion='$descripcion' AND coordenadas='$coordenadas' AND nurnav_codigo='$nurnav_codigo' AND sistema_aviso='$sistema_aviso'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}
?>