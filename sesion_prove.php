<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM proveedores WHERE nombre = '$usuario'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $contrasena_encriptada = $fila['contraseña'];

        if (password_verify($contrasena, $contrasena_encriptada)) {
            $_SESSION['usuario'] = $usuario;
            header("Location: principal_prove.php"); 
            exit();
        } else {
            header("Location: index_prove.php");
            exit(); 
        }
    } else {
        header("Location: index_prove.php");
        exit(); 
    }
}

$conn->close();
?>
