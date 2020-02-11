<?php 
session_start();

$cantidad_producto=$_POST["cantidad_producto"];
	
	if(isset($_SESSION['cantidad_de_productos'])){
	
		$_SESSION['cantidad_de_productos']=$cantidad_producto+$_SESSION['cantidad_de_productos'];
	
	}
	
	else{
	
		$_SESSION['cantidad_de_productos']=$cantidad_producto;
	
	}
	
	echo $_SESSION['cantidad_de_productos'];

?>