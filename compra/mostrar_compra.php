<?php
session_start(); 
$repetido="no";
	
if(isset($_POST["precio_producto"])){
	
	$total=$_POST["precio_producto"]*$_POST["cantidad_producto"];
	
	if(isset($_SESSION['total'])){
	
		$_SESSION['total']=$total+$_SESSION['total'];
	
	}
	
	else{
	
		$_SESSION['total']=$total;
	
	}
	
	if(isset($_SESSION['mi_carrito'])){
	
		for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
	
			if($_SESSION['mi_carrito'][$i]["nombre"]==utf8_encode($_POST["nombre_producto"])){
		
				
				$_SESSION['mi_carrito'][$i]["cantidad"]=$_SESSION['mi_carrito'][$i]["cantidad"]+$_POST["cantidad_producto"];
				
				$repetido="si";
			}

		}
	}
	
	if($repetido=="no"){

	$_SESSION["mi_carrito"][]=array("nombre"=>utf8_encode($_POST["nombre_producto"]),"precio"=>$_POST["precio_producto"],"cantidad"=>$_POST["cantidad_producto"],"id_producto"=>$_POST["id_producto"],"descargable"=>$_POST["descargable"]);
	
	}
	
	

}

if(isset($_SESSION['mi_carrito']) && !empty($_SESSION['mi_carrito'])){
?>
    
    <table class="table table-hover">
    	<tr class="danger">
        	<td style="text-decoration: underline; font-weight:bold">
            	Nombre
            </td>
            <td style="text-decoration: underline; font-weight:bold">
            	Precio
            </td>
            <td style="text-decoration: underline; font-weight:bold">
            	Cantidad
            </td>
        </tr>
<?php
		
	for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
		
?>
		
        <tr class="success" id="<?php echo $i; ?>">
		 <td><?php echo utf8_decode($_SESSION["mi_carrito"][$i]["nombre"]); ?>
         </td>
         <td><?php echo $_SESSION["mi_carrito"][$i]["precio"]; ?>
         </td>
         <td><?php echo $_SESSION["mi_carrito"][$i]["cantidad"]; ?>
         </td>
         <td>
         <a onclick="eliminar_producto(<?php echo $i; ?>)"><img width='25px' src='compra/cerrar.png'></a>
         </td>
         <td id="<?php echo "n".$i; ?>" style="display:none">
         <img width='25px' src='compra/cargando.gif'>
         </td> 
        </tr> 
        
<?php		
	}
	if(isset($_SESSION["envio"])){
?>
		<tr class="success"><td>Envío</td><td>2.48</td><td>1</td></tr>
<?php
	}
	if(isset($_SESSION["pago"])){
?>
		<tr class="success"><td>Forma de Pago: <?php echo $_SESSION["pago"]; ?></td><td>0</td><td>1</td></tr>
        
<?php
	}
?>
     </table>
<?php

	echo "".$_SESSION['total']." Euros (Sin IVA)</br>";
	echo "--------------------------------------------</br>";
	echo "+ 21% de IVA</br>";
	echo "--------------------------------------------</br>";
	$_SESSION['total_iva']=(($_SESSION['total']*21)/100)+$_SESSION['total'];
	$_SESSION['total_iva']=round($_SESSION['total_iva'] * 100)/100;
	echo "Total: ".$_SESSION['total_iva']." Euros";
?>
	<div style="margin-top:10px; margin-bottom:10px">
    <a href="compra/proceso_compra/proceso_compra.php">
    <button type="button" class="btn btn-warning">Finalizar</button>
    </a>
    </div>
<?php
}

else echo "Carrito vacio";


?>
