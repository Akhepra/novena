<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Novena de Aguinaldos Colombiana">
  <meta name="keywords" content="Novena">
  <meta name="author" content="Akhepra">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novena de Aguinaldos :: Colombia</title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo url_for('/css/normalize.css') ?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo url_for('/css/mystyle.css') ?>">
  <script type="text/javascript" src="<?php echo url_for('/js/vendor/jquery.js') ?>"></script>
  <script type="text/javascript" src="<?php echo url_for('/js/script.js') ?>"></script>
</head>

<body>
  <header>
    <div id="banner" class="novena">
      <?php require_once(PRIVATE_PATH . '/date.php'); ?>
      <div class="date"><?php echo $fecha ?></div>
      <div class="day"><?php echo $dias ?></div>
    </div>
  </header>