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

$sql2 = "INSERT INTO luz_obscuridad (id_servicio ,fecha, hora) VALUES ('2','$fecha', '$hora')";
$result2 = pg_query($conn, $sql2);
#get id_luz_obscuridad
$sqlid = "SELECT id_luz_obs FROM luz_obscuridad WHERE fecha = '$fecha' AND hora = '$hora'";
$resultid = pg_query($conn, $sqlid);
$resultid = pg_fetch_result($resultid, 0, 0);
$sql3 = "INSERT INTO luna(id_luz_obs,orto_luna, ocaso_luna) VALUES ('$resultid','$orto_luna', '$ocaso_luna')";
$result3 = pg_query($conn, $sql3);
$sql4 = "INSERT INTO sol (id_luz_obs,orto_sol, ocaso_sol, aurora_civil, aurora_nautica, crepusculo_civil, crepusculo_nautico) 
VALUES ('$resultid','$orto_sol', '$ocaso_sol', '$aurora_civil', '$aurora_nautica', '$crepusculo_civil', '$crepusculo_nautico')";
$result4 = pg_query($conn, $sql4);



?>