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
#Planos Costeros
$region = $_POST['region'];

#sql query to insert the values on product
$sql = "INSERT INTO producto (rut_empresa, nombre, precio, descripcion) 
        VALUES ('$rut_empresa', '$nombre_empresa', '$precio', '$descripcion')";


#sql query to insert the values
$sql2 = "INSERT INTO planos_borde_costero (id_producto,region) VALUES (4,'$region')";

#Insert sql query
#
if (pg_query($conn, $sql)) {
    echo "New record in Producto created successfully";
    if(pg_query($conn, $sql2)){
        echo "New record in Planos_borde_costero created successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . pg_last_error($conn);
    }
} else {
    echo "Error: " . $sql . "<br>" . pg_last_error($conn);
}


?>