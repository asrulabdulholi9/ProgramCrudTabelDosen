<?php
if(isset($_GET["ID"])){

    $id = $_GET["ID"];


$servername = "localhost";
$username = "root";
$password = "";
$database = "siakad";

$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM dosen WHERE ID=$id";
$connection->query($sql);
}

header("location: index.php");
exit;


?>