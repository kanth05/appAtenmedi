
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <!-- Tarjeta donde va el botón de pánico -->
              <div class="card card-info card-outline" style="height:75vh !important">
                <div class="card-body box-profile">

                  <section class="content">

                    <div class="container-fluid">
                      <div class="row">
                        
                        <!-- col  -->
                        <div class="col-12">
  
                          <div class="card card-info ">
                            <div class="card-header">
                              <h3 class="card-title ">Perfil del usuario</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                              <div class="card-body pb-0">
                                <div class="form-group">
                                  <label>Usuario:  </label>
                                 <span> <?= $_SESSION['identity']['nombre']?> </span> 
                                </div>
                                <div class="form-group">
                                  <label>Cédula: </label>
                                  <span> V-<?=$_SESSION['identity']['cedula']?> </span>
                                </div>
                                <div class="form-group">
                                  <label>Correo: </label>
                                  <span><?=$_SESSION['identity']['correo']?> </span>
                                </div>
                                <div class="form-group">
                                  <label>Compañia: </label>
                                  <span><?=$_SESSION['identity']['compania']?> </span>
                                </div>
                                <hr>
                                <div class="form-group">
                                  <label>Producto adquirido: </label>
                                  <span> AMD básico </span>
                                </div>
                                <div class="form-group">
                                  <label>Estado del servicio: </label>
                                  <span> Disponible </span>
                                </div>
                              </div>
                            </form>

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
    