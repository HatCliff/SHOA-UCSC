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
#PRODUCTO

$rut_empresa = $_POST['rut_empresa'];
$nombre_empresa = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
#BOLETIN
$mes = $_POST['mes'];
$anio = $_POST['anio'];


#sql query to insert the values
$sql2 = "INSERT INTO boletin (mes, año) VALUES ('$mes', '$anio')";

#Insert sql query
$result2 = pg_query($conn, $sql2);


?>