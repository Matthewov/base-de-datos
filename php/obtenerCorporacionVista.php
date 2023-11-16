<?php
include("conexion.php");
$query = "SELECT cargo.nom_cargo from cargo;";
$resultado = $conexion->query($query);
while ($row = $resultado->fetch_assoc()) {
    echo "<option value='" . $row['nom_cargo'] . "'>" . $row['nom_cargo'] . "</option>";
}
?>