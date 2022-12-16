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

#sql query to delete the values from form
$sql5 = "DELETE FROM cotas_marea WHERE latitud = '$latitud' AND region = '$region'";
$result5 = pg_query($conn, $sql5);
#print the result
if ($result5) {
    echo "Se ha eliminado correctamente";
} else {
    echo "Ha ocurrido un error";
}



?>