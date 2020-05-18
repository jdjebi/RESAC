<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/imgs/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/imgs/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/imgs/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('asset/imgs/icons/site.webmanifest') }}">
    <title>
      @if(isset($title))
        {{ $title }}
      @elseif(isset($title2))
        RESAC - {{ $title2 }}
      @else
        RESAC
      @endif
    </title>
    <link rel="stylesheet" href="asset/css/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/fontawsome/all.css">
    <link rel="stylesheet" href="{{ asset('asset/mobile/css/main.css') }}">
    <style media="screen">
      body{
          padding-top: 70px;
      }
      .resac-logo-25{
        font-size: 25px
      }
      .resac-logo-font{
        font-family: leckerli-one;
      }
      @@font-face {
        font-family: "leckerli-one";
        src: url({{ asset("asset/fonts/Leckerli_One/LeckerliOne-Regular.ttf") }});
      }
    </style>
    @yield('extras_style')
  </head>
  <body>
    @include('app.nav')
    @yield('content')
    @if(Auth::is_admin_logged())
      @include('app.mobile-nav992')
    @endif
    <script src="asset/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    @yield('scripts')
  </body>
</html>
