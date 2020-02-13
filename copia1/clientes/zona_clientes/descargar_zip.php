<?php
session_start();
if(!isset($_GET["id_producto"]) || !isset($_SESSION["id_cliente"]))
	header('location:../../index.php');
include('../../php/conexion.php');

if($_GET["id_cliente"]==$_SESSION["id_cliente"]){
	
	$id_producto=mysqli_real_escape_string($conexion,$_GET['id_producto']);
	$id_cliente=mysqli_real_escape_string($conexion,$_GET['id_cliente']);
	$pedido=mysqli_real_escape_string($conexion,$_GET['pedido']);

	$registro=mysqli_query($conexion,"SELECT id_producto FROM pedidos WHERE id_producto='$id_producto' AND id_cliente='$_SESSION[id_cliente]' AND pedido='$pedido' AND descargable='2'");
	
	if(mysqli_num_rows($registro)==1){
		
		$fila=mysqli_fetch_array($registro);
		$filename = "../../../descargas/".$fila["id_producto"].".zip";
		header('Content-Type: application/zip');
		header('Content-Type: application/octet-stream');
		header('Content-type: application/x-zip-compressed');
		header('Content-Transfer-Encoding: Binary');
		//El nombre predeterminado que verá el cliente
		header('Content-disposition: attachment; filename="' . basename($filename) . '"');
		readfile($filename);
	}
		
}
	
/*
$filename = "../../../descargas/".$fila["nombre"];
header('Content-Type: application/zip');
header("Content-type: application/x-zip-compressed;");
header('Content-Transfer-Encoding: Binary');
//El nombre predeterminado que verá el cliente
header('Content-disposition: attachment; filename="' . basename($filename) . '"');
readfile($filename);
*/
cerrarconexion();
?>