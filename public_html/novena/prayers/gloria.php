<?php require_once("../../../private/novena/initialize.php"); ?>
<?php

$close = true;

if (isset($_SERVER['HTTP_REFERER'])) {
  $previous = substr(strrchr($_SERVER['HTTP_REFERER'], '/'), 1);
} else {
  $close = false;
}

?>

  <!doctype html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Oraci&oacute;n Gloria al Padre">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Akhepra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oraci&oacute;n Gloria al Padre</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/prayer.css">
  </head>

  <body>
    <h3>Gloria al Padre</h3>
    <p class="action"><em>Reza</em></p>
    <p>Gloria al Padre,</p>
    <p>y al Hijo,</p>
    <p>y al Esp&iacute;ritu Santo.</p>
    <p class="action"><em>Responso</em></p>
    <p class="answer">Como era en el principio,</p>
    <p class="answer">ahora y siempre,</p>
    <p class="answer">y por los siglos de los siglos.</p>
    <p class="amen"><em>Am&eacute;n</em></p>
    <?php
  
  if ($close) {
    echo '<a class="back" href="' . url_for($previous) . '#prayer">volver a la Novena</a>';
  }
  
  ?>
  </body>

  </html>
