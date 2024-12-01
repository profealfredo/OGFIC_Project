<?php
// Archivo generate_hash.php

// La contraseña que deseas hashear
$password = 'contra01';

// Generar el hash usando password_hash()
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el hash generado
echo "Hash generado: " . $hashedPassword;
?>
