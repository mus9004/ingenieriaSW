<?php
session_start(); 


if(!isset($_SESSION['administrador'])){
	if($_POST['nombre']=="admin" && $_POST['password']=="123"){
	
		$_SESSION['administrador']=$_POST['nombre'];
	
	}
}

if (isset($_SESSION['administrador'])){
	
	
	header('location:pedidos/ver_pedidos.php');
	
	
	
	}
	
	else {
		
		header('location:index.html');
		
		}

?>