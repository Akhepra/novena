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

  <article class="songs">
    <h2>Canciones</h2>
    <ul>
      <?php 
      foreach($villancicos as $key => $villancico) {
        $inst_file = "audio/" . $villancico['instrumental'] . '.mp3';
        $vocal_file = "audio/" . $villancico['vocal'] . '.mp3';
        
        if (file_exists($vocal_file) || file_exists($inst_file)) {
          $output = "";
          
          if (file_exists($vocal_file)) {
            $output .= '<li class="song"><ul>';
            $output .= '<li>' . str_replace("_"," ", $villancico['credit_vocal']) . '</li>';
            $output .= '<li>' . str_replace("&nbsp;"," ",$villancico['name']) . ' - vocal</li>';
            $output .= '</ul></li>';
          }
          if (file_exists($inst_file)) {
            $output .= '<li class="song"><ul>';
            $output .= '<li>' . str_replace("_"," ", $villancico['credit_inst']) . '</li>';
            $output .= '<li>' . str_replace("&nbsp;"," ",$villancico['name']) . ' - instrumental</li>';
            $output .= '</ul></li>';
          }
          echo $output;
        }
      }
      ?>
    </ul>
  </article>

  <article>
    <h2>Iconos</h2>
    <p>Lista en construcci&oacute;n</p>
  </article>


  <footer>
    <div class="next">
      <a href="www.akhepra.co" class="next_lk">Akhepra</a>
    </div>
  </footer>

</body>

</html>
