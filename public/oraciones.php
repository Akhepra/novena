<?php require_once("../private/initialize.php"); ?>
<?php 

$oracion = isset($_GET['o']) ? ($_GET['o']) : 2 ;


$json = file_get_contents('js/oraciones.json');
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
<?php require_once("../private/header.php"); ?>


<div class="hero">
  <h1>Novena de Aguinaldos</h1>
</div>
<article class="<?php echo $short_name; ?>">
  <h2>
    <?php echo $name; ?>
  </h2>
  <p>
    <?php echo $content; ?>
  </p>

  <p class="pray">
    <?php echo $close; ?>
  </p>
</article>

<?php

if ($short_name !== 'o_divino_nino') { 
  
  $output = '<div class="chamfer"></div>';
  $output .= '<div class="next" id="prayer">';
  $output .= '<a href="';
  $output .= $next . '">';
  $output .= $next_name;
  $output .= '</a></div>';
  
  echo $output;

} else {
  echo '<div>Hola</div>';
}

?>

  <?php require_once("../private/footer.php"); ?>
