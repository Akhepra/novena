<?php require_once("../private/initialize.php"); ?>
<?php 

$dia = isset($_GET['c']) ? $_GET['c'] : 1 ;

$json = file_get_contents('_js/consideraciones.json');
$consideraciones = json_decode($json, true);

?>

<!DOCTYPE html>

<html lang="es">

<head>
  <?php require_once(PRIVATE_PATH . "/head.php"); ?>
  <?php echo css('consideraciones') ?>
</head>

<body>
  <header>
    <div class="date-header">
      <?php echo $date_header ?>
    </div>
  </header>

  <div class="hero">
    <h1>Consideraciones para todos los d&iacute;as</h1>
  </div>

  <div class="chamfer"></div>
  <article>
    <h2 id="consideraciones">
      <?php echo $consideraciones[$dia]['name']; ?>
    </h2>
    <?php echo $consideraciones[$dia]['content']; ?>
  </article>


  <footer>
    <div class="next">
      <a href="oraciones.php?o=2" class="next_lk">Oraci&oacute;n a la Sant&iacute;sima Virgen</a>
    </div>
  </footer>

</body>

</html>
