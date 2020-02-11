<?php 
include('../../php/conexion.php');
$id_categoria=$_POST['id_categoria'];
$registros2=mysqli_query($conexion,"SELECT * FROM subcategorias WHERE id_categoria='$id_categoria' ORDER BY id_subcategoria DESC ");
if(mysqli_num_rows($registros2)>0){
?>

<div class="form-group">
  	<label for="inputEmail3" class="col-sm-2 control-label">SubCategoría</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_subcategoria">
<?php while($fila2=mysqli_fetch_array($registros2)) { ?>
 <option value="<?php echo $fila2['id_subcategoria']; ?>"><?php echo utf8_encode($fila2['nombre']); ?></option>
<?php } ?>
</select>
    </div>
    
</div>

<?php
}
?>