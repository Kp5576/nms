
        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{asset('build/assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('build/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{asset('build/assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- STICKY js -->
        @vite('resources/assets/js/sticky.js')

        <!-- SIDEBAR JS -->
        <script src="{{asset('build/assets/plugins/sidebar/sidebar.js')}}"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('build/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/pscroll.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/pscroll-1.js')}}"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     

        <!-- DATA TABLE JS-->
        <script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
        @vite('resources/assets/js/table-data.js')
        
        @yield('scripts')

        