            <div class="col-md-5 col-sm-12">

                <div class="login-box mx-auto">
                    <div class="login-logo">
                        <h1><b>Aten</b>medic (médicos)</h1>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                        <p class="login-box-msg text-center">
                            Ingresa tus datos para iniciar sesisón
                        </p>

                        <?php if(isset($_SESSION['identityDoctor'])) :?>
                            <?php if($_SESSION['identityDoctor'] == 'failed'):?>
                                <p class="login-box-msg text-center text-danger">
                                    Los datos ingresados no son correctos. Intente de nuevo la operación
                                </p>
                                <?php unset($_SESSION['identityDoctor']); ?>
                            <?php endif?>
                        <?php endif?>

                        <form action="<?=base_url?>loginDoctor/login" method="post">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Cedula" name="cedula" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-address-card"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <p class="mb-1">
                                        <a href="<?=base_url?>loginDoctor/olvidoContraseña" class="text-info">Olvide mi contraseña</a>
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-5">
                                    <button type="submit" class="btn btn-info btn-block">Acceder</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->
            </div>