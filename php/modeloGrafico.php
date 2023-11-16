<?php

class ModeloGrafico {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function traerDatosGraficoCake() {
        $query = "SELECT candidato.numero_votos, candidato.nom_candidato 
                  FROM cargo, candidato 
                  WHERE cargo.nom_cargo='alcalde' 
                  AND candidato.id_cargo=cargo.id_cargo
                  AND candidato.lugar='riosucio';";
        
        $arreglo = array();

        try {
            $consulta = $this->conexion->query($query);

            if ($consulta) {
                while ($fila = $consulta->fetch_assoc()) {
                    $arreglo[] = $fila;
                }

                return $arreglo;
            } else {
                throw new Exception("Error en la consulta: " . $this->conexion->error);
            }
        } catch (Exception $e) {
            // Manejo de errores: puedes registrar el error o devolver un valor específico según tus necesidades.
            error_log("Error en traerDatosGraficoCake: " . $e->getMessage());
            return false;
        }
    }
}

?>
