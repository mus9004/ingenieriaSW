<?php 
session_start();
	
	if(!isset($_SESSION['cantidad_de_productos'])){
	
		echo "animacion1";
	
	}
	
	else{
	
		echo "animacion2";
	
	}

?>