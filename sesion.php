<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        
        $fila = mysqli_fetch_assoc($resultado);
        $contrasena_encriptada = $fila['contraseña'];

       
        if (password_verify($contrasena, $contrasena_encriptada)) {
            $_SESSION['usuario'] = $usuario;
            header("Location: /agrodeal/usuario/principal.php"); 
            exit();
        } else {
            header("Location: /agrodeal/usuario/index.php");
            exit(); 
        }
    } else {
        header("Location: /agrodeal/usuario/index.php");
        exit(); 
    }
}

?>
