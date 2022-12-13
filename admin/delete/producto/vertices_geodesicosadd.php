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

#sql query to delete the values from form
$sql8 = "DELETE FROM vertices_geodesicos WHERE latitud = '$latitud' AND tipo_altura = '$tipo_altura'";
$result8 = pg_query($conn, $sql8);

?>