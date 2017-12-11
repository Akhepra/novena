<?php require_once("../private/initialize.php"); ?>
<?php 

$oracion = 1 ;

$json = file_get_contents('_js/oraciones.json');
$oraciones = json_decode($json, true);

if ($class == 'almost') {
  $consideraciones = create_consideraciones_list($novena);
} else {
  $consideraciones = '<div class="next up"><a class="next_lk" href="consideraciones.php?c=';
  $consideraciones .= $novena[$day][1];
  //$consideraciones .= '">Consideraciones para el ';
  $consideraciones .= '">';
//  $consideraciones .= strtolower($today_is);
  $consideraciones .= $today_is;
  $consideraciones .= '</a></div>';
}

?>

<!DOCTYPE html>

<html lang="es">

<head>
  <?php require_once(PRIVATE_PATH . '/head.php'); ?>
  <?php echo css('index') ?>
  <?php if ($class == 'date-header') {echo css('novena');} ?>
  <?php echo script('index') ?>
</head>

<body>
  <header>

    <div class="<?php echo $class ?>">
      <?php echo $date_header ?>
      <?php echo $graph ?>
    </div>

  </header>

  <div class="hero">
    <h1><span>Novena</span> <span>de Aguinaldos</span></h1>
  </div>

  <div class="chamfer"></div>

  <article class="<?php echo $oraciones[$oracion]['short_name']; ?>">
    <h2>
      <?php echo $oraciones[$oracion]['name']; ?>
    </h2>
    <p>
      <?php echo $oraciones[$oracion]['content']; ?>
    </p>
    <p class="pray" id="prayer">
      <?php echo $oraciones[$oracion]['close']; ?>
    </p>
  </article>



  <footer>
    <?php echo $consideraciones ?>
    <div class="next down">
      <a href="villancicos.php">Villancicos</a>
    </div>
  </footer>

</body>

</html>
