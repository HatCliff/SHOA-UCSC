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

#sql query to update the values from form
$sql = "UPDATE vertices_geodesicos SET latitud='$latitud', tipo_altura='$tipo_altura' WHERE id_vertice=1";

$result = pg_query($conn, $sql);

?>