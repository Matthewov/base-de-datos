<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $votosCandidato = $_POST['votosCandidato'];

    // Itera a través de los votos por candidato y guárdalos en la base de datos
    foreach ($votosCandidato as $idCandidato => $votos) {
        $idCandidato = (int) $idCandidato; // Asegúrate de que $idCandidato sea un entero
        $votos = (int) $votos; // Asegúrate de que $votos sea un entero

        // Obtén los votos actuales de la base de datos
        $querySelect = "SELECT numero_votos FROM candidato WHERE id_candidato = '$idCandidato'";
        $resultadoSelect = $conexion->query($querySelect);

        if ($resultadoSelect->num_rows > 0) {
            $fila = $resultadoSelect->fetch_assoc();
            $votosActuales = (int) $fila['numero_votos'];

            // Suma los nuevos votos a los votos actuales
            $votosTotales = $votosActuales + $votos;

            // Actualiza el campo de votos en la base de datos
            $queryUpdate = "UPDATE candidato SET numero_votos = '$votosTotales' WHERE id_candidato = '$idCandidato'";
            $resultadoUpdate = $conexion->query($queryUpdate);

            if ($resultadoUpdate) {
                echo "Votos guardados correctamente.";
            } else {
                echo "Error al guardar los votos: " . $conexion->error;
            }
        } else {
            echo "No se encontraron votos actuales para el candidato con ID: $idCandidato";
        }
    }
} else {
    echo "Acceso no autorizado.";
}
?>


