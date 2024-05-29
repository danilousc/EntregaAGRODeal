<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodeal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = intval($_GET['id']); 

$sql = "DELETE FROM proveedores WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $sql_check_deleted = "SELECT id FROM deleted_ids WHERE id = $id";
    $result_check_deleted = $conn->query($sql_check_deleted);

    if ($result_check_deleted->num_rows == 0) {
        $sql_insert_deleted = "INSERT INTO deleted_ids (id) VALUES ($id)";
        $conn->query($sql_insert_deleted);
    }

    $sql_check_empty = "SELECT COUNT(*) as count FROM proveedores";
    $result_check_empty = $conn->query($sql_check_empty);
    $row_check_empty = $result_check_empty->fetch_assoc();

    if ($row_check_empty['count'] == 0) {
        $sql_reset_auto_increment = "ALTER TABLE proveedores AUTO_INCREMENT = 1";
        $conn->query($sql_reset_auto_increment);
    }

    echo "Proveedor eliminado exitosamente.";
} else {
    echo "Error eliminando proveedor: " . $conn->error;
}

$conn->close();

header("Location: /agrodeal/admin/proveedores_admin.php");
exit();
?>
