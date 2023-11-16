<?php

include("conexion.php");

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contraseña = $_POST['contraseña'];
//consulta para verificar que no se repita el usuario
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

$respuesta= mysqli_num_rows($verificar_usuario);

if($respuesta > 0){
    echo '
    <script>
    alert("El usuario ya esta registrado");
    window.location = "../LogIn_HTML_modern_gray/registro.php";
    </script>
    ';
    exit();
}

$insertar=mysqli_query($conexion, "INSERT INTO usuarios(usuario, correo, telefono, contraseña) VALUES ('$usuario', '$correo', '$telefono', '$contraseña')");

if($insertar){
    echo '
    <script>
    alert("Usuario registrado exitosamente");
    window.location = "../LogIn_HTML_modern_gray/login.php";
    </script>
    ';
}
else{
    echo '
    <script>
    alert("Error al registrar usuario");
    window.location = "../LogIn_HTML_modern_gray/registro.php";
    </script>
    ';
}
mysqli_close($conexion);

?>