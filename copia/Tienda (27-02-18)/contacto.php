<?php
session_start();
include("php/conexion.php");
$form_path='formulario/formoid_files/formoid1/form.php'; require_once $form_path;
$registros1=mysqli_query($conexion,"SELECT * FROM categorias ORDER BY categoria ASC");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Zona de Contacto</title>
<link rel="stylesheet" href="iconos/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/normalizar.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->
    
</head>

<body>
<header>
<div class="cabecera"></div>
<nav>

<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="index.php" style="width:138px;height:37px;line-height:71px;">INICIO</a></li>
	<li class="topmenu"><a href="#" style="width:163px;height:37px;line-height:71px;"><span>PRODUCTOS</span></a>
	<ul>
    <?php
	while ($fila1=mysqli_fetch_array($registros1)){	
		$registros10=mysqli_query($conexion,"select * from subcategorias where id_categoria='$fila1[id]' order by nombre asc");
	?>
		<li><a href="mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a>
        <ul>
        	<?php
			if(mysqli_num_rows($registros10)!=0){
				while ($fila10=mysqli_fetch_array($registros10)){	
			?>
			
			<li><a href="mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>&id_subcategoria=<?php echo $fila10['id_subcategoria']; ?>"><?php echo utf8_encode($fila10['nombre']);?></a></li>
			
            <?php 
				}
			}
			?>
            </ul>
        </li>
    <?php
	}
	?>
	</ul>
    </li>
	<li class="topmenu"><a class="pressed" href="contacto.php" style="width:155px;height:37px;line-height:71px;">CONTACTO</a></li>
	<li class="topmenu"><a href="clientes/form_registro_clientes.php" style="height:37px;line-height:71px;">REGISTRARSE</a>
    </li> 
</ul>
<!-- End css3menu.com BODY section -->

</nav>
    
<?php 
if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){
?>
<div style="max-width:920px; margin:20px auto -50px auto; padding-left:20px">
	
		<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" 	 		text-decoration:none" href="clientes/zona_clientes"><span style="color:  		#F90">Bienvenido/a</span><span style="color:#FFF">
		<?php
			if(isset($_SESSION['nombre_cliente'])) 
			echo $_SESSION['nombre_cliente'];

			if(!isset($_SESSION['nombre_cliente']) && isset($_COOKIE['nombre_cliente'])) 
				echo $_COOKIE['nombre_cliente'];
		?>
		</span></a></p>
	
</div>
<?php
}
cerrarconexion();
?>
  
</header>
<div class="main">
	<div style="margin-top:100px; margin-bottom:30px">
		{{Formoid}}
    </div>
</div>

<footer style="margin-top:-10px" class="wow bounceInDown" data-wow-duration="1.5s">
	<p>Todos los derechos reservados tiendaonline.com</p>
</footer>

</body>
</html>