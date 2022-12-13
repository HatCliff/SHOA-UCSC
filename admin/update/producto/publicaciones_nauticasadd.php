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

#sql query to update the values from form
$sql = "UPDATE publicaciones_nauticas SET edicion='$edicion' WHERE id_publicacion=1";

$result = pg_query($conn, $sql);

?>