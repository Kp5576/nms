<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="">

		<!-- TITLE -->
		<title>NMS</title>

		<!-- Favicon -->
		<link rel="icon" href="{{asset('build/assets/images/brand/favicon.ico')}}" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link id="style" href="{{asset('build/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
       
        <!-- APP CSS & APP SCSS -->
        @vite(['resources/css/app.css' , 'resources/sass/app.scss'])

        @yield('styles')
        
	</head>

	<body class="login-img">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('build/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page bg-img">

        	@yield('content')

		</div>

		<!-- JQUERY JS -->
		<script src="{{asset('build/assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('build/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('build/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
		
		@yield('scripts')

        <!-- APP JS-->
		@vite('resources/js/app.js')
        <!-- END SCRIPTS -->

		@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         $(function() {
         var url = window.location;
                 // for single sidebar menu
                 $('ul.nav-sidebar a').filter(function() {
         return this.href == url;
         }).addClass('active');
                 // for sidebar menu and treeview
                 $('ul.nav-treeview a').filter(function() {
         return this.href == url;
         }).parentsUntil(".nav-sidebar > .nav-treeview")
                 .css({
                 'display': 'block'
                 })
                 .addClass('menu-open').prev('a')
                 .addClass('active');
         });
      </script>
      <script>
         $(document).ready(function() {
         $('#example1').DataTable({
         responsive: true,
         bPaginate: false,
         bLengthChange: false,
         bInfo: false,
         });
         });
      </script>
      <script type="text/javascript">
         $(document).on('click', '#btn-delete', function(e) {
         e.preventDefault();
         var form = $(this).closest("form");
         Swal.fire({
         title: 'Are you sure?',
                 text: "You will not be able to revert this!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#7367f0',
                 cancelButtonColor: '#82868b',
                 confirmButtonText: 'Yes, delete!'
         }).then((result) => {
         if (result.isConfirmed) {
         form.submit();
         }
         });
         });
      </script>
      <script>
         (function() {
         'use strict';
                 window.addEventListener('load', function() {
                 var forms = document.getElementsByClassName('needs-validation');
                         var validation = Array.prototype.filter.call(forms, function(form) {
                         form.addEventListener('submit', function(event) {
                         if (form.checkValidity() === false) {
                         event.preventDefault();
                                 event.stopPropagation();
                         }
                         form.classList.add('was-validated');
                         }, false);
                         });
                 }, false);
         })();
      </script>
		
	</body>
</html>
