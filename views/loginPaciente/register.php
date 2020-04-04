            <div class="col-md-5 col-sm-12 px-0">

                <div class="login-box mx-auto">
                    <div class="login-logo">
                        <h1><b>Aten</b>medic</h1>
                    </div>
                    <!-- /.login-logo -->

                    <?php if(!isset($_SESSION['register'])):?>
                        <div class="card">
                            <div class="card-body register-card-body">
                            <p class="login-box-msg">Registrar nuevo usuario</p>

                            <form action="<?=base_url?>paciente/validaProducto" method="post">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nombre y apellido" name="nombre">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="custom-select my-1" id="inlineFormCustomSelectPref" name="tipo">
                                        <option selected>Tipo</option>
                                        <option value="1">Particular</option>
                                        <option value="2">Seguro</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Cédula" name="cedula">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-address-card"></span>
                                        </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Correo" name="correo">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Tu contraseña deberá de tener entre 8 a 20 caracteres conteniendo letras y numeros, sin espacios ni símbolos.
                                </small>
                                </div>
                                <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Repetir contraseña" name="repassword">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                    Yo acepto los <a href="#" class="text-info">terminos</a>
                                    </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
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
                                La cédula que colocó no posee un servicio contratado para usar la aplicación. Póngase en contacto con su prestador de servicio.
                            </p>

                            <a href="<?=base_url?>" class="text-center text-info">Regresar</a>
                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->
                    <?php endif?>
                    <?php Utils::deleteSession('register'); ?>
                </div>
                <!-- /.login-box -->
            </div>
   