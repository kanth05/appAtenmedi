
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <!-- Tarjeta donde va el botón de pánico -->
              <div class="card card-info card-outline" style="height:auto!important">
                <div class="card-body box-profile">

                  <section class="content">

                    <div class="container-fluid">
                      <div class="row">
                        
                        <!-- col  -->
                        <div class="col-12">
  
                          <div class="card card-info ">
                            <div class="card-header">
                              <h3 class="card-title ">Perfil del doctor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                              <div class="card-body pb-0">
                                <div class="form-group">
                                  <label>Usuario:  </label>
                                 <span> <?= $_SESSION['identityDoctor']['nombre']?> </span> 
                                </div>
                                <div class="form-group">
                                  <label>Cédula: </label>
                                  <span> V-<?=$_SESSION['identityDoctor']['cedula']?> </span>
                                </div>
                                <div class="form-group">
                                  <label>Correo: </label>
                                  <span><?=$_SESSION['identityDoctor']['correo']?> </span>
                                </div>
                                <div class="form-group">
                                  <label>Cargo: </label>
                                  <span><?=$_SESSION['identityDoctor']['cargo']?> </span>
                                </div>
                                <hr>
                                <div class="form-group">
                                  <label>Estado: </label>
                                  <span> <?=$_SESSION['identityDoctor']['status']?> </span>
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
    