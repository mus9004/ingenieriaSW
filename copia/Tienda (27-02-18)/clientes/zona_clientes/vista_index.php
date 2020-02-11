<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Zona privada</title>

<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="zona_clientes.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../../iconos/css/font-awesome.min.css">
<link rel="stylesheet" href="../../css/hover-min.css">
<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>


<script src="../../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->

<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="../../CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
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
	<li class="topmenu"><a href="../../index.php" style="width:172px;height:71px;line-height:71px;">INICIO</a></li>
	<li class="topmenu"><a href="#" style="width:197px;height:71px;line-height:71px;"><span>PRODUCTOS</span></a>
	<ul>
    <?php
	$registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
	while ($fila1=mysqli_fetch_array($registros1)){	
		$registros10=mysqli_query($conexion,"select * from subcategorias where id_categoria='$fila1[id]' order by nombre asc");
	?>
		<li><a href="../../mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a>
        <ul>
        	<?php
			if(mysqli_num_rows($registros10)!=0){
				while ($fila10=mysqli_fetch_array($registros10)){	
			?>
			
			<li><a href="../../mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>&id_subcategoria=<?php echo $fila10['id_subcategoria']; ?>"><?php echo utf8_encode($fila10['nombre']);?></a></li>
			
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
	<li class="topmenu"><a href="../../contacto.php" style="width:189px;height:71px;line-height:71px;">CONTACTO</a></li> 
</ul>
<!-- End css3menu.com BODY section -->

</nav>

<div style="max-width:900px;margin: 20px auto 0px auto;">
<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" text-decoration:none" href="#"><span style="color:#F90">Bienvenido/a</span><span style="color:#FFF">
<?php
	if(isset($_SESSION['nombre_cliente'])) 
		echo $_SESSION['nombre_cliente'];

	if(!isset($_SESSION['nombre_cliente']) && isset($_COOKIE['nombre_cliente'])) 
		echo $_COOKIE['nombre_cliente'];
?>
</span></a></p>
</div>



</header>

<div class="main">

 <!-- contenido -->
	<div id="botones" style=" max-width:510px;margin: 70px auto 0px auto;">
		<div id="boton" onClick="ver_modificar_datos()" class="hvr-bounce-to-left" style=" width:150px; height:150px; background-color:#F90; margin-right:30px; border-radius:10px; cursor:pointer; text-align:center; padding: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; float:left"><strong>VER / MODIFICAR DATOS</strong>
    		<div style="color:#FFF;font-size:80px; margin-top:-20px"><i class="fa fa-search" aria-hidden="true"></i>
        	</div>
    	</div>
		<div onClick="ver_pedidos()" class="hvr-bounce-to-left" style="width:150px; height:150px; background-color: #6C3; margin-right:30px;border-radius:10px;cursor:pointer; text-align:center; padding: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;float:left"><strong>VER PEDIDOS</strong>
    		<div style="color:#FFF;font-size:80px"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
            </div>
		</div>
        <a style="text-decoration:none; color:#000" href="destruir_cookie_sesion.php">
		<div class="hvr-bounce-to-left" style=" width:150px; height:150px; background-color: #F39;border-radius:10px; cursor:pointer; text-align:center; padding: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; float:left"><strong>DESCONECTAR</strong>
    		<div style="color:#FFF;font-size:80px"><i class="fa fa-power-off" aria-hidden="true"></i>
            </div>
    	</div>
    	</a>
	</div>
	<div style="clear:both"></div> 
<center><img id="carga" style="display:none; margin-top:50px" src="../../imagenes/cargando.gif"> </center>
<div  style="display:none;" id="div_respuesta"></div> 
<div  style="display:none;" id="div_pedidos"></div>   
</div>

<footer><p>Todos los derechos reservados tiendaonline.com</p></footer>

</body>

<script type="text/javascript" src="zona_clientes.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</html>