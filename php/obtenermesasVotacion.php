<?php
//conexion a la base de datos
include("conexion.php");
// verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
//obtener puestos de votacion
if (isset($_POST['idCentroVotacion'])) {
    $idlocalidad = $_POST['idCentroVotacion'];
    // Continuar con la consulta y la respuesta AJAX
    $query = "SELECT id_mesavotacion,num_messa FROM mesa_votacion WHERE id_localidad = '$idlocalidad'";
    $resultado = $conexion->query($query);
} else {
    echo "No se proporcionó el ID del municipio en la solicitud.";
}
while ($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['id_mesavotacion'] . "'>" . $row['num_messa'] . "</option>";
}
//onterner mesas de votacion
    

$conexion->close();

?>