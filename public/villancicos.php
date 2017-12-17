<?php require_once("../private/initialize.php"); ?>
<?php 

$json = file_get_contents('_js/villancicos.json');
$villancicos = json_decode($json, true);

?>

<!DOCTYPE html>

<html lang="es">

<head>
  <?php require_once(PRIVATE_PATH . "/head.php"); ?>
  <?php echo css('villancicos') ?>
</head>

<body>
  <header>
    <div class="date-header">
      <?php echo $date_header ?? $_SESSION['date-header'] ?>
    </div>
  </header>

  <div class="hero">
    <h1>Villancicos</h1>
  </div>

  <div class="chamfer"></div>

  <article class="list">
    <ul>
      <?php 
      foreach($villancicos as $key => $villancico) {    
        $output = '<li><a href=" villancico.php?v=' . $key . ' ">';
        $output .= $villancico['name'];
        $output .= '</a></li>';
        echo $output;
      }
      ?>
    </ul>
  </article>


  <footer>
    <div class="next down">
      <a href="creditos.php " class="next_lk ">Cr&eacute;ditos</a>
    </div>
  </footer>

</body>

</html>
