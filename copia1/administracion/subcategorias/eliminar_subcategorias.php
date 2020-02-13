<?php 
session_start();

	if(isset($_SESSION['administrador'])){
	
	
		$id_subcategoria=$_POST['id_subcategoria'];
		include('../../php/conexion.php');
		
		
		// descargable nuevo
		$registros1=mysqli_query($conexion,"select id_producto,descargable from productos where id_subcategoria='$id_subcategoria'");
		// descargable nuevo
		
		while($fila1=mysqli_fetch_array($registros1)){
		
			$registros2=mysqli_query($conexion,"select nombre from imagenes where id_producto='$fila1[id_producto]'");
			while($fila2=mysqli_fetch_array($registros2)){
				
				unlink("../productos/imagenes/".$fila2['nombre']);	
				
			}
			
			mysqli_query($conexion,"delete from imagenes where id_producto='$fila1[id_producto]'");
			mysqli_query($conexion,"delete from productos where id_producto='$fila1[id_producto]'");
			
			// descargable
			if($fila1["descargable"]==1){
			unlink("../../../descargas/".$fila1['id_producto'].".zip");
			mysqli_query($conexion,"DELETE FROM archivos_zip WHERE id_producto='$fila1[id_producto]'");
			}
			// descargable	
			
			// nuevo
			mysqli_query($conexion,"DELETE FROM comentarios WHERE id_producto='$fila1[id_producto]'");
			// nuevo
			
		}
		
		mysqli_query($conexion,"delete from subcategorias where id_subcategoria='$id_subcategoria'");
		
		/* viejo
		mysqli_query($conexion,"DELETE FROM comentarios WHERE id_categoria='$idcategoria'");
		*/
		
		cerrarconexion();
	
	
	
	}
	
	else {
		
		header('location:../index.html');
		
		
		}



?>