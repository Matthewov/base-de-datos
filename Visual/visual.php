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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Document</title>

    
    <script>
    $(document).ready(function(){
        $("#comboMunicipio").change(function(){
            var idMesaVotacion=$("#combomesa").val();
            $.ajax({
                    url: "../php/obtenerCorporacionVista.php",
                    method: "POST",
                    data: {idMesaVotacion:idMesaVotacion},
                    success: function(resultado){
                        //alert(resultado);
                        $("#comboCorporacion").html(resultado);
                    }
                });
        })
    })
  </script>
    </head>
    <body>
    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

    <form id="combo" name="combo" action="../php/graficar.php" method="POST">
    <div>
        SELECCIONA MUNICIPIO
        <select id="comboMunicipio" name="comboMunicipio">
            <option value="0">Seleccione</option>
            <?php while($row = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $row['idMunicipio']; ?>"><?php echo $row['nombreMunicipio']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div>
        SELECCIONA CORPORACION
        <select id="comboCorporacion" name="comboCorporacion">
            <option value="0">Seleccione</option>
            <!-- Agrega opciones de corporación según sea necesario -->
        </select>
    </div>

    

    <button type="button" onclick="actualizarGrafico()">Generar Gráfico</button>
    </form>
    

    <script>
        // Lógica JavaScript para actualizar el gráfico
        function actualizarGrafico() {
            // Obtener valores seleccionados
            var Municipio = document.getElementById('comboMunicipio').value;
            var Corporacion = document.getElementById('comboCorporacion').value;

            // Realizar la solicitud AJAX para obtener datos
            $.ajax({
                url: "../php/graficar.php",
                method: "POST",
                data: {Municipio:Municipio, Corporacion:Corporacion},

            }).done(function (resp) {
                var data1=JSON.parse(resp);
                var nombresx=[];
                var votosy=[];
                for(var i=0;i<data1.length;i++){
                    nombresx.push(data1[i].nombre);
                    votosy.push(data1[i].cantidadVotosCandidato);
                    
                }
                const barColors = [
                            "#b91d47",
                            "#00aba9",
                            "#2b5797",
                            "#e8c3b9",
                            "#1e7145"
                            ];   

                                new Chart("myChart", {
                                type: "pie",
                                data: {
                                    labels: nombresx,
                                    datasets: [{
                                    backgroundColor: barColors,
                                    data: votosy
                                    }]
                                },
                                options: {
                                    title: {
                                    display: true,
                                    text: "World Wide Wine Production 2018"
                                    }
                                }
                                });
                
            })
        }
    </script>


    </body>
    </html>

