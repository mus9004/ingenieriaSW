<?php
session_start();
if(isset($_SESSION['id_cliente']) || isset($_COOKIE['nombre_cliente'])) header('location:zona_clientes/index.php');
 include('../php/conexion.php');
 $registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
<link rel="stylesheet" href="../css/normalizar.css">
<link rel="stylesheet" href="clientes.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<!-- bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->


<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="../CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
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
	<li class="topmenu"><a href="../index.php" class="btn btn-primary my-2">INICIO</a></li>
	<li class="topmenu"><a href="#" class="btn btn-primary my-2"><span>PRODUCTOS</span></a>
	<ul>
    <?php
	while ($fila1=mysqli_fetch_array($registros1)){	
		$registros10=mysqli_query($conexion,"select * from subcategorias where id_categoria='$fila1[id]' order by nombre asc");
	?>
		<li><a href="../mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a>
        <ul>
        	<?php
			if(mysqli_num_rows($registros10)!=0){
				while ($fila10=mysqli_fetch_array($registros10)){	
			?>
			
			<li><a href="../mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>&id_subcategoria=<?php echo $fila10['id_subcategoria']; ?>"><?php echo utf8_encode($fila10['nombre']);?></a></li>
			
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
	<li class="topmenu"><a href="../contacto.php" class="btn btn-primary my-2">CONTACTO</a></li>
	<li class="topmenu"><a class="pressed" href="form_registro_clientes.php" class="btn btn-primary my-2">REGISTRARSE</a>
    </li> 
</ul>
<!-- End css3menu.com BODY section -->
</nav>
</header>

<!-- alert enlace caducado-->
<?php
	if(isset($_GET['alert']) && $_GET['alert']=="enlacecaducado"){
?>
  <div style="text-align:center; margin:42px 0px -30px 0px" class="alert alert-danger alert-dismissible" id="emailrepetido" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>El tiempo para validar su correo ha caducado, por favor, vuelva a registrarse.</strong></p>
    </div>
<?php
	}
cerrarconexion();
?>

<!-- alert debe estar registrado para poder comprar-->
<div style="margin-top:30px">
	<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Debe estar registrado</strong> para poder comprar. Gracias.</p>
    </div>
</div>



<div class="main">

<form name="formregistro" action="registro_clientes.php" method="post">
  <div class="form-group">
    <label>Nombre*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadonombre()" type="tex" name="nombre" class="form-control" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label>Apellidos*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadoapellidos()" type="tex" name="apellidos" class="form-control"  placeholder="Apellidos">
  </div>
  <div class="form-group">
    <label>Email*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadoemail()" type="email" name="email" class="form-control"  placeholder="Email">
  </div>

<!-- alert email -->
  <div class="alert alert-danger alert-dismissible ocultar" id="avisomail" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Email no valido.</p>
    </div>

  </br>
  <div class="form-inline">
   <div class="form-group">
    <label>Dirección*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadodireccion()" type="text" name="direccion" class="form-control"  placeholder="Dirección completa">
  </div>
  <div class="form-group">
    <label>C. P.*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadocp()" type="text" name="cp" class="form-control" >
  </div>
  	<label>Provincia*</label>
  <select onChange="validadocampos()" onClick="validadoprovincia()" class="form-control" name="provincia">
  <option value=""></option>
  <option value="Toledo">Toledo</option>
  <option value="Madrid">Madrid</option>
  <option value="Barcelona">Barcelona</option>
  <option value="Lugo">Lugo</option>
  <option value="Sevilla">Sevilla</option>
  <option value="Valencia">Valencia</option>
  </select>
 </div>
  </br>
  
  <div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
  </div>
  <div class="form-group">
    <label>Contraseña*</label>
    <input onKeyPress="validadocampos()" onBlur="validadopassword1()" type="password" name="password1" class="form-control" placeholder="Contraseña">
  </div>
  <div class="form-group">
  
<!-- alert contraseñas no coinciden -->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisopassword2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Las contraseña no puede tener espacios en blanco y debe tener como mínimo 8 caracteres y un número</p>
    </div>
  
    <label>Repetir Contraseña*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadopassword2()" type="password" name="password2" class="form-control" placeholder="Contraseña">
  </div>
  
<!-- alert contraseñas no coinciden -->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisopassword" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Las contraseñas no coinciden</p>
    </div>

  <div class="checkbox">
    <label>
      <input onClick="validadoprivacidad()" type="checkbox" id="acepto" name="aceptar"> Acepto la política de privacidad.<a href="#">Leer</a>
    </label>
  </div>
  
<!-- alert campos vacios -->
  <div class="alert alert-danger alert-dismissible ocultar" id="avisocampos" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Debe rellenar todos los campos con * obligatoriamente</p>
    </div>
    
<!-- alert política de privacidad -->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisoprivacidad" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Debe aceptar nuestra política de privacidad</p>
    </div>
 <!-- carga-->
<div class="ocultar" id="carga"><img src="../imagenes/cargando.gif"/></div>

<!-- aler exito-->
<div class="alert alert-success alert-dismissible ocultar" id="exito" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Gracias por registrarse.</strong>Para completar el registro haga click en el enlace que le hemos enviado a su correo electrónico, de lo contrario pasadas 24 horas se procederá a eliminar su solicitud.</p>
    </div>
    
<!-- email repetido-->

  <div class="alert alert-danger alert-dismissible ocultar" id="emailrepetido" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Este email ya se encuentra en nuestra base de datos.</strong></p>
    </div>
    


  <button type="button" onClick="validarformulario()" class="btn btn-default">Enviar</button>
</form>

</div>
<footer><p>Todos los derechos reservados tiendaonline.com</p></footer>
</body>
<script type="text/javascript" src="registro_clientes.js"></script>
</html>