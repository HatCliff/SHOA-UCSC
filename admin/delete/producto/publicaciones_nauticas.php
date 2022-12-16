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
$sql = "SELECT * FROM publicaciones_nauticas";
$result = pg_query($conn, $sql);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>
<!doctype html>
<html>
<head>
    <title>publicaciones_nauticas</title>
</head>
<body>
    <p>
        <form action="./publicaciones_nauticas-delete.php" method="post">
            <table>
                <tr>
                    <td>Sku:</td>
                    <td>
                        <select name='sku_publicacion'>
                        <?php
                            foreach(pg_fetch_all($result) as $row) {
                    
                                echo "<option value=".$row['sku_publicacion'].">" . $row['sku_publicacion'] . "</option>";

                            }
                            
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>edicion</td>
                    <td><input type="text" name="edicion"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </p>
</html>