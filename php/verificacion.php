<?php
//conexion a la base de datos
include("conexion.php");

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
echo "Usuario: $usuario, Contraseña: $contraseña"; // Verifica si los valores se están recibiendo correctamente
//query para verificar que el usuario y la contraseña sean correctos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre = '$usuario' and contraseña = '$contraseña'");
//verifica si el usuario existe
if(mysqli_num_rows($verificar_usuario) > 0){
    header("Location: ../administrador/administrador.php");
    exit();
}
else{
    echo '
    <script>
    alert("Usuario o contraseña incorrectos");
    window.location = "../LogIn_HTML_modern_gray/login.php";
    </script>
    ';
    exit();
}


mysqli_close($conexion);

?>
