<?php
if(isset($_GET['product_id'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agrodeal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $product_id = $_GET['product_id'];

 
    $sql_insert = "INSERT INTO carrito (product_id) VALUES ($product_id)";
    if ($conn->query($sql_insert) === TRUE) {
 
        $sql_update = "UPDATE productos SET cantidad = cantidad - 1 WHERE id = $product_id";
        if ($conn->query($sql_update) === TRUE) {
        
            $sql_total = "SELECT COUNT(*) AS total FROM carrito";
            $result = $conn->query($sql_total);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_products = $row['total'];
            } else {
                $total_products = 0;
            }
            echo $total_products;
        } else {
            echo "Error al actualizar la cantidad de productos: " . $conn->error;
        }
    } else {
        echo "Error al insertar el producto en el carrito: " . $conn->error;
    }

    $conn->close();
}
?>
