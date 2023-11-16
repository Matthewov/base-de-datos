<?php
require_once("conexion.php");
require'modeloGrafico.php';
$mg= new modeloGrafico($conexion);
$datos=$mg->traerDatosGraficoCake();
echo json_encode($datos);
?>