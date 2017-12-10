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
    <meta name="description" content="Oraci&oacute;n al Padre nuestro">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Akhepra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oraci&oacute;n al Padre nuestro</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../_css/prayer.css">
  </head>

  <body>
    <h3>Padre nuestro</h3>
    <p class="action"><em>Reza</em></p>
    <p>Padre nuestro,</p>
    <p>que est&aacute;s en el cielo,</p>
    <p>santificadosea tu Nombre;</p>
    <p>venga a nosotros tu reino;</p>
    <p>h&aacute;gase tu voluntad en la tierra como en el cielo.</p>
    <p class="action"><em>Responso</em></p>
    <p class="answer">Danos hoy nuestro pan de cada d&iacute;a;</p>
    <p class="answer">perdona nuestras ofensas como tambi&eacute;n nosotros perdonamos a los que nos ofenden;</p>
    <p class="answer">no nos dejes caer en la tentaci&oacute;n,</p>
    <p class="answer">y l&iacute;branos del mal.</p>
    <?php
  
  if ($close) {
    echo '<a class="back" href="' . url_for($previous) . '#prayer">volver a la Novena</a>';
  }
  
  ?>
  </body>

  </html>
