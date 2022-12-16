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
$sku = $_POST['sku_publicacion'];
#sql query to delete the values from form
$sql = "DELETE FROM publicaciones_nauticas WHERE edicion = '$edicion' and sku_publicacion = '$sku'";
$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha eliminado correctamente";
} else {
    echo "Ha ocurrido un error";
}


?>