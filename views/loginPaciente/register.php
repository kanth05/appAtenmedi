            <div class="col-md-5 col-sm-12 px-0">

                <div class="login-box mx-auto">
                    <div class="login-logo">
                        <h1><b>Aten</b>medi</h1>
                    </div>
                    <!-- /.login-logo -->
                    <?php if(!isset($_SESSION['register'])):?>
                        <div class="card">
                            <div class="card-body register-card-body">
                                <p class="login-box-msg">Registrar nuevo usuario</p>
                                <?php if(isset($_SESSION['error']['errorClave'])) :?>
                                    <p class="login-box-msg text-danger"><?=$_SESSION['error']['errorClave']?></p>
                                <?php elseif(isset($_SESSION['error'])): ?>
                                    <p class="login-box-msg text-danger">Faltaron completar los campos remarcados</p>
                                <?php endif?>

                                <form action="<?=base_url?>loginPaciente/validaProducto" method="post" class="needs-validation" novalidate>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?=isset($_SESSION['error']['nombre']) ? 'is-invalid' : ''?>" placeholder="Nombre y apellido" name="nombre">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <select class="custom-select my-1 <?=isset($_SESSION['error']['tipo']) ? 'is-invalid' : ''?>" name="tipo">
                                            <option selected disabled value="">Tipo</option>
                                            <option value="01">Particular</option>
                                            <option value="02">Seguro</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control <?=isset($_SESSION['error']['cedula']) ? 'is-invalid' : ''?>" placeholder="Cédula" name="cedula">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-address-card"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control <?=isset($_SESSION['error']['correo']) ? 'is-invalid' : ''?>" placeholder="Correo" name="correo">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control <?=isset($_SESSION['error']['password']) ? 'is-invalid' : ''?>" placeholder="Contraseña" name="password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control <?=isset($_SESSION['error']['repassword']) ? 'is-invalid' : ''?>" placeholder="Repetir contraseña" name="repassword">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Tu contraseña deberá de tener entre 8 a 12 caracteres conteniendo letras, números y sin caracteres tales como (#$%_"@).
                                        </small>
                                    </div>
                                    
                                    <?php if(isset($_SESSION['error']['terminos'])):?>
                                        <small class="form-text text-danger mb-2"><?=$_SESSION['error']['terminos']?></small>
                                    <?php endif?>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="terminos" name="terminos" value="1">
                                                <label for="terminos">
                                                    Acepto los <a href="#" class="text-info">términos</a>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-5">
                                            <button type="submit" class="btn btn-info btn-block">Registrar</button>
                                        </div>
                                    <!-- /.col -->
                                    </div>
                                </form>
                                <a href="<?=base_url?>" class="text-center text-info">Ya estoy registrado</a>
                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->
                    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'completed') :?>
                        <div class="card">
                            <div class="card-body register-card-body">
                            <p class="login-box-msg">Registro completo</p>

                            <p class="login-box-msg"> 
                                Su registro se ha completado de manera exitosa. Regrese al menu de login para iniciar sesión.
                            </p>

                            <a href="<?=base_url?>" class="text-center text-info">Regresar</a>
                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->
                    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') :?>
                        <div class="card">
                            <div class="card-body register-card-body">
                            <p class="login-box-msg">¡Ha ocurrido algo!</p>
                            <p class="login-box-msg"> 
                                <?= $_SESSION['error']?>
                            </p>
                            <a href="<?=base_url?>" class="text-center text-info">Regresar</a>
                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->
                    <?php endif?>

                    <!-- Cerramos las sesiones temporales que usamos en ésta pantalla -->
                    <?php unset($_SESSION['errorPassword']); unset($_SESSION['error']);?>
                    <?php Utils::deleteSession('register'); ?>
                </div>
                <!-- /.login-box -->
            </div>
   