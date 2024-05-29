<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
            transform: translate(10px,0px);
            transition-duration: .5s;
        }
        .CartBtn:active {
            transform: scale(0.95);
            transition-duration: .10s;
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
    <h1>Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th></th>
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
      
        $sql = "SELECT id, nombre, cantidad, precio FROM productos";
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr id='product-" . $row["id"]. "'><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td id='cantidad-" . $row["id"] . "'>" . $row["cantidad"]. "</td><td>$" . $row["precio"]. "</td><td><button class='CartBtn' onclick='deleteProduct(" . $row["id"] . ")'><span class='IconContainer'><svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512' fill='rgb(17, 17, 17)' class='trash'><path d='M268 0H308C321.3 0 332 10.7 332 24V56H512C520.8 56 528 63.2 528 72V104C528 112.8 520.8 120 512 120H492.4L467.4 500.2C466.2 518.2 451.7 532 433.7 532H142.3C124.3 532 109.8 518.2 108.6 500.2L83.6 120H64C55.2 120 48 112.8 48 104V72C48 63.2 55.2 56 64 56H244V24C244 10.7 254.7 0 268 0zM412 136C412 124.7 402.3 116 391 116H185C173.7 116 164 124.7 164 136V440C164 451.3 173.7 460 185 460H391C402.3 460 412 451.3 412 440V136z'/></svg></span><p class='text'>Eliminar</p></button></td></tr>";
            }
        }               
        ?>
    </table>

    <div class="regreso">
        <button class="button-link" onclick="window.location.href = 'principal_admin.php';">Regresar</button>
    </div>
    <script>
function deleteProduct(productId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var row = document.getElementById("product-" + productId);
            row.parentNode.removeChild(row);
        }
    };
    xhr.open("GET", "/agrodeal/proveedor/eliminar_producto.php?product_id=" + productId, true);
    xhr.send();
}
</script>
</body>
</html>
