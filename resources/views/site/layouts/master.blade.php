<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>LandsHub - @yield('title')</title>
  <meta content="Landshub" name="description" />
  <meta content="Quocsuu" name="author" />
  <link rel="shortcut icon" type="image/png"  href="{{ URL::asset('assets/client/img/favicon.png') }}">
  @include('site.layouts.head')
</head>
<body>
  {{-- <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5df3b2ee43be710e1d21fb2c/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  <!-- MAIN PAGE WRAPPER --> --}}
  @if  (Route::getCurrentRoute()->uri() != '/')
  <div class="page sub-page ">
  @else
  <div class="page home-page">
  @endif
    <header class="hero @yield('header-css')">
      <div class="hero-wrapper">
        @include('site.layouts.tophead')
        @include('site.layouts.header')
        @include('site.layouts.settings')
      </div>
    </header>
    <section class="content">
      @yield('content')
    </section>
    <footer class="footer">
      @include('site.layouts.footer')
    </footer>
  </div>
  @include('site.layouts.footer-script')
  @include('site.layouts.form')

   <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
      <i class="fa fa-chevron-up"> </i> 
  </a>
</body>
</html>