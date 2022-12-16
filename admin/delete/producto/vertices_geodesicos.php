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
$sql = "SELECT * FROM vertices_geodesicos";
$result = pg_query($conn, $sql);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>
<!doctype html>
<html>
<head>
    <title>vertices_geodesicos</title>
</head>
<body>
    <p>
        <form action="./vertices_geodesicos-delete.php" method="post">
            <table>
                <tr>
                    <td>Id Vertice:</td>
                    <td>
                        <select name='id_vertice'>
                        <?php
                            foreach(pg_fetch_all($result) as $row) {
                    
                                echo "<option value=".$row['id_vertice'].">" . $row['id_vertice'] . "</option>";

                            }
                            
                        ?>
                        </select>
                    </td>

                <tr>
                    <td>Latitud</td>
                    <td><input type="text" name="latitud"></td>
                </tr>
                <tr>
                    <td>Tipo altura</td>
                    <td><input type="text" name="tipo_altura"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </p>
</body>
</html>