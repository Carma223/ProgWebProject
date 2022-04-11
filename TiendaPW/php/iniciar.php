<?php
$dbhost = "localhost";//host donde esta la base datos
$dbname = "collectordb";//nombre de la BD
$dbuser = "root";// user name
$dbpass = "";// pass de usuario
//obtener los datos

$correo=$_GET["Correo"];
$password=$_GET["Password"];

if ($correo ==  'admin@correo.com' && $password == '12345'){
    header('Location: index.php');
}



//conecar a la base de datos 
$conexion = mysqli_connect( $dbhost,$dbuser,$dbpass,$dbname) or die ("Problemas con la conexion");
//$conexion=mysqli_connect("localhost","root","","carrito");
$consulta="SELECT * FROM usuarios WHERE CORREO = '$correo' and PASSWORD ='$password'"; 



$resultado=mysqli_query($conexion,$consulta);//ejecutar la consulta
//validad 
$filas=mysqli_num_rows($resultado);//obtiene el num filas
if($filas>0)
{

 session_start();//guarda la variable sesion
 //$SESSION["user"]=$usuario;

//echo "<p color=pink >Hola</p>";

//$cantidad=$_GET["cant"];
//if($cantidad >0)
//{
  //  $_SESSION["canti"]+=$cantidad;
    //echo "<br>Articulos comprados" .$SESSION["cant"]; 
//}
//include "formaPago.html";

    //header('Location: sesion.php');
    header('Location: cart.php');
    return true;
}else
{
    echo '<script>window.alert("Confirma que la contraseña o correo sean correctos")</script>';
    header('Location ../login.html');
    return false;
   
}
mysqli_free_result($resultado);//liberar los resultados
mysqli_close($conexion);
?>