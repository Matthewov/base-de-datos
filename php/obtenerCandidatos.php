<?php
include("conexion.php");
//comprobar conexion
if (isset($_POST['Corporacion']) && isset($_POST['lugar'])) {
    $Corporacion = $_POST['Corporacion'];
    $lugar = $_POST['lugar'];

    // Ahora puedes usar $Corporacion y $lugar según sea necesario en tu lógica de PHP
    // ...
    echo '<label>' . $Corporacion . '</label><br>';
    echo '<label>' . $lugar . '</label><br>';

    if ($Corporacion!="GOBERNADOR" ) {
        # code...
        if ($lugar==1) {
            $lugar="riosucio";
            # code...
        }

        $query = "SELECT candidato.id_candidato, candidato.nom_candidato FROM cargo, candidato WHERE cargo.nom_cargo='$Corporacion' AND candidato.id_cargo=cargo.id_cargo AND candidato.lugar='$lugar';";
        $resultado = $conexion->query($query);
        // Verifica que se encontraron candidatos
        if ($resultado->num_rows > 0) {
            echo '<form id="formularioVotos" name="formularioVotos" action="guardar_votos.php" method="POST">';
            
            while ($row = $resultado->fetch_assoc()) {
                $idCandidato = $row['id_candidato'];
                $nombreCandidato = $row['nom_candidato'];
                
                echo '<label>' . $nombreCandidato . '</label>';
                echo '<input type="number" value="0" class="votosCandidato" name="votosCandidato['.$idCandidato.']" placeholder="Ingrese votos para '.$nombreCandidato.'" required><br>';
            }
            
            echo '<button type="submit">Guardar Votos</button>';
            echo '</form>';
        } else {
            echo "No se encontraron candidatos para la corporación seleccionada.";
        }

    } else {
    echo "No se proporcionó el nombre de la corporación en la solicitud.";
    }

    
    
}


/*
if (isset($_POST['Corporacion'])) {
    $Corporacion = $_POST['Corporacion'];
    
    // Continuar con la consulta y la respuesta AJAX
    $query = "SELECT candidato.idCandidato, candidato.nombre FROM corporacion, candidato WHERE corporacion.nombreCorporacion='$Corporacion' AND candidato.idcorporacion=corporacion.idCorporacion;";
    
    $resultado = $conexion->query($query);
    
    // Verifica que se encontraron candidatos
    if ($resultado->num_rows > 0) {
        echo '<form id="formularioVotos" name="formularioVotos" action="guardar_votos.php" method="POST">';
        
        while ($row = $resultado->fetch_assoc()) {
            $idCandidato = $row['idCandidato'];
            $nombreCandidato = $row['nombre'];
            
            echo '<label>' . $nombreCandidato . '</label>';
            echo '<input type="number" class="votosCandidato" name="votosCandidato['.$idCandidato.']" placeholder="Ingrese votos para '.$nombreCandidato.'" required><br>';
        }
        
        echo '<button type="submit">Guardar Votos</button>';
        echo '</form>';
    } else {
        echo "No se encontraron candidatos para la corporación seleccionada.";
    }
} else {
    echo "No se proporcionó el nombre de la corporación en la solicitud.";
}


*/ 

// OBTENER candidatos por corporación

?>