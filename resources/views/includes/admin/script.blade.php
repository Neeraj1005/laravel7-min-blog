<script src="http://unpkg.com/turbolinks"></script>

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.j')}}s"></script>
    <!-- InputMask -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2({
          allowClear: true,
          placeholder: {
            id: '0', // the value of the option
            text: 'Select an option'
          },
          maximumInputLength: 2,//For minimum search result
          // minimumResultsForSearch: -1
          //For hiding the search box and replace -1 with other value it will show search results

        });

        //Date range picker changed into single datepicker using singleDatePicker: true, do false if range needed
        $("#reservation").daterangepicker({
          timePicker: false,
          singleDatePicker: true,
        });

        //Timepicker
        $("#timepicker").datetimepicker({
          format: "LT",
        });

      });
    </script>
