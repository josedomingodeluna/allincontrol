<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

    <title></title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css')}}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.parts.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.parts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <!-- @include('admin.parts.footer') -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->

	<!-- Vendor JS -->
	<script src="{{ asset('admin/js/vendors.min.js') }}"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{ asset('admin/js/pages/data-table.js')}}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('admin/js/template.js') }}"></script>
	<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch(type){
        case 'info':
          toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
          toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
          toastr.error(" {{ Session::get('message') }} ");
        break; 
      }
    @endif 
  </script>
    
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

  @if (session('deleted') == 'yes')
  <script>
    Swal.fire(
      'Borrado!',
      'Tu registro a sido borrado.',
      'success'
      )
  </script>
  @elseif (session('deleted') == 'no')
  <script>
    Swal.fire(
      'Oops!',
      'No lo puedo borrar, esta siendo ocupado por otros registros',
      'error'
      )
  </script>
  @endif
  <script type="text/javascript">
  $(function(){
    $(document).on('click', '[name="delete"]', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
        title: 'Estas seguro?',
        text: "No se podra revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#62b9c2',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borralo!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link;
        }
      })

    })
  });
  </script>
  <script type="text/javascript">
  $(function(){
    $(document).on('click', '[name="choise"]', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
        title: 'Elegir?',
        text: "Estos son los datos que apareceran en el documento!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#62b9c2',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link;
        }
      })

    })
  });
  </script>
</body>
</html>
