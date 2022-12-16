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
$sql = "SELECT * FROM boya";
$result = pg_query($conn, $sql);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>boya</title>
</head>
<body>
    <p>
        <form action="./boya-delete.php" method="post">
            <table>
                <?php
                    #Print a select with all the id_boya
                    echo "<tr>";
                    echo "<td>sensor</td>";
                    echo "<td>";
                    echo "<select name='sensor'>";
                    foreach(pg_fetch_all($result) as $row) {
                        echo "<option value=".$row['id_boya'].">" . $row['id_boya'] . "</option>";
                    }
                ?>
                <tr>
                    <td>sensor</td>
                    <td><input type="text" name="sensor"></td>
                </tr>
                <tr>
                    <td>modelo</td>
                    <td><input type="text" name="modelo"></td>
                </tr>
                <tr>
                    <td>profundidad</td>
                    <td><input type="text" name="profundidad"></td>
                </tr>
                <tr>
                    <td>estado</td>
                    <td><input type="text" name="estado"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </p>
</body>
</html>
