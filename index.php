
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Enlaza tu archivo CSS personalizado -->
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body >
    <div class="container">
    
    <div class="row justify-content-center vh-100 w-100" style="background-image: url('LogIn_HTML_modern_gray/imagenes/colombia.jpg');background-size: cover; background-repeat: no-repeat;"  >
          <div class="col-6 d-flex align-items-center justify-content-center" >
          <!-- Botón de Loguin -->
          <button id="Loguin" style="width: 500rem; height: 250px;background-image: url('imagenes/ingreso.jpg');background-size: cover; background-repeat: no-repeat;">Login</button>
                <!-- Botón de Vista -->
            
          
          </div>
          <div class="col-6 d-flex align-items-center justify-content-center" >
            <button id="Vista" style="width: 500rem; height: 250px;background-image: url('imagenes/voto.jpg');background-size: cover; background-repeat: no-repeat;">Visualizar</button>
            </div>
      </div>
    </div>



    <script>
        // Asociar una función de redirección al botón
        document.getElementById("Loguin").addEventListener("click", function() {
            // Redirigir a la otra página
            window.location.href = "Login_HTML_modern_gray/login.php";
        });
        document.getElementById("Vista").addEventListener("click", function() {
            // Redirigir a la otra página
            window.location.href = "Visual/visual.php";
        });
    </script>
</body>
</html>



