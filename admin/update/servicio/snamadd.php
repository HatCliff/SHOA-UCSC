<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#get values from form snam.html
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$referecia_geografica = $_POST['referecia_geografica'];

$nueva_hora = $_POST['nueva_hora'];
$nueva_fecha = $_POST['nueva_fecha'];
$nueva_descripcion = $_POST['nueva_descripcion'];
$nueva_referecia_geografica = $_POST['nueva_referecia_geografica'];

#sql query to update the values from form
$sql = "UPDATE snam SET hora='$nueva_hora', fecha='$nueva_fecha', descripcion='$nueva_descripcion', referecia_geografica='$nueva_referecia_geografica' WHERE hora='$hora' AND fecha='$fecha' AND descripcion='$descripcion' AND referecia_geografica='$referecia_geografica'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}
?>