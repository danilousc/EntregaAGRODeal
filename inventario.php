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
            padding: 15px 25px;
            font-weight: 1000;
            font-size: 17px;
            position: relative;
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
        .CartBtn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 6px;
            background-color: #212121;
            z-index: -1;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 250ms;
        }
        .CartBtn:hover::before {
            width: 100%;
        }
        .button-link {
            display: block;
            margin: 30px auto 0;
            font-size: 20px;
            background-color: #82d68d;
            cursor: pointer;
            color: #000000;
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
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
              echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td id='cantidad-" . $row["id"] . "'>" . $row["cantidad"]. "</td><td>$" . $row["precio"]. "</td><td><button class='CartBtn' onclick='addToCart(" . $row["id"] . ")'><span class='IconContainer'><svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512' fill='rgb(17, 17, 17)' class='cart'><path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7' /></svg></span><p class='text'>Add to Cart</p></button></td></tr>";
            }
          }
        ?>
    </table>

    <div class="regreso">
        <button class="button-link" onclick="window.location.href = 'principal.php';">Regresar</button>
    </div>
   <script>
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          
            var currentQuantity = parseInt(document.getElementById("cantidad-" + productId).innerText);
            var newQuantity = currentQuantity - 1;
    
            document.getElementById("cantidad-" + productId).innerText = newQuantity;
        }
    };
    xhr.open("GET", "guardar_en_carrito.php?product_id=" + productId, true);
    xhr.send();
}
</script>
</body>
</html>
