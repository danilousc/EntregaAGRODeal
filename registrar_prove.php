<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (
    isset($_POST['submit']) &&
    strlen($_POST['usuario']) >= 1 &&
    strlen($_POST['correo']) >= 1 &&
    strlen($_POST['contrasena']) >= 1 &&
    strlen($_POST['ubicacion']) >= 1
) {
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);
    $ubicacion = trim($_POST['ubicacion']);

    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    
    $consulta_id = "SELECT MAX(id) as max_id FROM proveedores";
    $resultado_id = mysqli_query($conn, $consulta_id);
    $fila_id = mysqli_fetch_assoc($resultado_id);
    $ultimo_id = $fila_id['max_id'];

    $nueva_id = $ultimo_id ? $ultimo_id + 1 : 1;

    $consulta = "INSERT INTO proveedores(id, nombre, ubicacion, contacto, contraseña) 
                 VALUES($nueva_id, '$usuario', '$ubicacion', '$correo', '$contrasena_encriptada')";

    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        header("Location: index_prove.php");
        exit();
    } else {
        echo "Error: " . $consulta . "<br>" . $conn->error;
    }
}

$conn->close();
?>
