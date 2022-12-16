<?php
#Show information of medicion table in database using key\conn.php
#but only the information selected in a select tag with id boya
#and the information is shown in a table

#Include conn.php file
include("./../../key/conn.php");
#Create a connection to postgresql
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
$sql = "SELECT * FROM boya";

$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

#echo a form with a select tag with id boya
echo "<form action='medicion-result.php' method='post'>";
echo 'Seleccione una boya:<br>';
echo "<select name='boya' id='boya'>";
foreach(pg_fetch_all($result) as $row) {
    echo "<option value='" . $row['id_boya'] . "'>".$row['id_boya']."  -  " . $row['modelo'] . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Selecionar'>";
echo "</form>";


