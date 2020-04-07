
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

                    <form action="<?=base_url?>paciente/solicitarVideo" method="post">
                      <div class="row">
  
                        <!-- col  -->
                        <div class="col-sm-12 col-md-5">
                        
                            <h3 class="font-weight-bold">Historial para la consulta</h3>
                            <br>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Causa de la llamada</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Causa">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Sintomas presentados</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sintomas">
                            </div>

                          <div class="mt-5 d-none d-sm-inline-block">
                            <span class="text-justify text-muted lead">
                              <p>Introduce primero los datos solicitados en el formulario de arriba y luego presiona el botón de llamar para que seas atendido por uno de nuestros médicos</p>
                            </span>
                          </div>
                        </div>

                        <div class="col-sm-12 my-3 d-block d-sm-none">
                        </div>

                        <!-- col -->
                        <div class="col-sm-12 col-md-7 align-self-center">
                          <div class="text-center my-1">
                            <button type ="submit" class="btn btn-outline-light">
                              <img class="img-fluid img-circle" src="<?=base_url?>dist/img/icon-phone.jpg" alt="Icon Phone" style="width: 35% !important; height: 35% !important">
                            </button>
                          </div>
                        </div>
                        <!-- /.col -->

                      </div>
                    </form>
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
    