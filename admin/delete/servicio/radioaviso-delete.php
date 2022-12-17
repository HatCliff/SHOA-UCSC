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

#sql query to delete the values from form
$sql5 = "DELETE FROM radioaviso WHERE ciudad = '$ciudad' AND descripcion = '$descripcion' AND coordenadas = '$coordenadas' AND nurnav_codigo = '$nurnav_codigo' AND sistema_aviso = '$sistema_aviso'";
$result5 = pg_query($conn, $sql5);
?>