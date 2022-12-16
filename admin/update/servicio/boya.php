<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#Get values from form boya.html

#BOYA
$sensor = $_POST['sensor'];
$modelo = $_POST['modelo'];
$profundidad = $_POST['profundidad'];
$estado = $_POST['estado'];

$nuevo_sensor = $_POST['nuevo_sensor'];
$nuevo_modelo = $_POST['nuevo_modelo'];
$nueva_profundidad = $_POST['nueva_profundidad'];
$nuevo_estado = $_POST['nuevo_estado'];

#sql query to update the values from form
$sql = "UPDATE boya SET sensor='$nuevo_sensor', modelo='$nuevo_modelo', profundidad='$nueva_profundidad', estado='$nuevo_estado' WHERE sensor='$sensor' AND modelo='$modelo' AND profundidad='$profundidad' AND estado='$estado'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}

?>