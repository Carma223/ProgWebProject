<?php 
$dbhost = "localhost";//host donde esta la base datos
$dbname = "collectorDB";//nombre de la BD
$dbuser = "root";// user name
$dbpass = "";// pass de usuario

$correo=$_GET["Correo"];
$password=$_GET["Password"];

$conexion = mysqli_connect( $dbhost,$dbuser,$dbpass,$dbname) or die ("Problemas con la conexion");

$sql="INSERT INTO `usuarios` (`Id`, `CORREO`, `PASSWORD`) 
VALUES (NULL, '$correo', '$password');";


mysqli_query($conexion,"SELECT * FROM usuarios");
mysqli_query($conexion,$sql);
mysqli_close($conexion);
header('Location: ../Login.html');

?>
