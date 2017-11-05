<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  // COMMENT FOR DEPLOY
  return WWW_ROOT . "/public" .$script_path;
  
  return WWW_ROOT . $script_path;
}

function create_consideraciones_list($days) {
  
  $output = '<article><h2>Consideraciones para todos los d&iacute;as</h2><ul>';

  foreach ($days as $key => $value) {
    $output .= '<li><a href="consideraciones.php?c=';
    $output .= $value[1];
    $output .= '">D&iacute;a ';
    $output .= $value[0];
    $output .= '</a></li>';
  }
  $output .= '</ul></article>';

  return $output;
}

?>
