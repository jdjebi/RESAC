<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    @yield('extras_style')
  </head>
  <body>
    @include('nav')
    @yield('content')
    <script src="asset/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    @yield('scripts')
  </body>
</html>
