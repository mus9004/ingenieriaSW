<?php 
session_start(); 

if(isset($_SESSION['administrador'])){
	
	if($_POST['subcategoria']!=""){
	 include('../../php/conexion.php');
	 $nombre=utf8_decode($_POST['subcategoria']);
	 
	 // recogemos el id de la categoría seleccionada en el select
	 $id_categoria=$_POST['id_categoria'];
	 // recogemos el id de la categoría seleccionada en el select
	 
	 $registros=mysqli_query($conexion,"select nombre from subcategorias where nombre='$nombre'");
	 	if(mysqli_num_rows($registros)==0){
	 	 mysqli_query($conexion,"insert into subcategorias (nombre,id_categoria) values ('$nombre','$id_categoria')");
	 	 cerrarconexion();
	 	 header('location:form_aniadir_subcategorias.php?alert=1&subcategoria='.$nombre);
	 	}
		else{
			
			header('location:form_aniadir_subcategorias.php?alert=3&subcategoria='.$nombre);
			
			}
	
	}
	else if ($_POST['subcategoria']==""){
		
		 header('location:form_aniadir_subcategorias.php?alert=2');
		}

}
else {
		
		header('location:../index.html');
		
		}
	

?>