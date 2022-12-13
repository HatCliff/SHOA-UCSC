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

#sql query to update the values from form
$sql = "UPDATE radioaviso SET ciudad='$ciudad', descripcion='$descripcion', coordenadas='$coordenadas', nurnav_codigo='$nurnav_codigo', sistema_aviso='$sistema_aviso' WHERE id_radioaviso=1";

$result = pg_query($conn, $sql);

?>