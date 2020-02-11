<?php 

include("../php/conexion.php");
$email=htmlentities($_POST["email"]);
$email=mysqli_real_escape_string($conexion,$_POST["email"]);
$id_producto=$_POST["id_producto"];

$sql1="SELECT correo FROM aviso_stock WHERE correo='$email' AND id_producto='$id_producto'";
$registro=mysqli_query($conexion,$sql1);
if(mysqli_num_rows($registro)==0){
	
	$sql2="INSERT INTO aviso_stock (correo,id_producto) VALUES ('$email','$id_producto')";
	mysqli_query($conexion,$sql2);
	cerrarconexion();

} else {

	echo "fracaso";
	
}

?>