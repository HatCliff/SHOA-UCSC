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

#sql query to delete the values from form
$sql = "DELETE FROM boya WHERE sensor = '$sensor' AND modelo = '$modelo' AND profundidad = '$profundidad' AND estado = '$estado'";
$result = pg_query($conn, $sql);

?>