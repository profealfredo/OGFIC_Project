<?php

// Incluir el encabezado
include_once '../inc/header.php';
?>

<!-- Main content -->
<div class="col-md-9 content">
                <div class="container mt-5">
                    <div class="custom-card p-4 rounded-3 shadow">
                      <h3 class="text-center mb-3">Solicitud Aval Opción de Grado</h3>
                      <button class="btn btn-primary w-100 mb-3">Enviar solicitud de aval de opción de grado...</button>
                      <p class="text-muted mb-4">
                        Nota: Descargar el Formato F-FIC-CG-003-Solicitud-Aprobacion-Opcion-de-Grado y diligenciarlo.
                      </p>
                      <form>
                        <div class="gray-section">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                  <label for="director" class="form-label">Director sugerido por Estudiante...</label>
                                  <select class="form-select" id="director">
                                    <option>Seleccionar...</option>
                                    <option value="1">Director 1</option>
                                    <option value="2">Director 2</option>
                                    <option value="3">Director 3</option>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <label for="especialidad" class="form-label">Selección de la especialidad...</label>
                                  <select class="form-select" id="especialidad">
                                    <option>Seleccionar...</option>
                                    <option value="1">Especialidad 1</option>
                                    <option value="2">Especialidad 2</option>
                                    <option value="3">Especialidad 3</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col-md-12">
                                  <label for="modalidad" class="form-label">Selección de la modalidad de opción de grado...</label>
                                  <select class="form-select" id="modalidad">
                                    <option>Seleccionar...</option>
                                    <option value="1">Modalidad 1</option>
                                    <option value="2">Modalidad 2</option>
                                    <option value="3">Modalidad 3</option>
                                  </select>
                                </div>
                              </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <label for="formato" class="form-label">Adjunte el Formato F-FIC-CG-003 Diligenciado y Firmado</label>
                            <input class="form-control" type="file" id="formato">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <label for="registro" class="form-label">Adjunte su Registro completo Notas SAC</label>
                            <input class="form-control" type="file" id="registro">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
             </div>
</div>

<?php 
// Incluir el pie de página
include '../inc/footer.php'; 
?>
