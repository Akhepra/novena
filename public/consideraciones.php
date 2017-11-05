<?php require_once("../private/initialize.php"); ?>
<?php 

$dia = isset($_GET['c']) ? $_GET['c'] : '' ;

$json = file_get_contents('js/consideraciones.json');
$consideraciones = json_decode($json, true);

?>
<?php require_once("../private/header.php"); ?>


  <div class="hero">
    <h1>Novena de Aguinaldos</h1>
  </div>
  <article>
    <h2 id="consideraciones"><?php echo $consideraciones[$dia]['name']; ?></h2>
    <?php echo $consideraciones[$dia]['content']; ?>
  </article>
  
  <div class="chamfer"></div>
  
  <div class="next"><a href="oraciones.php?o=2" class="next_lk">Oraci&oacute;n a la Sant&iacute;sima Virgen</a></div>
  
<?php require_once("../private/footer.php"); ?>
 