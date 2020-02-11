<?php
 session_start();
 //if(isset($_SESSION['nombre'])) echo $_SESSION['nombre'];
 include('php/conexion.php');
 $registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
 $registros2=mysqli_query($conexion,"select id_producto, precio,id_categoria,id_subcategoria,cantidad from productos where inicio=1 AND cantidad!=-2 limit 0,12");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda Online</title>
<link rel="stylesheet" href="iconos/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/normalizar.css">
<link rel="stylesheet" href="css/hover-min.css">
<link rel="stylesheet" href="css/animate.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="javascript/bootstrap.min.js"></script>
<!-- bootstrap -->

<script src="css/wow.min.js"></script>
<script>new WOW().init()</script>

<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->
    
<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<!-- End WOWSlider.com HEAD section -->
    
</head>
<body>
<div class="logo" style=" position:absolute;margin-top:5px;left:10px;width:250px; height:150px"><img src="imagenes/logotipo.png" width="100%"></div>
<header>
<?php
if(isset($_GET['alert']) && $_GET['alert']=="validado") {
?>
<div style="text-align:center; margin-bottom:1px" class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Se ha completado su registro correctamente. Inicie sesión para poder comprar.</strong></p>
    </div>
<?php  
}
if(isset($_GET['compra_realizada'])) {
?>
	<div style="text-align:center; margin-bottom:1px" class="alert alert-success alert-dismissible" role="alert">
 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    	<p style="color: #666; font-weight:bold" class="centrar">Compra realizada con éxito<br>Para más detalles métase en su zona privada y revise sus pedidos. Gracias :).</p>
    </div>
<?php
}
// paypal
if(isset($_GET['compra_cancelada'])) {
?>
	<div style="text-align:center; margin-bottom:1px" class="alert alert-danger alert-dismissible" role="alert">
 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    	<p style="color: #666; font-weight:bold" class="centrar">Compra cancelada</p>
    </div>
<?php
}
// paypal
?>

<div class="cabecera"></div>
<nav class="wow bounceInDown" data-wow-duration="1.5s">

<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a class="pressed" href="#" style="width:172px;height:71px;line-height:71px;">INICIO</a></li>
	<li class="topmenu"><a href="#" style="width:197px;height:71px;line-height:71px;"><span>PRODUCTOS</span></a>
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
	<li class="topmenu"><a href="contacto.php" style="width:189px;height:71px;line-height:71px;">CONTACTO</a></li>
	<li class="topmenu"><a href="#" style="height:71px;line-height:71px;"><img src="CSS3 Menu_files/css3menu1/register.png" alt=""/>REGISTRO / ACCESO</a>
    	<ul>
			<li><a href="#" onclick="mostrar_ventana_modal()">INICIAR SESIÓN</a></li>
			<li><a href="clientes/form_registro_clientes.php">REGISTRARSE</a></li>
		</ul>
    </li> 
</ul>
<!-- End css3menu.com BODY section -->

</nav>
<div style="max-width:920px; margin:20px auto 0px auto; padding-left:20px">


<div  style="float:right; margin-bottom:20px">
<form class="form1" action="buscador.php" method="post">
<fieldset class="fieldset1">
<input class="input1" type="search" name="buscar" placeholder="Buscar..."/>
<button class="button1" type="submit">
<i class="fa fa-search" aria-hidden="true"></i>
</button>
</fieldset>
</form>
</div>
<?php 

if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){

?>
<div style="margin-bottom:-4px">
<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" text-decoration:none" href="clientes/zona_clientes"><span style="color:#F90">Bienvenido/a</span><span style="color:#FFF">
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
?>
</div>
<div class="slider wow bounceInUp" data-wow-duration="1.5s">
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<li><img src="data1/images/lasmejoresofertas.jpg" alt="las-mejores-ofertas" title="las-mejores-ofertas" id="wows1_0"/></li>
		<li><img src="data1/images/transporte.jpg" alt="transporte" title="transporte" id="wows1_1"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="las-mejores-ofertas"><span><img src="data1/tooltips/lasmejoresofertas.jpg" alt="las-mejores-ofertas"/>1</span></a>
		<a href="#" title="transporte"><span><img src="data1/tooltips/transporte.jpg" alt="transporte"/>2</span></a>
	</div></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
</div>
</header>
<div class="main">
<?php
while($fila2=mysqli_fetch_array($registros2)){
	$registros3=mysqli_query($conexion,"select nombre from imagenes where id_producto='$fila2[id_producto]' and prioridad=1");
		$fila3=mysqli_fetch_array($registros3);
?>
<a href="detalleproducto.php?id_categoria=<?php echo $fila2['id_categoria']; ?><?php if($fila2['id_subcategoria']!=-1) {?>&id_subcategoria=<?php echo $fila2['id_subcategoria']; ?><?php } ?>&id_producto=<?php echo $fila2['id_producto']; ?>"><div id="i" class="productosmain hvr-buzz-out"><img src="administracion/productos/imagenes/<?php if(mysqli_num_rows($registros3)>0)echo $fila3['nombre']; else echo "no-disponible.jpg"; ?>" width="100%" alt="portatil1"><div class="precio"><?php echo $fila2['precio']." Euros"; ?></div></div></a>
<?php
}
cerrarconexion();
?>
<div class="limpiar"></div>
</div>
<footer class="wow bounceInDown" data-wow-duration="1.5s"><p>Todos los derechos reservados tiendaonline.com</p></footer>

<!-- ventana modal -->
<div style="margin-top:100px" class="modal fade" id="mostrar_ventana_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" id="i" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h4>
      </div>
      <div class="modal-body">
        <form name="form_inicio_sesion">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Password:</label>
            <input type="password" name="password" class="form-control" id="recipient-name">
          </div>
          
          
           <div class="checkbox">
    			<label>
      			<input type="checkbox" id="checkbox_recordar"> Recordar usuario.
    			</label>
 			</div>
          
          
        </form>
      </div>
      
     <!-- imagen de carga -->
      <center><div style="display:none;" id="carga"><img src="imagenes/cargando.gif"/></div></center>
      
      
      <div style="padding-left:10px; font-size:12px">
      	<a href="#" onclick="link_password()">He olvidado mi contraseña</a>
      </div>
      
      <div style="padding:13px; display:none" id="link_password">
      	<form name="form_olvido_password">
      		<div class="form-group">
            	<label for="recipient-name" class="control-label">Email:</label>
            	<input type="text" name="email" class="form-control" id="recipient-name">
          	</div>
      	</form>
        <button type="button" onclick="recuperar_password()" class="btn btn-success">Recuperar Contraseña</button>
      </div>
      
      <div class="modal-footer">
      
      <!-- aler contraseña no correcta -->
      
      <div style="display:none" id="alertlogin" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <center>Email o password incorrecto</center>
    </div>

    
        <button type="button" onclick="validar_sesion()" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

<!--carrito-->
<div id="b"  class="carrito">
	<div  style=" width:50px; height:120px; float:left; padding:4px; background-color:#333; border-radius:10px 0px 0px 10px; margin-left:-50px; cursor: pointer">
    		
    		<i style=" margin-top:33px; margin-left:200px; color:#f33; font-size:35px" class="fa fa-shopping-basket" aria-hidden="true"></i>  
      			
    </div>
    
    <!--numerito-->
    <?php 
	
	if(isset($_SESSION['cantidad_de_productos'])){
	
	?>
    
    <div id="cantidad_de_productos" style="position:absolute; width:30px; height:30px; background-color: #FFF; border-radius:100%; margin-top:81px; margin-left:-41px; border: solid 2px #FF3366; text-align:center; color: #F00; font-weight:bold; padding:2.5px; font-size:14px;"><?php echo $_SESSION['cantidad_de_productos']; ?></div>

    
    <?php
	
	}
	
	?>
    <!--numerito-->
    
    <div style="height:200px; padding:4px; overflow:auto" id="mostrar_compra">
        
    </div>
</div>
<!--carrito-->

<script type="text/javascript" src="clientes/inicio_de_sesion/inicio_de_sesion.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="compra/compra.js"></script>
</body>
</html>
