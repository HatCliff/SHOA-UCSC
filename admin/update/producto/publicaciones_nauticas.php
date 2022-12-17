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

#Publicaciones Nauticas
$edicion = $_POST['edicion'];
$nueva_edicion = $_POST['nueva_edicion'];

#sql query to update the values from form
$sql = "UPDATE publicaciones_nauticas SET edicion='$nueva_edicion' WHERE edicion='$edicion'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}

?>