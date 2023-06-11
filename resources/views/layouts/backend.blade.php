<!DOCTYPE html>
<html lang="en">
    @include('parts.backend.head')
    <body class="sb-nav-fixed">
        @include('parts.backend.header')
        <div id="layoutSidenav">
            @include('parts.backend.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @include('parts.backend.page_title')
                        @yield('content')
                    </div>
                </main>
                @include('parts.backend.footer')
            </div>
        </div>
        <script src="{{asset('backend/js/jquery-3.5.1.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
        <script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
             $('#lfm').filemanager('image');
          </script>
        @yield('scripts')
    </body>
</html>
