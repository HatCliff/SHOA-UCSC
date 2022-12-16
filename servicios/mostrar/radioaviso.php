<?php
include("./../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
$sql = "SELECT * FROM radioaviso";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
echo "<style> table, th, td { padding:5px; } 
        table,tr{ border: 1px solid black; border-collapse: collapse; }}
</style>";
echo "<h3>Informacion de Radioaviso</h3>";
echo"<table>";
echo "<tr>";
echo "<td>Id aviso</td>";
echo "<td>Id servicio</td>";
echo "<td>Ciudad</td>";
echo "<td>Descripcion</td>";
echo "<td>Sistema de avisos</td>";
echo "<td>Código Nurnav (Si aplica)</td>";
echo "<tr><br>";
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_aviso']."</td>";
    echo "<td>".$row['id_servicio']."</td>";
    echo "<td>".$row['ciudad']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['sistema_avisos']."</td>";
    echo "<td>".$row['nurnav_codigo']."</td>";
    echo "</tr>";
}
echo '</table>'


?>