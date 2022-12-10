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

#sql query to insert the values
$sql2 = "INSERT INTO snam (hora, fecha, descripcion, referecia_geografica) VALUES ('$hora', '$fecha', '$descripcion', '$referecia_geografica')";
$result2 = pg_query($conn, $sql2);
?>