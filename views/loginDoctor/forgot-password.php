            <div class="col-md-5 col-sm-12 px-0">

                <div class="login-box mx-auto">
                    <div class="login-logo">
                        <h1><b>Aten</b>medic (médicos)</h1>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                        <p class="login-box-msg">¿Olvidaste tu contraseña? Introduzca su cédula y su contraseña nueva</p>

                        <form action="recover-password.php" method="post">

                          <div class="input-group mb-3">
                              <input type="number" class="form-control" placeholder="Cedula" required>
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-address-card"></span>
                                  </div>
                              </div>
                          </div>

                          <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Contraseña" required>
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                  </div>
                              </div>
                          </div>

                          <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Confirme contraseña" required>
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info btn-block">Enviar solicitud</button>
                            </div>
                          <!-- /.col -->
                          </div>
                      </form>

                        <p class="mt-3 mb-1">
                            <a href="<?=base_url?>loginDoctor/login" class="text-info">Inicio</a>
                        </p>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->
            </div>