<?php 
session_start(); 


if(isset($_SESSION['administrador'])){
	
	if($_POST['subcategorianueva']!=""){
	 include('../../php/conexion.php');
	 $subcategorianueva=utf8_decode($_POST['subcategorianueva']);
	 $subcategoriavieja=utf8_decode($_POST['subcategoriavieja']);
	 $registros=mysqli_query($conexion,"select nombre from subcategorias where nombre='$subcategorianueva'");
	 	if(mysqli_num_rows($registros)==0){
	 	 mysqli_query($conexion,"update subcategorias set nombre='$subcategorianueva' where nombre='$subcategoriavieja'");
	 	 cerrarconexion();
	 	 header('location:form_aniadir_subcategorias.php?alert=4&subcategoriavieja='.$subcategoriavieja.'&subcategorianueva='.$subcategorianueva);
	 	}
		else{
			
			header('location:form_aniadir_subcategorias.php?alert=3&subcategoria='.$subcategorianueva);
			
			}
	
	}
	else if ($_POST['categoria']==""){
		
		 header('location:form_aniadir_subcategorias.php?alert=5');
		}

}
else {
		
		header('location:../index.html');
		
		}
	

?>