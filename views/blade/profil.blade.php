@extends('page')

@section('extras_style')
  @include('profil.style')
@endsection

@section('content')

<div class="container mt-5">
  @include("flash");
</div>

<?php if ($show_portofolio): ?>

  <?php require "views/profil/visitor.php" ?>

<?php else: ?>

  <?php require "views/profil/user.php" ?>

<?php endif ?>

@endsection
