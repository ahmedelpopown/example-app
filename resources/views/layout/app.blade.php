@include('layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('layout.nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('layout.header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        @include('layout.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout.scripts')
</body>

</html>