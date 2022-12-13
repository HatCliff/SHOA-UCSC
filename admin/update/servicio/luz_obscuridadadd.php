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


#sql query to update the values from form
$sql = "UPDATE luz_obscuridad SET fecha='$fecha', hora='$hora', orto_luna='$orto_luna', ocaso_luna='$ocaso_luna', orto_sol='$orto_sol', ocaso_sol='$ocaso_sol', aurora_civil='$aurora_civil', aurora_nautica='$aurora_nautica', crepusculo_civil='$crepusculo_civil', crepusculo_nautico='$crepusculo_nautico' WHERE id_luz=1";

$result = pg_query($conn, $sql);

?>