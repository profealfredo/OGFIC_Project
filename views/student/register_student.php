<?php
// register_student.php
$pageTitle = "Registro de Usuario";
include_once '../inc/header.php';
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashear contraseña
    $cedula = $_POST['cedula'];
    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombres'];
    $apellidos= $_POST['apellidos'];
    

    try {
        // Insertar datos en la tabla 'students'
        $stmt = $pdo->prepare("INSERT INTO estudiantes (email, password, cedula, codigo, nombres, apellidos) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$email, $password, $cedula, $codigo, $nombres, $apellidos]);

        echo "Registro exitoso. Ahora puedes iniciar sesión.";
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
}
?>
<!-- Main content -->
<div class="col-md-9 content">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-card p-4">
            <div class="row align-items-center">
                <!-- Columna del logo -->
                <div class="col-auto text-center">
                    <img src="../../assets/images/logo2.png" alt="Universidad Santo Tomás" class="img-fluid logo">
                </div>
                <!-- Columna del formulario -->
                <div class="col">
                    <h6 class="mb-4 text-center">Registro en el Sistema OGFIC</h6>
                    <form action = "register_student.php" method="POST"">
                        <div class="form-group mb-3 text-center">
                            <input type="email" class="form-control input-custom mx-auto" name="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="password" class="form-control input-custom mx-auto" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="cedula" class="form-control input-custom mx-auto" name="cedula" placeholder="Cédula" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="codigo" class="form-control input-custom mx-auto" name="codigo" placeholder="Código" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="nombres" class="form-control input-custom mx-auto" name="nombres" placeholder="Nombres" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="apellidos" class="form-control input-custom mx-auto" name="apellidos" placeholder="Apellidos" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary input-custom mx-auto">Registrarse</button>
                        </div>
                    </form>
                    <!-- Enlaces centrados dentro de la columna -->
                    <div class="text-center mt-3">
                        <a href="#" class="link-secondary">☑️ Consulte los requisitos previos para el registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../inc/footer.php'; ?> <!-- Incluye el footer -->
