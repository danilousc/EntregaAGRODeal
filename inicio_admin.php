<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function cifrarContraseña($contraseña) {
    return md5($contraseña);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = cifrarContraseña($_POST['contrasena']);

    $sql = "SELECT * FROM administradores WHERE usuario='$usuario' AND contraseña='$contraseña'";
    $resultado = $conn->query($sql); 

    if ($resultado->num_rows > 0) {
        header("Location: principal_admin.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>
