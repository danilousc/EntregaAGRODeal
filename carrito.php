<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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
<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agrodeal";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        
        $sql = "SELECT carrito.product_id, productos.nombre FROM carrito INNER JOIN productos ON carrito.product_id = productos.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $total_products_in_cart = array();
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad en Carrito</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                if(isset($total_products_in_cart[$row['product_id']])) {
                    $total_products_in_cart[$row['product_id']]++;
                } else {
                    $total_products_in_cart[$row['product_id']] = 1;
                }
                echo "<tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$total_products_in_cart[$row['product_id']]}</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "El carrito está vacío";
        }
        $conn->close();
        ?>
        <button class="button-link" onclick="window.location.href = 'principal.php';">Regresar</button>
    </div>
</body>
</html>
