<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin - Quản lý</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" type="image/png"  href="{{ URL::asset('assets/client/img/favicon.png') }}">
        @include('admin.layouts.head')
    </head>
<body>
    <div id="wrapper">
         @include('admin.layouts.header')
         @include('admin.layouts.sidebar')
         <div class="content-page">  
            <div class="content">
                <div class="container-fluid">
                   @include('admin.layouts.settings')
                   @yield('content')
                </div> 
            </div> 
        </div> 
        @include('admin.layouts.footer')  
        @include('admin.layouts.footer-script')  
    </div> 
    </body>
</html>