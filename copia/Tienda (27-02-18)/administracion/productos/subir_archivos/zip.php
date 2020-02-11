<?php 
include('../../../php/conexion.php');
$id_producto=$_POST["id_producto"].".zip";
$fileName=$id_producto;
//$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$permitidos= array("application/zip","application/x-zip-compressed","application/octet-stream");
$limite_MB=1000;
$codigo_error=$_FILES["file1"]["error"];
		
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Seleccione un archivo.";
    exit();
}

//if(in_array($fileType,$permitidos) && $fileSize <= $limite_MB *1024*1024*1024){
if(in_array($fileType,$permitidos) && $fileSize <= $limite_MB *1024*1024*1024){
		
	if(move_uploaded_file($fileTmpLoc, "../../../../descargas/$fileName")){
		
    	echo "$fileName Subida completada ";
		$sql1="SELECT id_producto FROM archivos_zip WHERE id_producto='$id_producto'";
		$registro=mysqli_query($conexion,$sql1);
		
		if(mysqli_num_rows($registro)==0){
			
			$sql2="INSERT INTO archivos_zip (nombre,id_producto) value ('$fileName','$_POST[id_producto]')";
			mysqli_query($conexion,$sql2);
			
		}
		
		
		
	}else {
    	echo "Error al subir el archivo";
	}
		
	
}else{
	
	echo "Debe seleccionar un archivo tipo zip y de un tamaño no superior a 1GB";
	
}

cerrarconexion();
?>