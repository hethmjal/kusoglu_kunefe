<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html dir="rtl" lang="ar">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    


    <title class="title">kuşoğlu künefe</title>
    <link rel="shortcut icon" class="link" href="{{asset('myfront/images/kusoglu-logo.png')}}" type="image/x-icon">


    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
    @stack('css')
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">الرئيسية</a>
          </li>
        
        </ul>
    
      
    
        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto-navbav">
          <!-- Messages Dropdown Menu -->
          {{--  <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li> --}}
          <!-- Notifications Dropdown Menu -->
          @php
           $user =App\Models\User::first();
           $notificationes = $user->unreadNotifications;
          @endphp
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{$notificationes->count()}}</span>
              
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">الاشعارات</span>
              <div class="dropdown-divider"></div>
              <div class="notify">
                @foreach ($notificationes as $notify)
                    
                <a href="{{$notify->data['action']}}" class='dropdown-item notification'>  {{$notify->data['title']}}
                   <p>{{$notify->data['body']}}</p>
                   <span class='text-secondary'>{{$notify->created_at->diffForHumans()}}</span>
                  </a> 
                <hr>
                @endforeach

              </div>

             

              <div class="dropdown-divider"></div>
              <a href="{{route('order.manage')}}" class="dropdown-item dropdown-footer">عرض كافة الاشعارات</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('dist/img/kusoglu-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">kuşoğlu künefe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link @if(request()->routeis('product.manage') || request()->routeis('product.add')) active @endif">
              
              <i class="nav-icon fas fa-birthday-cake"></i>
              <p>
                المنتجات
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.manage')}}" class="nav-link @if(request()->routeis('product.manage')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض المنتجات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.add')}}" class="nav-link @if(request()->routeis('product.add')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة منتج جديد</p>
                </a>
              </li>
            </ul>

           
          </li>

          <li class="nav-item has-treeview menu-open mt-3">
            <a href="" class="nav-link @if(request()->routeis('category.manage') || request()->routeis('category.add')) active @endif ">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                 التصنيفات
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.manage')}}" class="nav-link @if(request()->routeis('category.manage')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض التصنيفات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.add')}}" class="nav-link @if(request()->routeis('category.add')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة صنف جديد</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('order.manage')}}" class="nav-link @if(request()->routeis('order.manage')) active @endif">
              <i class="far fa-circle nav-icon"></i>
              <p>الطلبات</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="toast bg-success text-light mt-2 mr-3" data-autohide="false">
      <div class="toast-header">
        <strong class="mr-auto text-primary"> طلب جديد</strong>
       
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      </div>
      <a href="{{route('order.manage')}}">
      <div class="toast-body">
      
      </div>
    </a>
    </div>
    <!-- Main content -->
    <div class="content">
      
   
      <div class="container-fluid">
       
       @yield('content')
        


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<script>
  $(document).ready(function(){
   
  });
  </script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    var i = 0;
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('df27f43402a4858b2483', {
      cluster: 'ap2',
      authEndpoint: "/broadcasting/auth"
    });

    var channel = pusher.subscribe('private-App.Models.User.{{Auth::id()}}');
    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
    //  alert(data.title);
    
      $('.badge').removeClass('d-none');
     //var count = $('.badge').text();
     // $('.badge').html(1 + Number(count) );
      $('.badge').html(function() {
             return (1 + Number($('.badge').text()));
           });

      $('.title').prepend('هناك طلب!!');

    

      $('.notify').prepend("<a href='" +data.action+ "'class='dropdown-item notification'>" + data.title + "<p>"+ data.body +"</p>" +"<span class='text-secondary'>"+data.created_at+"</span>" + "</a> <hr>" )
      $('.toast').toast('show');
      $('.toast-body').append( "<p>"+ data.body +"</p>");

      const audio = new Audio("{{asset('not.mp3')}}");
       audio.play(); 
    });

    
  </script>

  @stack('js')
</body>
</html>
