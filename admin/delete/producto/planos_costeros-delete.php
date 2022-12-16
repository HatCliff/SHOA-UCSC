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

#Planos Costeros
#$id_planos = $_POST['id_plano'];
$region = $_POST['region'];

#sql query to delete the values from form
$sql6 = "DELETE FROM planos_borde_costero WHERE region = '$region'";# and id_plano = '$id_planos'";
$result6 = pg_query($conn, $sql6);

#Print the result
if ($result6) {
    echo "Se ha eliminado correctamente";
} else {
    echo "Ha ocurrido un error";
}


?>