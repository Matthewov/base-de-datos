<?php
include("conexion.php");
//obtener e14 por mesa
if (isset($_POST['idMesaVotacion'])) {
    $idMesaVotacion = $_POST['idMesaVotacion'];
    // Continuar con la consulta y la respuesta AJAX
    $query = "SELECT cargo.nom_cargo from e14_mesa, e_14, cargo where e14_mesa.id_mesavotacion = $idMesaVotacion and e14_mesa.id_e14 = e_14.id_e14 and e14.id_cargo = cargo.id_cargo;";
    echo '<label>' . $idMesaVotacion . '</label><br>';;
    
    $resultado = $conexion->query($query);
} else {
    echo "No se proporcionó el ID del municipio en la solicitud.";
}
while ($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['nom_cargo'] . "'>" . $row['nom_cargo'] . "</option>";
}





/*
if (isset($_POST['idMesaVotacion'])) {
    $idMesaVotacion = $_POST['idMesaVotacion'];
    // Continuar con la consulta y la respuesta AJAX
    $query = "SELECT idE14 FROM e14pormesas ";
    $resultado = $conexion->query($query);
} else {
    echo "No se proporcionó el ID del municipio en la solicitud.";
}
while ($row = $resultado->fetch_assoc()) {
    
    echo '<label>' . $row['idE14'] . '</label><br>';
}
*/
?>
