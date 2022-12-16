<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#get values from form marea.html
$altura = $_POST['altura'];
$nombre_puerto = $_POST['nombre_puerto'];
$nueva_altura = $_POST['nueva_altura'];
$nuevo_nombre_puerto = $_POST['nuevo_nombre_puerto'];

#sql query to update the values from form
$sql = "UPDATE marea SET altura='$nueva_altura', nombre_puerto='$nuevo_nombre_puerto' WHERE altura='$altura' AND nombre_puerto='$nombre_puerto'";
$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}
?>