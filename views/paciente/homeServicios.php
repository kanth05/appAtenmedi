      <!-- <section class="content-header">
      </section> -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <!-- Tarjeta donde va el botón de pánico -->
              <div class="card card-info card-outline" style="height:auto !important">
                <div class="card-body box-profile">

                  <section class="content">

                    <div class="container-fluid">
                      <div class="row">
                        <!-- col  -->
                        <div class="col-12">

                            <h3 class="font-weight-bold">Solicitud de servicio</h3>
                            <!-- /.card-header -->

                            <!-- Formulario inicial para seleccionar el servicio -->
                            <?php if(!isset($_SESSION['servicio'])) :?>

                              <form action="<?=base_url?>paciente/Menuserv" method = "post">
                                <div class="card-body pb-0">
                                  <div class="form-group">
                                    <label for="tipoServicio">Tipo de servicio</label>
                                    <select class="custom-select my-1" id="tipoServicio" name="tipoServicio">
                                          <option selected disabled value="">Servicio</option>
                                          <option value="1">Traslado</option>
                                          <option value="2">AMD</option>
                                      </select>
                                      <button type="submit" class="btn btn-info btn-block">Seleccionar servicio</button>
                                  </div>
                                </div>
                              </form>

                              <div class="my-5 d-none d-sm-inline-block">
                                <span class="text-center text-muted lead">
                                  <p>Primero seleccione el tipo de servicio que va a solicitar.</p>
                                </span>
                              </div>
                            <?php endif?>

                            <!-- Formulario del traslado -->
                            <?php if(isset($_SESSION['servicio']) && $_SESSION['servicio'] == '1') :?>

                              <form action="<?=base_url?>paciente/SolicitarServicio" method = "post">
                                <div class="card-body pb-0">
                                  <div class="form-group">
                                    <label for="tipoServicio">Servicio de traslado</label>
                                  </div>
                                  <div class="form-group">
                                    <label for="causa">Causa del traslado:</label>
                                    <?php if(!isset($_SESSION['error']['causa'])): ?>
                                      <input type="text" class="form-control" name ="causa" placeholder="Causa">
                                    <?php else: ?>
                                      <input type="text" class="form-control is-invalid" name ="causa" placeholder="Causa">
                                    <?php endif?>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Sintomas:</label>
                                    <?php if(!isset($_SESSION['error']['causa'])): ?>
                                      <input type="text" class="form-control" name ="sintoma" placeholder="Sintomas">
                                    <?php else: ?>
                                      <input type="text" class="form-control is-invalid" name ="sintoma" placeholder="Sintomas">
                                    <?php endif?>
                                  </div>
                                  <div class="form-group">
                                    <label for="fecha">Fecha:</label>
                                    <?php if(!isset($_SESSION['error']['causa'])): ?>
                                      <input type="text" class="form-control " name="fecha" placeholder="dd/mm/yyyy">
                                    <?php else: ?>
                                      <input type="text" class="form-control is-invalid" name="fecha" placeholder="dd/mm/yyyy">
                                    <?php endif?>
                                    <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"> -->
                                  </div>
                                  <div class="form-group">
                                    <label for="Dsalida">Dirección de salida:</label>
                                    <?php if(!isset($_SESSION['error']['causa'])): ?>
                                      <input type="text" class="form-control" name="Dsalida" placeholder="Direccion de salida">
                                    <?php else: ?>
                                      <input type="text" class="form-control is-invalid" name="Dsalida" placeholder="Direccion de salida">
                                    <?php endif?>
                                  </div>
                                  <div class="form-group">
                                    <label for="Dllegada">Dirección de llegada:</label>
                                    <?php if(!isset($_SESSION['error']['causa'])): ?>
                                      <input type="text" class="form-control" name="Dllegada" placeholder="Direccion de llegada">
                                    <?php else: ?>
                                      <input type="text" class="form-control is-invalid" name="Dllegada" placeholder="Direccion de llegada">
                                    <?php endif?>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block">Acceder</button>
                                    <a class="btn btn-info btn-block" href ="<?=base_url?>paciente/menuServSet">Regresar</a>
                                  </div>
                                </div>
                              </form>

                              <div class="my-5 d-none d-sm-inline-block">
                                <span class="text-center text-muted lead">
                                  <p>Coloque la información que se le solicita en el formulario para notificar el traslado.</p>
                                </span>
                              </div>
                            <?php endif?>
                           
                            <!-- Formulario para AMD -->
                            <?php if(isset($_SESSION['servicio']) && $_SESSION['servicio'] == '2') :?>

                              <form role="form" action="<?=base_url?>paciente/SolicitarServicio" method = "post">
                                <div class="card-body pb-0 text-dark">
                                  <div class="form-group">
                                    <label for="tipoServicio">Servicio de AMD</label>
                                  </div>
                                  <div class="form-group">
                                    <label for="causa">Causa del servicio</label>
                                    <input type="text" class="form-control" name="causa" placeholder="Causa">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Sintomas presentados</label>
                                    <input type="text" class="form-control" name="sintomas" placeholder="Sintomas">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Fecha de atención</label>
                                    <input type="text" class="form-control" name="sintomas" placeholder="dd/mm/yyyy">
                                    <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"> -->
                                  </div>
                                  <div class="form-group">
                                    <label for="direccion">Dirección del domicilio</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block">Acceder</button>
                                    <a class="btn btn-info btn-block" href ="<?=base_url?>paciente/menuServSet">Regresar</a>
                                  </div>    
                                </div>
                              </form>

                              <div class="mt-5 d-none d-sm-inline-block">
                                <span class="text-justify text-muted lead">
                                  <p>Introduce primero los datos solicitados en el formulario de arriba para pedir la asistencia médica a domicilio.</p>
                                </span>
                              </div>

                            <?php endif?>
                        
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </section>
                  
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
        <?php unset($_SESSION['error']);?>
      </section>
      <!-- /.content -->
    