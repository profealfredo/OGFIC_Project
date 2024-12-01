<?php
// config/database.php

$host = 'localhost';            // Servidor de base de datos (localhost está bien si estás en un entorno local)
$db_name = 'ogfic_db';           // Nombre de la base de datos (asegúrate de que coincida exactamente con el nombre en phpMyAdmin)
$username = 'root';              // Usuario de MySQL (root es el usuario por defecto en XAMPP)
$password = '';                  // Contraseña de MySQL (por defecto está vacía en XAMPP)

try {
    // Crear una nueva instancia de PDO con la configuración de conexión
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Configurar el modo de error de PDO para mostrar excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa"; // Prueba rápida
} catch (PDOException $e) {
    // En caso de error de conexión, muestra el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>
