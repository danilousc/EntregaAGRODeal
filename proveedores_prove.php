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

th,
td {
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
    width: 120px;
    height: 40px;
    border-radius: 6px;
    border: none;
    background-color: rgb(255, 208, 0);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition-duration: .5s;
    overflow: hidden;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

.IconContainer {
    position: absolute;
    left: -40px;
    width: 30px;
    height: 30px;
    background-color: transparent;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    z-index: 2;
    transition-duration: .5s;
}

.IconContainer svg {
    border-radius: 1px;
}

.text {
    height: 100%;
    width: fit-content;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgb(17, 17, 17);
    z-index: 1;
    transition-duration: .5s;
    font-size: 1em;
    font-weight: 600;
}

.CartBtn:hover .IconContainer {
    transform: translateX(48px);
    transition-duration: .5s;
}

.CartBtn:hover .text {
    transform: translate(10px, 0px);
    transition-duration: .5s;
}

.CartBtn:active {
    transform: scale(0.95);
    transition-duration: .8s;
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
    padding: 15px 25px;
    border-radius: 15px;
    color: #212121;
    z-index: 1;
    background: #e8e8e8;
    position: relative;
    font-weight: 1000;
    font-size: 17px;
    box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
    transition: all 250ms;
    overflow: hidden;
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
    box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
    transition: all 250ms;
}

.button-link:hover {
    background-color: #6cbf97;
    color: #ffffff;
}

.button-link:hover::before {
    width: 100%;
}
    </style>
</head>
<body>
    <h1>Proveedores</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Contacto</th>
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
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["ubicacion"]. "</td><td>" . $row["contacto"]. "</td></tr>";
            }
        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
    </table>
    <div class="regreso">
        <button class="button-link" onclick="window.location.href = 'principal_prove.php';">Regresar</button>
    </div>
</body>
</html>
