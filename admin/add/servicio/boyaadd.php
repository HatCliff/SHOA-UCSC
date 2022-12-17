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

#sql query to insert the values
$sql2 = "INSERT INTO boya (id_servicio,sensor, modelo, profundidad, estado)
VALUES ('1','$sensor', '$modelo', '$profundidad', '$estado')";

$result2 = pg_query($conn, $sql2);

#Display if the query was successful or not
if (!$result2) {
    echo "An error occurred.\n";
    exit;
} else {
    echo "Datos ingresados correctamente.\n";
}
?>