<?php 
session_start();

	if(isset($_SESSION['administrador'])){
	
	
		$idcategoria=$_POST['idcategoria'];
		include('../../php/conexion.php');
		
		// descargable
		$registros1=mysqli_query($conexion,"select id_producto,descargable from productos where id_categoria='$idcategoria'");
		// descargable
		
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
			
		
		}
		mysqli_query($conexion,"delete from categorias where id='$idcategoria'");
		mysqli_query($conexion,"DELETE FROM comentarios WHERE id_categoria='$idcategoria'");
		
		// eliminar subcategorías
		mysqli_query($conexion,"delete from subcategorias where id_categoria='$idcategoria'");
		// eliminar subcategorías
		
		cerrarconexion();
	
	
	
	}
	
	else {
		
		header('location:../index.html');
		
		
		}



?>