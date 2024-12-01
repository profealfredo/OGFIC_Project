// db_connection.php
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=ogfic_db", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
