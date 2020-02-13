<?php 
session_start();
sleep(2);

$restar=$_SESSION["mi_carrito"][$_GET["indice"]]["precio"]*$_SESSION["mi_carrito"][$_GET["indice"]]["cantidad"];

$_SESSION['cantidad_de_productos']=($_SESSION['cantidad_de_productos'])-($_SESSION["mi_carrito"][$_GET["indice"]]["cantidad"]);

$_SESSION['total']=$_SESSION['total']-$restar;
//unset($_SESSION["mi_carrito"][$_GET["indice"]]);
array_splice($_SESSION["mi_carrito"], $_GET["indice"], 1);
?>