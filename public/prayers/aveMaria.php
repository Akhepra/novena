<?php require_once("../../private/initialize.php"); ?>
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
    <meta name="description" content="Oraci&oacute;n a la V&iacute;rgen Mar&iacute;a">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Akhepra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oraci&oacute;n a la V&iacute;rgen Mar&iacute;a</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/prayer.css">
  </head>

  <body>
    <h3>Ave Mar&iacute;a</h3>
    <p class="action"><em>Reza</em></p>
    <p>Dios te salve Mar&iacute;a</p>
    <p>lena eres de gracias</p>
    <p>el Se&ntilde;or est&aacute; contigo;</p>
    <p>bendita t&uacute; eres entre todas las mujeres,</p>
    <p>y bendito es el fruto de tu vientre,</p>
    <p>Jes&uacute;s.</p>
    <p class="action"><em>Responso</em></p>
    <p class="answer">Santa Mar&iacute;a,</p>
    <p class="answer">Madre de Dios,</p>
    <p class="answer">ruega por nosotros, pecadores,</p>
    <p class="answer">ahora y en la ahora de nuestra muerte.</p>
    <p class="amen">Am&eacute;n</p>
    <?php
  
  if ($close) {
    echo '<a class="back" href="' . url_for($previous) . '#prayer">volver a la Novena</a>';
  }
  
  ?>
  </body>

  </html>
