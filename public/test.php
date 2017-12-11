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
    body {
      font-size: .8em;
    }

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

  <article class="songs">
    <h2>Canciones</h2>
    <ul>
      <?php 
  
 
      
  
  

  
  
  
  
  
  
  
  
  
  
  

      ?>
    </ul>
  </article>


  <footer>
    <div class="next">
      <a href="http://www.akhepra.co" class="next_lk">dise&ntilde;ado por</a>
    </div>
  </footer>

</body>

</html>
