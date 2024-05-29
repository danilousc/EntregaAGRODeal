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
    strlen($_POST['contrasena']) >= 1
) {
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $consulta_id = "SELECT MAX(id) as max_id FROM usuarios";
    $resultado_id = mysqli_query($conn, $consulta_id);
    $fila_id = mysqli_fetch_assoc($resultado_id);
    $ultimo_id = $fila_id['max_id'];

    if ($ultimo_id === null) {
        $nueva_id = 1;
    } else {

        $consulta_elim = "SELECT id FROM usuarios_eliminados WHERE id <= $ultimo_id";
        $resultado_elim = mysqli_query($conn, $consulta_elim);
        $ids_eliminados = array();
        while ($fila_elim = mysqli_fetch_assoc($resultado_elim)) {
            $ids_eliminados[] = $fila_elim['id'];
        }


        if (!empty($ids_eliminados)) {
            $nueva_id = min(array_diff(range(1, $ultimo_id), $ids_eliminados));
        } else {

            $nueva_id = $ultimo_id + 1;
        }
    }

    $consulta = "INSERT INTO usuarios(id, usuario, correo, contraseña) 
        VALUES($nueva_id, '$usuario', '$correo', '$contrasena_encriptada')";

    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroDeal - Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2em;
            color: #4CAF50;
        }

        #logo img {
            width: 100px;
            height: auto;
            display: block;
            margin: 10px auto;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            flex-direction: column;
            gap: 20px;
        }

        .registro {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .registro form, .registro button {
            margin: 0;
        }

        .registro input, .registro button {
            font-size: 1em;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .registro input {
            background-color: #e6e6fa;
        }

        button {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
        }

        button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #212121;
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
        }

        button:hover {
            color: #e8e8e8;
        }

        button:hover::before {
            width: 100%;
        }

        footer {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .button-link {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
        }

        .button-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #212121;
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
        }

        .button-link:hover {
            color: #e8e8e8;
        }

        .button-link:hover::before {
            width: 100%;
        }
    </style>
 </style>
</head>
<body>
    <header>
        <h1>AgroDeal</h1>
        <div id="logo">
            <img src="logo.jpeg" alt="Logo AgroDeal">
        </div>
    </header>
    <main>
        <section class="registro">
            <h2>Registro</h2>
            <form action="" method="POST" id="registro-form">
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" name="submit">Registrarse</button>
            </form>
            <a class="button-link" href="index.php">Inicio</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 AgroDeal</p>
    </footer>
</body>
</html>