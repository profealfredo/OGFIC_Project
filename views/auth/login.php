<?php
// login.php
session_start();
$pageTitle = "Inicio de Sesión";
include_once '../inc/header.php';
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Consultar la base de datos para obtener el usuario por su correo
        $stmt = $pdo->prepare("SELECT id_estudiante, email, password FROM estudiantes WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar si la contraseña ingresada coincide con el hash de la base de datos
            if (password_verify($password, $usuario['password'])) {
                // Iniciar sesión y redirigir al dashboard
                $_SESSION['id_estudiante'] = $usuario['id_estudiante'];
                $_SESSION['email'] = $usuario['email'];
                header("Location: ../student/dashboard.php"); // Redirigir a la página principal
                exit;
            } else {
                // Contraseña incorrecta
                $error = "Correo o contraseña incorrectos.";
            }
        } else {
            // El email no existe en la base de datos
            $error = "Correo o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        // Error de base de datos
        $error = "Error en la base de datos: " . $e->getMessage();
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
                    <h6 class="mb-4 text-center">Iniciar Sesión</h6>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form action="login.php" method="POST">
                        <div class="form-group mb-3 text-center">
                            <input type="email" class="form-control input-custom mx-auto" name="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="password" class="form-control input-custom mx-auto" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary input-custom mx-auto">Iniciar Sesión</button>
                        </div>
                    </form>
                    <!-- Enlaces centrados dentro de la columna -->
                    <div class="text-center mt-3">
                        <a href="#" class="link-secondary">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../inc/footer.php'; ?> <!-- Incluye el footer -->


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
                    <h5 class="mb-4 text-center">Iniciar Sesión</h5>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form action="login.php" method="POST">
                        <div class="form-group mb-3 text-center">
                            <input type="email" class="form-control input-custom mx-auto" name="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="password" class="form-control input-custom mx-auto" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary input-custom mx-auto">Iniciar Sesión</button>
                        </div>
                    </form>
                    <!-- Enlaces centrados dentro de la columna -->
                    <div class="text-center mt-3">
                        <a href="#" class="link-secondary">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../inc/footer.php'; ?> <!-- Incluye el footer -->
