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

#Vertices Geodesicos
$latitud = $_POST['latitud'];
$tipo_altura = $_POST['tipo_altura'];
$nueva_latitud = $_POST['nueva_latitud'];
$nuevo_tipo_altura = $_POST['nuevo_tipo_altura'];


#sql query to update the values from form
$sql = "UPDATE vertices_geodesicos SET latitud='$nueva_latitud', tipo_altura='$nuevo_tipo_altura' WHERE latitud='$latitud' AND tipo_altura='$tipo_altura'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}

?>