<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5 y CSS">
        <meta name="keywords" content="login,formulariode acceso html">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
    
        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                    <form action="../php/verificacion.php" method="POST">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario" required>
                    
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña" placeholder="Contraseña" required>
                    
                    <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="registro.php">¿No tienes Cuenta? Registrate</a>
                        <hr>
                        <a href="#">« Volver</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("Loguin").addEventListener("click", function() {
            // Redirigir a la otra página
            window.location.href = "Login_HTML_modern_gray/login.php";
        });
        </script>
        
    </body>
</html>