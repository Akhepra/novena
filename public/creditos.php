<?php require_once("../private/initialize.php"); ?>
<?php 

$json = file_get_contents('_js/villancicos.json');
$villancicos = json_decode($json, true);

?>

<!DOCTYPE html>

<html lang="es">

<head>
  <?php require_once(PRIVATE_PATH . "/head.php"); ?>
  <?php echo css('creditos') ?>

  <style>


  </style>
</head>

<body>
  <header>
    <div class="date-header">
      <?php echo $date_header ?>
    </div>
  </header>

  <div class="hero">
    <h1>Cr&eacute;ditos</h1>
  </div>

  <div class="chamfer"></div>
  <article>
    <h2>Contenido</h2>
    <p>Arreglada por la Reverenda Madre Mar&iacute;a Ignacia, Religiosa de la Orden de la Ense&ntilde;anza</p>
    <p>Gobierno Excelent&iacute;simo Arquidi&oacute;cesis de Medell&iacute;n</p>
    <p>Buenaventura, Obispo Auxiliar</p>
    <p>Vicario General</p>
    <p class="city_date">Medell&iacute;n, 21 de noviembre de 1952</p>
  </article>

  <article>
    <h2>Conservaci&oacute;n</h2>
    <p>Patricia Sanmiguel de Ayala</p>
  </article>

  <article>
    <h2>Canciones</h2>
    <ul class="songs">
      <?php 
      foreach (get_singers_amd_songs($villancicos) as $singer => $songs) {
        $output = '<li class="singer">';
        $output .= $singer;
        $output .= '<ul>';
        foreach ($songs as $song) {
          $output .= '<li>';
          $output .= $song;
          $output .= '</li>';
        }
        $output .= '</ul>';
        $output .= '</li>';
        
        echo $output;
      }
      ?>
    </ul>
  </article>

  <article>
    <h2>&Iacute;conos</h2>

    <section class="icons">
      <?php
      
      $icons_list = get_files_list('_icons');
      
      foreach ($icons_list as $icon) {
        
        echo '<div class="icon">'. file_get_contents('_icons/' . $icon)  .'</div>';
        
      }
      
      ?>
    </section>


    <div class="freepik">&Iacute;conos hechos por <a href="http://www.freepik.com" title="Freepik">Freepik</a> para <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> licenciados <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
  </article>


  <footer>
    <div class="next">
      <a href="http://www.akhepra.co" class="next_lk">dise&ntilde;ado por</a>
    </div>
  </footer>

</body>

</html>
