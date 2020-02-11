<?php 
session_start(); 
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

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>


<!-- bootstrap -->


</head>

<body>
<div class="tcat"><strong>ACTUALIZAR SUB CATEGORIAS</strong></div>
<div class="formulario">
<form class="form-horizontal" method="post" action="modificar_subcategorias.php" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">SubCategoria</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="<?php echo $_GET['subcategoriavieja'] ?>" name="subcategorianueva">
      <input type="hidden" name="subcategoriavieja" value="<?php echo $_GET['subcategoriavieja'] ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
  </div>
</form>
</div>
</body>
</html>
<?php 
} 

else{
	
	header('location:../index.html');
	
}
?>