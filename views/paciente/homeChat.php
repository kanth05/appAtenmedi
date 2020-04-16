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

                    <form action="<?=base_url?>paciente/solicitarChat" method="post">
                      <div class="row">

                        <!-- col  -->
                        <div class="col-sm-12 col-md-5">
                        
                            <h3 class="font-weight-bold">Historial para la consulta</h3>
                            <br>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Causa de la consulta:</label>
                              <?php if(!isset($_SESSION['error']['causa'])): ?>
                                <input type="text" class="form-control" name ="causa" placeholder="Causa">
                              <?php else: ?>
                                <input type="text" class="form-control is-invalid" name ="causa" placeholder="Causa">
                              <?php endif?>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Sintomas presentados:</label>
                              <?php if(!isset($_SESSION['error']['causa'])): ?>
                                <input type="text" class="form-control" name ="sintoma" placeholder="Sintomas">
                              <?php else: ?>
                                <input type="text" class="form-control is-invalid" name ="sintoma" placeholder="Sintomas">
                              <?php endif?>
                            </div>

                          <div class="mt-5 d-none d-sm-inline-block">
                            <span class="text-justify text-muted lead">
                              <p>Introduce primero los datos solicitados en el formulario de arriba y luego presiona el botón de chat para que seas atendido por uno de nuestros médicos</p>
                            </span>
                          </div>
                        </div>

                        <div class="col-sm-12 my-3 d-block d-sm-none">
                        </div>

                        <!-- col -->
                        <div class="col-sm-12 col-md-7 align-self-center">
                          <div class="text-center my-1">
                            <button type ="submit" class="btn btn-outline-light">
                              <img class="img-fluid img-circle" src="<?=base_url?>dist/img/icon-chat.jpg" alt="Icon Phone" style="width: 40% !important; height: 50% !important">
                              <!-- style="width: 35% !important; height: 50% !important" -->
                                
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
        <?php unset($_SESSION['error']);?>
      </section>
      <!-- /.content -->
    