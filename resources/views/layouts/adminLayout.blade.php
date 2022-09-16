<!DOCTYPE html>
<html lang="{{$locale}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @lang('auth.brandname') @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}} ">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css' )}} ">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.min.css" integrity="sha512-doewDSLNwoD1ZCdA1D1LXbbdNlI4uZv7vICMrzxfshHmzzyFNhajLEgH/uigrbOi8ETIftUGBkyLnbyDOU5rpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  </head>

  <body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="" class="brand-link rounded" style="text-decoration: none;">
          <img src="{{ asset('images/logo.png') }}" alt=" Agency of IFAS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">@lang('auth.brandname')</span>
        </a>
        <div class="sidebar">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item  menu-open">
                <a class="nav-link" href="#">
                    <i class="nav-icon fa-solid fa-user"></i>
                    <p>
                      {{ Auth::user()->name }}
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('editSettings', ['locale' => $locale]) }}"  class="nav-link">
                      <i class="nav-icon fa-solid fa-gear"></i>
                      <p>
                        @lang('auth.settings')
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link logout-confirm" href="{{ route('logout') }}">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                          @lang('auth.logout')
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
              </li>

              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fa-sharp fa-solid fa-list"></i>
                  <p>
                    @lang('auth.post')
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{ route('createpost', ['locale' =>$locale]) }}" class="nav-link ">
                      <i class="nav-icon fas fa-cart-plus"></i>
                      <p>@lang('auth.addpost')</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('restore', ['locale' =>$locale])}}" class="nav-link ">
                      <i class="nav-icon fas fa-trash-restore"></i>
                      <p>@lang('auth.restore')</p>
                    </a>
                  </li>
                </ul>
              </li>


            </ul>
          </nav>
        </div>
      </aside>

      <div class="content-wrapper">
        @yield('content')
      </div>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>
    @include('sweetalert::alert')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src=" {{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }} "></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
    <script src="{{ asset('dist/js/adminlte.js') }} "></script>
    <script src="{{ asset('dist/js/demo.js') }} "></script>
    <script >
      $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
              ['style', ['style']],
              ['font', ['bold','italic', 'underline', 'clear']],
              ['fontname', ['fontname']],
              ['insert', ['link']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['view', ['fullscreen', 'help']],
            ],
        });

      });
      $(".nav-treeview .nav-item, .nav-link").each(function () {
        let location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if(link == location2){
            $(this).addClass('active');
        }
      });


      $(".nav-treeview, .nav-item, .nav-link, .btn").each(function () {
        let location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if(link == location2){
            $(this).addClass('btn-warning');
        }
      });
      $('.on-submit').on("click",function() {
        var form = $('form');
        form.submit(function(e) {
            $('.on-submit').attr('disabled', 'disabled');
            $('.on-submit').html('<i class="fa fa-spinner fa-spin"></i>');
        });
      });
     $('.delete-confirm').on('click', function (event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: 'Are you sure?',
            text: 'This post permanantly deleted!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
    });
     $('.logout-confirm').on('click', function (event) {
        event.preventDefault();
        swal({
            title: 'Are you sure?',
            text: 'Logout',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
              document.getElementById('logout-form').submit();
            }
          });
    });

    </script>
  </body>
</html>
