<?php
session_start();
if(!isset($_GET["id_producto"]) || !isset($_SESSION["administrador"]))
	header('location:../index.html');
include('../../php/conexion.php');
$registro=mysqli_query($conexion,"SELECT nombre FROM archivos_zip WHERE id_producto='$_GET[id_producto]'") or die ("Error al conectar con la tabla".mysqli_error($conexion));
cerrarconexion();
$fila=mysqli_fetch_array($registro);
$filename = "../../../descargas/".$fila["nombre"];
header('Content-Type: application/zip');
header('Content-Type: application/octet-stream');
header('Content-type: application/x-zip-compressed');
header('Content-Transfer-Encoding: Binary');
//El nombre predeterminado que verá el cliente
header('Content-disposition: attachment; filename="' . basename($filename) . '"');
readfile($filename);
?>