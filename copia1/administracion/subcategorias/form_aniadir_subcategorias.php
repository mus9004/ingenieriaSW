<?php 
session_start(); 
include('../../php/conexion.php');
?>

<?php if (isset($_SESSION['administrador'])){ ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda Online</title>
<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">

<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="../CSS3 Menu.css3prj_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->

<script>
function eliminar(id){
	if(confirm("Se eliminará la sub categoria con todos los productos, ¿Confirma su eliminación?")){
		
		$.ajax({
			type:"POST",
			url:"eliminar_subcategorias.php",
			data:'id_subcategoria='+id
			
		});
		
		$("#"+id).hide("slow");
		
		}
	
	}
</script>

</head>

<body>

<div class="cabecera2"></div>

<div style=" text-align:center; margin-top:-75px; margin-bottom:10px">
<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="../pedidos/ver_pedidos.php" style="width:157px;height:55px;line-height:55px;"><span style="margin-top:-15px">Pedidos</span></a></li>
	<li class="topmenu"><a href="../productos/mostrarproductos.php" style="width:170px;height:55px;line-height:55px;"><span style="margin-top:-15px">Productos</span></a>
	<ul>
		<li><a href="../productos/formaniadirproductos.php">Añadir Producto </a></li>
	</ul></li>
	<li class="topmenu"><a href="../categorias/formaniadircategorias.php" style="width:180px;height:55px;line-height:55px;"><span style="margin-top:-15px"><span style="margin-top:-15px">Categorias</span></a>
    <ul>
		<li><a class="pressed" href="#">Sub Categorias</a></li>
	</ul>
    </li>
	<li class="topmenu"><a href="../clientes/" style="width:157px;height:55px;line-height:55px;"><span style="margin-top:-15px">Clientes</span></a></li>
	<li class="topmenu"><a href="../chat" style="width:158px;height:55px;line-height:55px;"><span style="margin-top:-15px">Chat</span></a></li>
    <li class="topmenu"><a href="../comentarios/mostrar_comentarios.php" style="width:190px;height:55px;line-height:55px;"><span style="margin-top:-15px">Comentarios</span></a></li>
</ul>
<!-- End css3menu.com BODY section -->
</div>

<?php 

if(isset($_GET['alert'])) { 
$alert=$_GET['alert'];

	switch ($alert){
		
	    case 1:
		
?>

	<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Bien!</strong> La sub categoría <strong><?php echo utf8_encode($_GET['subcategoria']);  ?></strong> se ha añadido correctamente.</p>
    </div>
    
<?php
		break;
	
		case 2:
?>
		
	<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has añadido ninguna sub categoría</p>
    </div>
<?php	
		break;
		
		case 3:
?>

<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">La sub categoría <strong><?php echo utf8_encode($_GET['subcategoria']); ?></strong> ya existe en nuestra base de datos</p>
    </div>

<?php 
	    break;
		
	    case 4:
?>

<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Bien!</strong> La sub categoría <strong><?php echo utf8_encode($_GET['subcategoriavieja']);     ?></strong> se ha actualizado correctamente por <strong><?php echo utf8_encode($_GET['subcategorianueva']); ?></strong> .</p>
    </div>

<?php 
	    break;
	
	    case 5:

?>

	<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has actualizado ninguna sub categoría</p>
    </div>
    
   

<?php 
	    break;
	
	}
	
}

?>
<div class="tcat"><strong>AÑADIR SUB-CATEGORIAS</strong></div>
<div class="formulario">
<form class="form-horizontal" method="post" action="aniadir_subcategorias.php" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">SubCategoria</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Sub Categoria" name="subcategoria">
    </div>
  </div>
  
  <!---- Seleccionamos la categoría a la cual pertenecerá dicha subcategoría a través de su id y ese id lo enviamos a aniadir_subcategorias.php ----->
  <?php
  $registros1=mysqli_query($conexion,"select * from categorias order by id desc");
  ?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Categoría</label>
    <div class="col-sm-10">
    <select onkeyup="validadocategoria()" class="form-control" name="id_categoria">
<?php while($fila1=mysqli_fetch_array($registros1)) { ?>
 <option value="<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']); ?></option>
<?php } ?>
</select>
    </div>
  </div>
  <!---- Seleccionamos la categoría a la cual pertenecerá dicha subcategoría a través de su id y ese id lo enviamos a aniadir_subcategorias.php ----->

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Añadir</button>
    </div>
  </div>
</form>
</div>
<div class="mostrarcat">
<?php
 
$registros2=mysqli_query($conexion,"select * from subcategorias order by id_subcategoria desc");

 
?>
 
<table class="table table-hover">
<?php
while ($fila2=mysqli_fetch_array($registros2)){
	
	// Esto es para seleccionar la categoría a la que pertenece cada subcategoria
	// y que se pueda mostrar el nombre de la categoría al lado de la subcategoría
	// como se ve en la línea 199. 
	$registros3=mysqli_query($conexion,"select categoria from categorias where id='$fila2[id_categoria]'");
	$fila3=mysqli_fetch_array($registros3);
	// Esto es para seleccionar la categoría a la que pertenece cada subcategoria
	// y que se pueda mostrar el nombre de la categoría al lado de la subcategoría
	// como se ve en la línea 199.  
	
?>
	<tr class="active" id="<?php echo $fila2['id_subcategoria']; ?>">
	<td><strong><?php echo '<span style="color:#F90">'.utf8_encode($fila2['nombre']).'</span><span style="color: lightblue">  ( '.utf8_encode($fila3['categoria']).' )</span>';?></strong></td>
    <td></td>
	<td><a href="form_modificar_subcategorias.php?subcategoriavieja=<?php echo utf8_encode($fila2['nombre']); ?>"><button type="button" class="btn btn-success">Editar</button></a></td>
	<td><a onclick="eliminar('<?php echo $fila2['id_subcategoria']; ?>')"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
	</tr>
<?php
}
 ?>
</table>
</div>

<footer><p>Todos los derechos reservados tiendaonline.com</p></footer>

</body>
</html>
<?php 
} 

else{
	
	header('location:../index.html');
	
}
cerrarconexion();
?>

