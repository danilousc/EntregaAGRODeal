<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px; 
            overflow: hidden; 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd; 
            padding: 12px;
            text-align: center;
            font-family: Arial, sans-serif; 
        }
        th {
            background-color: #82d68d;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .CartBtn {
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
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }
        .CartBtn::before {
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
        .CartBtn:hover {
            color: #e8e8e8;
        }
        .CartBtn:hover::before {
            width: 100%;
        }
        .CartBtn:active {
            transform: scale(0.95);
            transition-duration: .8s;
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
            cursor: pointer;
            display: block;
            margin: 30px auto 0;
            text-decoration: none;
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
        .button-link:active {
            transform: scale(0.95);
            transition-duration: .8s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Proveedores</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Contacto</th>
                <th>Acciones</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "agrodeal";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT id, nombre, ubicacion, contacto FROM proveedores";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["nombre"]. "</td>
                            <td>" . $row["ubicacion"]. "</td>
                            <td>" . $row["contacto"]. "</td>
                            <td>
                                <a href='editar_proveedor.php?id=" . $row["id"] . "' class='CartBtn'>Editar</a>
                                <a href='eliminar_proveedor.php?id=" . $row["id"] . "' class='CartBtn' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este proveedor?\");'>Eliminar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 resultados</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <div class="agregar">
            <button class="button-link" onclick="window.location.href = 'agregar_proveedor.php';">Agregar Proveedor</button>
        </div>
        <div class="regreso">
            <button class="button-link" onclick="window.location.href = 'principal_admin.php';">Regresar</button>
        </div>
    </div>
</body>
</html>
