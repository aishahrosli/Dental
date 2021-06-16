 

<!- CSS LINK --> 
 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../src/plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../src/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../src/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../src/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../src/dist/css/adminlte.min.css">


<!-- JQUERY LINK -->

    <!-- jQuery -->
    <script src="../src/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="../src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 -->
    <script src="../src/plugins/select2/js/select2.full.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="../src/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../src/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../src/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../src/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../src/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../src/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../src/plugins/jszip/jszip.min.js"></script>
    <script src="../src/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../src/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../src/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../src/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../src/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- InputMask -->
    <script src="../src/plugins/moment/moment.min.js"></script> 

    <!-- date-range-picker -->
    <script src="../src/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap color picker -->
    <script src="../src/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../src/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Bootstrap Switch -->
    <script src="../src/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- BS-Stepper -->
    <script src="../src/plugins/bs-stepper/js/bs-stepper.min.js"></script>

    <!-- dropzonejs -->
    <script src="../src/plugins/dropzone/min/dropzone.min.js"></script>


    <!-- AdminLTE App -->
    <script src="../src/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../src/dist/js/demo.js"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


     

    
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
   
   function goBack() {
  window.history.back()
}

</script>
