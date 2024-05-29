<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
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
        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .styled-button {
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
            text-align: center;
        }
        .styled-button::before {
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
        .styled-button:hover {
            color: #e8e8e8;
        }
        .styled-button:hover::before {
            width: 100%;
        }
        .regreso {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $sql_check_deleted = "SELECT id FROM deleted_ids ORDER BY id LIMIT 1";
    $result_deleted = $conn->query($sql_check_deleted);

    if ($result_deleted->num_rows > 0) {
        $row_deleted = $result_deleted->fetch_assoc();
        $id_to_use = $row_deleted['id'];

        $sql = "INSERT INTO productos (id, nombre, cantidad, precio) VALUES ($id_to_use, '$nombre', $cantidad, $precio)";

        if ($conn->query($sql) === TRUE) {
            $sql_delete_id = "DELETE FROM deleted_ids WHERE id = $id_to_use";
            $conn->query($sql_delete_id);
            echo "Producto agregado exitosamente.";
            header("Location: inventario_prove.php");
            exit();
        } else {
            echo "Error agregando producto: " . $conn->error;
        }
    } else {
        $sql = "INSERT INTO productos (nombre, cantidad, precio) VALUES ('$nombre', $cantidad, $precio)";

        if ($conn->query($sql) === TRUE) {
            echo "Producto agregado exitosamente.";
            header("Location: inventario_prove.php");
            exit();
        } else {
            echo "Error agregando producto: " . $conn->error;
        }
    }
}

$conn->close();
?>
</head>
<body>
    <div class="container">
        <h1>Agregar Producto</h1>
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required>
            <input type="submit" class="styled-button" value="Agregar Producto">
        </form>
        <div class="regreso">
            <button class="styled-button" onclick="window.location.href = 'principal_prove.php';">Regresar</button>
        </div>
    </div>
</body>
</html>
