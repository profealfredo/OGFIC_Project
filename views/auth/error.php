<?php
$pageTitle = "Error";
include_once '../inc/header.php';
include_once '../../config/database.php';

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
                        <?php 
                          // Mostrar mensaje si existe
                          if (isset($_GET['mensaje'])) {
                          echo '<div class="alert alert-danger text-center"><h5>' . htmlspecialchars($_GET['mensaje']) . '</h5></div>';
                          } else {
                          echo '<div class="alert alert-danger text-center"><h5>Ocurrió un error inesperado.</h5></div>';
                          }
                        ?>

                         
                          <form>
                            <div class="form-group mb-3 text-center">
                                <i class="fas fa-circle-exclamation"></i>
                            </div>
                            
                            <div class="text-center">
                            <a href="register_student.php" class="btn btn-primary">Volver al registro</a>
                            </div>
                          </form>
                          <!-- Enlaces centrados dentro de la columna -->
                          <div class="text-center mt-3">
                             <a href="#" class="link-secondary">☑️Revise los datos ingresados</a> 
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>