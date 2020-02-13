<?php 
session_start();

if(isset($_SESSION['envio'])){
	
	unset($_SESSION['envio']);	
	$_SESSION["total"]=$_SESSION["total"]-2.48;	
		
}
?>