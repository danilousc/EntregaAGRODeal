<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #f7f7f7; 
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
            cursor: pointer;
        }
        input[type="submit"]::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #212121;
            z-index: -1;
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
        }
        input[type="submit"]:hover {
            color: #e8e8e8;
        }
        input[type="submit"]:hover::before {
            width: 100%;
        }
        .regreso {
            text-align: center;
            margin-top: 20px;
        }
        .button-link {
            display: block;
            margin: 30px auto 0;
            font-size: 20px;
            background-color: #82d68d;
            cursor: pointer;
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none; 
            font-weight: bold;
            transition: background-color 0.3s ease; 
        }
        .button-link:hover {
            background-color: #6cbf97; 
            color: #ffffff; 
        }
    </style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM proveedores WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Proveedor no encontrado.";
        exit();
    }
} else {
    echo "ID de proveedor no proporcionado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $contacto = $_POST['contacto'];

    $sql = "UPDATE proveedores SET nombre='$nombre', ubicacion='$ubicacion', contacto='$contacto' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Proveedor actualizado exitosamente.";
    } else {
        echo "Error actualizando proveedor: " . $conn->error;
    }
    header("Location: proveedores_admin.php");
    exit();
}
$conn->close();
?>
<body>
    <div class="container">
        <h1>Editar Proveedor</h1>
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required><br>
            <label for="contacto">Contacto:</label>
            <input type="email" id="contacto" name="contacto" value="<?php echo $row['contacto']; ?>" required><br>
            <input type="submit" value="Guardar Cambios">
        </form>
        <div class="regreso">
            <button class="button-link" onclick="window.location.href = 'proveedores_admin.php';">Regresar</button>
        </div>
    </div>
</body>
</html>
