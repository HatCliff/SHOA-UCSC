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

#Cotas Marea
$latitud = $_POST['latitud'];
$region = $_POST['region'];
$nueva_latitud = $_POST['nueva_latitud'];
$nueva_region = $_POST['nueva_region'];

#sql query to update the values from form
$sql = "UPDATE cotas_marea SET latitud='$nueva_latitud', region='$nueva_region' WHERE latitud='$latitud' AND region='$region'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}

?>