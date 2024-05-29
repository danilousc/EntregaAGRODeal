<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    $sql = "DELETE FROM productos WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}
$conn->close();
?>
