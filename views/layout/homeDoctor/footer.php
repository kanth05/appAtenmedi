  </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar --> 
<!-- footer -->
  <footer class="main-footer bg-success py-2">

  <div class="container-xs d-block d-sm-none">
    <div class="row justify-content-center">
      <div class="col-6 text-center border-right">
        <a href="<?=base_url?>doctor/operaciones" class="text-light">
          <span>
            <h3><i class="nav-icon fas fa-headset"></i></h3>
            Operaciones
          </span>
        </a>
      </div>
      <div class="col-6 text-center">
        <a href="<?=base_url?>doctor/perfil" class="text-light">
          <span>
            <h3><i class="nav-icon fas fa-address-book"></i></h3>
            Perfil
          </span>
        </a>
      </div>
    </div>
  </div>

  <div class="container d-none d-sm-inline pl-3">
    <strong>Copyright &copy;2020 <a class ="text-dark" href="http://www.hmoservisalud.com">HMO Servisalud</a>.</strong>
    Derechos reservados.
    <div class="float-right d-none d-sm-inline-block pr-4">
      <b>Version</b> 1.1
    </div>
  </div>
  </footer>
  <!-- /.footer -->

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?=base_url?>plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!--SweetAlert2 -->
  <script src="<?=base_url?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url?>dist/js/adminlte.min.js"></script>
  <!-- Services worker -->
  <script>let base_url = '<?=base_url?>';</script>
  <script src="<?=base_url?>app.js"></script>

  <script>
    //Configuración en jquery para activar los toast de bootstrap
    Swal.fire({
          title:'Llamada entrante',
          html: '<div class="text-white">'+
                '<a href ="<?=base_url?>doctor/solicitarVideo" class="btn btn-info mr-1">Atender</a>'+
                '<a class="btn btn-danger">Colgar</a></div>',
          position: 'top-start',
          toast: 'true',
          showConfirmButton: false,
          timer: false
        });
  </script>

</body>
</html>
