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

$sql = "INSERT INTO marea (id_servicio,altura, nombre_puerto)
VALUES (3,'$altura', '$nombre_puerto')";
$result = pg_query($conn, $sql);

#Display if the query was successful or not
if (!$result) {
    echo "An error occurred.\n";
    exit;
} else {
    echo "Datos ingresados correctamente.\n";
}
?>