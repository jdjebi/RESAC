<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Template · Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>
  <body>
  @include('admin.nav2')
<div class="container-fluid">
  <div class="row">
    @include('admin.flash.side_nav')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      @include('admin.flash.main_creator')
    </main>
  </div>
</div>

</html>
