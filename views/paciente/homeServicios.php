
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
  
                          <div class="card card-info">
                            <div class="card-header">
                              <h3 class="card-title">Solicitud de servicio</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- Formulario inicial para seleccionar el servicio -->
                            <?php if(!isset($_SESSION['servicio'])) :?>

                              <form action="<?=base_url?>paciente/Menuserv" method = "post">
                                <div class="card-body pb-0">
                                  <div class="form-group">
                                    <label for="tipoServicio">Tipo de servicio</label>
                                    <select class="custom-select my-1" id="tipoServicio" name="tipoServicio">
                                          <option selected>Servicio</option>
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
                                    <label for="causa">Causa de la llamada</label>
                                    <input type="text" class="form-control" name="causa" placeholder="Causa">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Sintomas presentados</label>
                                    <input type="text" class="form-control" name="sintomas" placeholder="Sintomas">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Fecha del traslado</label>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Dirección de salida</label>
                                    <input type="text" class="form-control" name="Dsalida" placeholder="Direccion de salida">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">SDirección de llegada</label>
                                    <input type="text" class="form-control" name="Dllegada" placeholder="Direccion de llegada">
                                  </div>
                                  <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-block">Acceder</button>
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
                                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Dirección del domicilio</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                                  </div>
                                  <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-block">Acceder</button>
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
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    