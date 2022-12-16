<?php
#Include conn.php file 
include("../../../key/conn.php");
#Create a connection to postgresql 
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#Get the values from the form boletin.html

#BOLETIN
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$nuevo_mes = $_POST['nuevo_mes'];
$nuevo_anio = $_POST['nuevo_anio'];
#sql query to update the values from form
$sql = "UPDATE boletin SET mes='$nuevo_mes', año='$nuevo_anio' WHERE mes = '$mes' AND año = '$anio'";

$result = pg_query($conn, $sql);
#print the result
if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}

?>