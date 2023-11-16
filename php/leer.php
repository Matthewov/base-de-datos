<?php
//leer un archivo de excel y subirlo a la base de datos a la tabla candidato
//conexion a la base de datos
include("conexion.php");
// verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
//libreria IOFactory importada de PHPExcel
//leer el archivo de excel
//ruta del archivo
$ruta = "../archivos/candidatos.xlsx";
//cargar el archivo
require_once '../lib/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load($ruta);
//obtener hoja de trabajo activa
$objPHPExcel->setActiveSheetIndex(0);
//obtener numero de filas del archivo
$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
//obtener solo la segunda columna de la hoja de trabajo
$columna = $objPHPExcel->getActiveSheet()->rangeToArray('B2:B'.$numRows);
//recorrer el arreglo y mostrar su contenido
foreach ($columna as $key => $value) {
    //echo $value[0]."<br>";
    //insertar los datos en la tabla candidato
    $query = "INSERT INTO candidato (nombreCandidato) VALUES ('$value[0]')";
    $resultado = $conexion->query($query);
}


//cerrar la conexion
$conexion->close();



?>