<?php
// Incluir el encabezado

require_once 'config/database.php';

// Crear estudiante
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Recibimos los datos del formulario
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Ciframos la contraseña
    $cedula = $_POST['cedula'];
    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];

    try {
        // Insertar el nuevo estudiante en la base de datos
        $stmt = $pdo->prepare("INSERT INTO estudiantes (email, password, cedula, codigo, nombres, apellidos) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$email, $password, $cedula, $codigo, $nombres, $apellidos]);
        $message = "Estudiante creado exitosamente.";
    } catch (PDOException $e) {
        $error = "Error al crear el estudiante: " . $e->getMessage();
    }
}

// Eliminar estudiante
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    try {
        // Eliminar el estudiante de la base de datos
        $stmt = $pdo->prepare("DELETE FROM estudiantes WHERE id_estudiante = ?");
        $stmt->execute([$delete_id]);
        $message = "Estudiante eliminado exitosamente.";
    } catch (PDOException $e) {
        $error = "Error al eliminar el estudiante: " . $e->getMessage();
    }
}

// Actualizar estudiante
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id_estudiante = $_POST['id_estudiante'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Ciframos la contraseña
    $cedula = $_POST['cedula'];
    $codigo = $_POST['codigo'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];

    try {
        // Actualizar la información del estudiante en la base de datos
        $stmt = $pdo->prepare("UPDATE estudiantes SET email = ?, password = ?, cedula = ?, codigo = ?, nombres = ?, apellidos = ? WHERE id_estudiante = ?");
        $stmt->execute([$email, $password, $cedula, $codigo, $nombres, $apellidos, $id_estudiante]);
        $message = "Estudiante actualizado exitosamente.";
    } catch (PDOException $e) {
        $error = "Error al actualizar el estudiante: " . $e->getMessage();
    }
}

// Consultar estudiantes
$stmt = $pdo->query("SELECT id_estudiante, email, cedula, codigo, nombres, apellidos FROM estudiantes");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se desea editar un estudiante específico:
$studentToEdit = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE id_estudiante = ?");
    $stmt->execute([$edit_id]);
    $studentToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Estudiantes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Gestión de Estudiantes</h2>

    <!-- Mensajes de éxito o error -->
    <?php if (isset($message)): ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario para crear un nuevo estudiante -->
    <form action="index.php" method="POST" class="mb-4">
        <h4>Crear Nuevo Estudiante</h4>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" id="nombres" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Crear Estudiante</button>
    </form>

    <!-- Formulario para editar un estudiante -->
    <?php if ($studentToEdit): ?>
        <h4>Editar Estudiante</h4>
        <form action="index.php" method="POST" class="mb-4">
            <input type="hidden" name="id_estudiante" value="<?php echo $studentToEdit['id_estudiante']; ?>">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $studentToEdit['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo $studentToEdit['password']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo $studentToEdit['cedula']; ?>" required>
            </div>
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control" value="<?php echo $studentToEdit['codigo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $studentToEdit['nombres']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $studentToEdit['apellidos']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Actualizar Estudiante</button>
        </form>
    <?php endif; ?>

    <!-- Tabla de estudiantes -->
    <h4>Lista de Estudiantes</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Correo Electrónico</th>
                <th>Cédula</th>
                <th>Código</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $student['cedula']; ?></td>
                    <td><?php echo $student['codigo']; ?></td>
                    <td><?php echo $student['nombres']; ?></td>
                    <td><?php echo $student['apellidos']; ?></td>
                    <td>
                        <a href="index.php?edit_id=<?php echo $student['id_estudiante']; ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?delete_id=<?php echo $student['id_estudiante']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>


