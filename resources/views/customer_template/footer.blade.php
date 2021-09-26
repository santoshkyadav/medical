
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{url('customer/logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © Japware.com</p>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <!--<script src="{{url('assets/vendor/chart.js/Chart.min.js')}}"></script> -->
    <!--<script src="{{url('assets/vendor/datatables/jquery.dataTables.js')}}"></script>-->
    <!--<script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.js')}}"></script>-->

    <!-- Custom scripts for all pages-->
    <script src="{{url('assets/js/sb-admin.min.js')}}"></script>
    <script src="{{url('assets/js/customer.js')}}"></script>
    <!-- Demo scripts for this page-->
    <script src="{{url('assets/js/jquery.easyPaginate.js')}}"></script>
    
    <script type="text/javascript" src="{{url('assets/js/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/sweetalert.css')}}">

  </body>

</html>