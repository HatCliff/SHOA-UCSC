<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#get values from form luz_obscuridad.html
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$orto_luna = $_POST['orto_luna'];
$ocaso_luna = $_POST['ocaso_luna'];
$orto_sol = $_POST['orto_sol'];
$ocaso_sol = $_POST['ocaso_sol'];
$aurora_civil = $_POST['aurora_civil'];
$aurora_nautica = $_POST['aurora_nautica'];
$crepusculo_civil = $_POST['crepusculo_civil'];
$crepusculo_nautico = $_POST['crepusculo_nautico'];


#sql query to delete the values from form
$sql = "DELETE FROM luz_obscuridad WHERE fecha = '$fecha' AND hora = '$hora' AND orto_luna = '$orto_luna' AND ocaso_luna = '$ocaso_luna' AND orto_sol = '$orto_sol' AND ocaso_sol = '$ocaso_sol' AND aurora_civil = '$aurora_civil' AND aurora_nautica = '$aurora_nautica' AND crepusculo_civil = '$crepusculo_civil' AND crepusculo_nautico = '$crepusculo_nautico'";
$result = pg_query($conn, $sql);
?>