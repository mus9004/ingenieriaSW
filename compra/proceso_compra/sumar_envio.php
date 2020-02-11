<?php 
session_start();

if(!isset($_SESSION["envio"])){
	
	$_SESSION["envio"]=3;
	$_SESSION["total"]=$_SESSION["total"]+2.48;	
	
}

?>