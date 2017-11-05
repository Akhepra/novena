<?php require_once("../../private/novena/initialize.php"); ?>
<?php 

$oracion = 1 ;

$json = file_get_contents('js/oraciones.json');
$oraciones = json_decode($json, true);

?>
<?php require_once("../../private/novena/header.php"); ?>
<?php

if ($todays_date === '') {
  $consideraciones = create_consideraciones_list($novena);
} else {
  $consideraciones = '<div class="next"><a class="next_lk" href="consideraciones.php?c=';
  $consideraciones .= $days[$day][1];
  $consideraciones .= '">Consideraciones para el ';
  $consideraciones .= strtolower($dias);
  $consideraciones .= '</a></div>';
}

?>

  <div class="hero">
    <h1>Novena de Aguinaldos</h1>
  </div>

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

  <div class="chamfer"></div>

  <?php echo $consideraciones ?>

  <?php require_once("../../private/novena/footer.php"); ?>
