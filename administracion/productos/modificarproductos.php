<?php 
session_start();
if(isset($_SESSION['administrador']) && isset($_POST['actualizar'])){
	include('../../php/conexion.php');
	$id_producto=$_POST['id_producto'];
	$precio_nuevo=$_POST['precionuevo'];
	$descripcion_nueva=utf8_decode($_POST['descripcionnueva']);
	// stock
	$cantidad=$_POST["cantidad"];
	$cantidad_inicial=$_POST["cantidad_inicial"];
	// stock
	mysqli_query($conexion,"update productos set precio='$precio_nuevo', descripcion='$descripcion_nueva', cantidad='$cantidad' where id_producto='$id_producto'");
	
	// Enviar mail a usuarios por reposicion de stock
	if($cantidad_inicial==0){
	
		$sql="SELECT correo FROM aviso_stock WHERE id_producto='$id_producto'";
		$registros=mysqli_query($conexion,$sql);
		
		if(mysqli_num_rows($registros)!=0){
			
			$sql2="SELECT nombre,id_categoria FROM productos WHERE id_producto='$id_producto'";
			$registro=mysqli_query($conexion,$sql2);
			$fila2=mysqli_fetch_array($registro);
			$id_categoria=$fila2["id_categoria"];
			$nombre_producto=utf8_encode($fila2["nombre"]);
			
			while ($fila=mysqli_fetch_array($registros)){
			
					$para =$fila["correo"];	
    				$titulo = 'Producto repuesto '.$nombre_producto;
     
    				$mensaje = '<html>'.
    				'<body>'.
    				'<hr>'.
    				'El producto '.$nombre_producto.' ha sido repuesto: '.
    				'<br>'.
    				'<a href="http://www.hostindepruebas.com/Tienda/detalleproducto.php?id_categoria='.$id_categoria.'&id_producto='.$id_producto.'">Comprar Producto</a>'.
    				'</body>'.
    				'</html>';
		
    				$cabeceras = 'MIME-Version: 1.0' . "\r\n";
    				$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$cabeceras .= 'From: www.hostindepruebas.com';
	
    				$enviado = mail($para, $titulo, $mensaje, $cabeceras);
			
			}
			
			$sql2="DELETE FROM aviso_stock WHERE id_producto='$id_producto'";
			mysqli_query($conexion,$sql2);
			
		}
	
	}
	// Enviar mail a usuarios por reposicion de stock
	header('location:mostrarproductos.php?alert&pagina='.$_POST["pagina"]);
	
}

else{
	
	header('location:../index.html');
	
}

?>