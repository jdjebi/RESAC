<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      <?php if(isset($title)): ?>
        <?= $title ?>
      <?php elseif(isset($title2)): ?>
        RESAC - <?= $title ?>
      <?php else: ?>
        RESAC
      <?php endif ?>
    </title>
    <link rel="stylesheet" href="asset/css/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/fontawsome/all.css">

    <style media="screen">
      .u-photo{
        width: 120px;
        height: 120px;
        background: #eee;
        border-radius: 100%;
        position: relative;
      }

      .u-photo .eye{
        border: 1px solid #dbdada
      }

      .u-photo .u-photo-eye1{
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 100%;
        position: absolute;
        left: 10%;
        top: 38%;
      }

      .u-photo .u-photo-eye2{
        width: 30px;
        height: 30px;
        background: #fff;
        border-radius: 100%;
        position: absolute;
        right: 10%;
        top: 39%
      }
    </style>

  </head>
  <body>
