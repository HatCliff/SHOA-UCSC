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

#sql query to update the values from form
$sql = "UPDATE snam SET hora='$hora', fecha='$fecha', descripcion='$descripcion', referecia_geografica='$referecia_geografica' WHERE id_snam=1";

$result = pg_query($conn, $sql);

?>