<?php
require("../php/conexion.php");
$query = "SELECT idMunicipio,nombreMunicipio FROM municipio";
$resultado = $conexion->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script>
        $(document).ready(function(){
            $("#comboMunicipio").change(function(){
                var idMunicipio = $("#comboMunicipio").val();
                //mostrar la eleccion del usuario
                //alert(idMunicipio);
                //enviar la peticion ajax
                $.ajax({
                    url: "../php/obtenerPuestosdeVotacion.php",
                    method: "POST",
                    data: {idMunicipio:idMunicipio},
                    success: function(resultado){
                        //alert(resultado);
                        $("#comboPuesto").html(resultado);
                    }
                });

            });
        });
  </script>
  <script>
        $(document).ready(function(){
            $("#comboPuesto").change(function(){
                var idCentroVotacion = $("#comboPuesto").val();
                //mostrar la eleccion del usuario
                //alert(idMunicipio);
                //enviar la peticion ajax
                $.ajax({
                    url: "../php/obtenermesasVotacion.php",
                    method: "POST",
                    data: {idCentroVotacion:idCentroVotacion},
                    success: function(resultado){
                        //alert(resultado);
                        $("#combomesa").html(resultado);
                    }
                });

            });
        });
  </script>
  <script>
    $(document).ready(function(){
        $("#combomesa").change(function(){
            var idMesaVotacion=$("#combomesa").val();
            $.ajax({
                    url: "../php/obtenerCorporacion.php",
                    method: "POST",
                    data: {idMesaVotacion:idMesaVotacion},
                    success: function(resultado){
                        //alert(resultado);
                        $("#combocorporacion").html(resultado);
                    }
                });
        })
    })
  </script>
  <script>
    $(document).ready(function(){
        $("#combocorporacion").change(function(){
            var Corporacion=$("#combocorporacion").val();
            var lugar=$("#comboMunicipio").val();
            $.ajax({
                    url: "../php/obtenerCandidatos.php",
                    method: "POST",
                    data: {Corporacion: Corporacion, lugar: lugar },

                    success: function(resultado){
                        //alert(resultado);
                        $("#mostrar").html(resultado);
                    }
                });
        })
    })
  </script>

</head>
<body>
    <form id="combo" name="combo" action="../php/guardarVotos.php" method="POST" >
        <div>SELECIONA MUNICIPIO<select id="comboMunicipio" name="comboMunicipio">
            <option value="0">Seleccione</option>
            <?php while($row = $resultado->fetch_assoc()) { ?>
            <option value="<?php echo $row['idMunicipio']; ?>"><?php echo $row['nombreMunicipio']; ?></option>
            <?php } ?>


        </select></div>
        
        <div>SELECIONA PUESTO<select id="comboPuesto" name="comboPuesto">
            <option value="0">Seleccione</option>

        </select></div>
        <div>SELECIONA MESA VOTACION<select name="combomesa" id="combomesa">
            <option value="0">Seleccione</option>
        </select></div>

        <div>SELECCIONE CORPORACION <select name="combocorporacion" id="combocorporacion">
            <option value="0">Seleccione</option>
            
        </select></div>
        

        
        <div id="mostrar">
            <input type="hidden" name="seleccionlugar" id="seleccionlugar" value="">
        </div>
        
        
         
    </form>
    
</body>
</html>