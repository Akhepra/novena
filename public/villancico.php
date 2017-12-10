<?php require_once("../private/initialize.php"); ?>
<?php 

$villancico = $_GET['v'] ?? 1 ;

$json = file_get_contents('_js/villancicos.json');
$villancicos = json_decode($json, true);
$villancico = $villancicos[$villancico];

//$inst_file = PUBLIC_PATH . "/audio/" . $villancico['instrumental'] . '.mp3';
//$vocal_file = PUBLIC_PATH . "/audio/" . $villancico['vocal'] . '.mp3';
$inst_file = "audio/" . $villancico['instrumental'] . '.mp3';
$vocal_file = "audio/" . $villancico['vocal'] . '.mp3';

?>

<!DOCTYPE html>

<html lang="es">

<head>
  <?php require_once(PRIVATE_PATH . "/head.php"); ?>
  <?php echo css('villancico') ?>
  <?php echo script('villancico') ?>
</head>

<body>
  <header>
    <div class="date-header">
      <?php echo $date_header ?>
    </div>
  </header>

  <div class="hero">
    <h1>
      <?php echo str_replace("&nbsp;"," ",$villancico['name']); ?>
    </h1>
  </div>

  <div class="chamfer"></div>

  <article>
    <?php echo $villancico['lyrics']; ?>
  </article>

  <footer>

    <?php if (file_exists($vocal_file)) { ?>
    <div class="next">
      <input class="player play" type="button" data-src="<?php echo $vocal_file; ?>" value="Vocal">
    </div>
    <?php } ?>

    <?php if (file_exists($inst_file)) { ?>
    <div class="next">
      <input class="player play" type="button" data-src="<?php echo $inst_file; ?>" value="Instrumental">
    </div>
    <?php } ?>

  </footer>

</body>

</html>
