<?php
include("conexion.php");
//obtener partidos politicos
if (isset($_POST['Corporacion'])) {
    $cargo = $_POST['Corporacion'];
    // Continuar con la consulta y la respuesta AJAX
    $query="SELECT nom_partido FROM partido,cargo WHERE partido.id_partido=candidato.id_partido AND candidato.id_cargo='$cargo';";
    //$query = "SELECT partido.nombrePartido from partido, corporacion where corporacion.nombreCorporacion = '$Corporacion' and partido.idCorporacion = corporacion.idCorporacion;";
    $resultado = $conexion->query($query);
} else {
    echo "No se proporcionó el ID del municipio en la solicitud.";
}

while ($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['nom_partido'] . "'>" . $row['nom_partido'] . "</option>";
}

$conexion->close();
/*

*/
?>