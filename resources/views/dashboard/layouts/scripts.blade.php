  <!--   Core JS Files   -->
  <script src="{{ asset ('js/dashboard/core/jquery.min.js')}}"></script>
  <script src="{{ asset ('js/dashboard/core/popper.min.js')}}"></script>
  <script src="{{ asset ('js/dashboard/core/bootstrap-material-design.min.js')}}"></script>
  <script src="{{ asset ('js/dashboard/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset ('js/dashboard/plugins/moment.min.js')}}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset ('js/dashboard/plugins/sweetalert2.js')}}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset ('js/dashboard/plugins/jquery.validate.min.js')}}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset ('js/dashboard/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset ('js/dashboard/plugins/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset ('js/dashboard/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset ('js/dashboard/plugins/jquery.dataTables.min.js')}}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset ('js/dashboard/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset ('js/dashboard/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset ('js/dashboard/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset ('js/dashboard/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset ('js/dashboard/plugins/nouislider.min.js')}}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset ('js/dashboard/plugins/arrive.min.js')}}"></script>
  {{-- <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chartist JS -->
  <script src="{{ asset ('js/dashboard/plugins/chartist.min.js')}}"></script> --}}
  <!--  Notifications Plugin    -->
  <script src="{{ asset ('js/dashboard/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset ('js/dashboard/material-dashboard.js')}}"></script>
  <!-- Chart JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  
  <script>
    $(document).ready(function() {
      md.initDashboardPageCharts();
      
    });
  </script>
  
  <script>
    // function Edit POST
    $(document).on('click', '.edit-modal', function(event) {
      event.preventDefault();
      $('#footer_action_button').text(" Update Post");
      $('#footer_action_button').addClass('glyphicon-check');
      $('#footer_action_button').removeClass('glyphicon-trash');
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('Add AddOns');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      $('#myModal').modal('show');
    });
    
    var addOnId = [];
    
    $('body').on('change', '.addons', function(event){
      var idsArr = [];
      addOnId = [];
      var  total = 0;   
      var total_option=[];   
      $('#addons').find('input[type=checkbox]:checked').each(function() {
        idsArr .push($(this).data('price'));
        total_option .push($(this).data('option'));
        addOnId .push($(this).data('addonid'));
      });
      for(var i=0;i<idsArr.length;i++){
        total = total + idsArr[i];
      }
      $("#price").html("Php " + total);
      document.getElementById("total_price").val = total;
      document.getElementById("total_option").val = total_option.toString();
      
    });
    
  </script>
  
  <script>
    $(document).ready(function(){
      function fetch_data(){
        $.ajax({
          url:"/reservations/fetch_data",
          dataType:"json",
          success:function(data){
            
          }
        })
      }
    });
  </script>
  
  @if(request()->route()->getName() == 'record.revenue' )
  @include('dashboard.layouts.monthly_chart')
  @endif

  @if(request()->route()->getName() == 'dashboard.index' )
  @include('dashboard.layouts.mychart')
  @endif