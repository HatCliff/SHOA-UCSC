<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#get values from form ./medicion.html
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$velocidad_viento = $_POST['velocidad_viento'];
$velocidad_maxima_viento = $_POST['velocidad_maxima_viento'];
$direccion_viento = $_POST['direccion_viento'];
$altura_significativa = $_POST['altura_significativa'];
$altura_maxima = $_POST['altura_maxima'];
$temperatura_aire = $_POST['temperatura_aire'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$direccion_media = $_POST['direccion_media'];
$periodo_peak = $_POST['periodo_peak'];
$temperatura_agua = $_POST['temperatura_agua'];
$humedad_relativa = $_POST['humedad_relativa'];
$boya = $_POST['boya'];

$sql2 = "INSERT INTO medicion (fecha, hora, velocidad_viento, velocidad_max_viento, direccion_viento, 
altura_significativa, altura_maxima, temperatura_aire, latitud, longitud, direccion_media, periodo_peak, temperatura_agua, 
humedad_relativa, id_boya) VALUES ('$fecha', '$hora', '$velocidad_viento', '$velocidad_maxima_viento', '$direccion_viento', 
'$altura_significativa', '$altura_maxima', '$temperatura_aire', '$latitud', '$longitud' , '$direccion_media', 
'$periodo_peak', '$temperatura_agua', '$humedad_relativa', '$boya')";
$result2 = pg_query($conn, $sql2);
?>