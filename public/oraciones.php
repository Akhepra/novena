<?php require_once("../private/initialize.php"); ?>
<?php 

$oracion = isset($_GET['o']) ? ($_GET['o']) : 4 ;


$json = file_get_contents('_js/oraciones.json');
$oraciones = json_decode($json, true);
$short_name = $oraciones[$oracion]['short_name'];
$name = $oraciones[$oracion]['name'];
$content = $oraciones[$oracion]['content'];
$close = $oraciones[$oracion]['close'];
$next = $oraciones[$oracion]['next'];

if ($short_name === 'o_san_jose') {
  $next = 'gozos.php';
  $next_name = 'Gozos';  
} elseif ($short_name === 'o_divino_nino') {
  $next = '';
  $next_name = '';
} else {
  $next_name = $oraciones[$next]['name'];
  $next = 'oraciones.php?o=' . $next;
}

?>


<!DOCTYPE html>

<html lang="es">

<head>
  <?php require_once(PRIVATE_PATH . '/head.php'); ?>
  <?php echo css('oraciones') ?>
  <?php echo css($short_name) ?>
</head>

<body>
  <header>
    <div class="date-header">
      <?php echo $date_header ?>
    </div>
  </header>


  <div class="hero">
    <h1>
      <?php echo $name; ?>
    </h1>
  </div>

  <div class="chamfer"></div>

  <article class="<?php echo $short_name; ?>">
    <p>
      <?php echo $content; ?>
    </p>

    <p class="pray" id="prayer">
      <?php echo $close; ?>
    </p>
  </article>

  <footer>

    <?php

if ($short_name !== 'o_divino_nino') { 
  
  $output = '<div class="next" id="prayer">';
  $output .= '<a href="';
  $output .= $next . '">';
  $output .= $next_name;
  $output .= '</a></div>';
  
  echo $output;

} else {
  
   $output = '<div class="next up">';
   $output .= '<a class="next_lk" href="villancicos.php">';
   $output .= 'Villancicos</a></div>';
   $output .= '<div class="next down">';
   $output .= '<a href="creditos.php">Cr&eacute;ditos</a>';
   $output .= '</div>';
  
    echo $output;
}

?>

  </footer>

</body>

</html>
