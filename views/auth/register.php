<?php
$pageTitle = "Registro de Usuario";
include_once '../inc/header.php';
include_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encripta la contraseña

    try {
        $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Usuario registrado con éxito.</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error al registrar el usuario.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger text-center'>Error: " . $e->getMessage() . "</div>";
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
                    <form method="POST" action="register.php">
                        <div class="form-group mb-3 text-center">
                            <input type="email" class="form-control input-custom mx-auto" name="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="password" class="form-control input-custom mx-auto" name="password" placeholder="Contraseña" required>
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

<?php include_once '../inc/footer.php'; ?>
