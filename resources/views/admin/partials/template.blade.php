@include('admin.partials.header')
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partials.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.partials.navbar')
        <!-- partial -->
        <div class="main-panel">

        @yield('content')
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.partials.footer')