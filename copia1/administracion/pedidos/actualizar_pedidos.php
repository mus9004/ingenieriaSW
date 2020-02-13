<?php 
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include("../../php/conexion.php");
$registro=mysqli_query($conexion,"SELECT MAX(pedido) AS max_pedido FROM pedidos2");
$fila=mysqli_fetch_array($registro);
$max_pedido=$fila["max_pedido"];
$tamano_pagina=$_POST["tamano_pagina"];
$pagina=$_POST["pagina"];

$max_pedido_pagina=$max_pedido-($tamano_pagina *($pagina-1));

for($i=0;$i<$tamano_pagina;$i++){
	
		if(isset($_POST["$max_pedido_pagina"])){ 
		
			// descargable
			if($_POST["select"]==2){
				mysqli_query($conexion,"UPDATE pedidos SET descargable='2' WHERE pedido=$max_pedido_pagina AND descargable='1'");
			}else{
				mysqli_query($conexion,"UPDATE pedidos SET descargable='1' WHERE pedido=$max_pedido_pagina AND descargable='2'");
			}
			// descargable
				
			mysqli_query($conexion,"UPDATE pedidos2 SET estado='$_POST[select]' WHERE pedido=$max_pedido_pagina");
			
		}
		
		$max_pedido_pagina=$max_pedido_pagina-1;

	
}

header("location:ver_pedidos.php?pagina=$pagina");
cerrarconexion();
?>