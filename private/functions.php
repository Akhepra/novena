<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  // COMMENT FOR DEPLOY
  return WWW_ROOT . "/public" . $script_path;
  
  return WWW_ROOT . $script_path;
}

function create_consideraciones_list($days) {
  
  $output = '<article class="list"><h2>Consideraciones para todos los d&iacute;as</h2><ul>';

  foreach ($days as $key => $value) {
    $output .= '<li><a href="consideraciones.php?c=';
    $output .= $value[1];
    $output .= '">D&iacute;a&nbsp;';
    $output .= $value[0];
    $output .= '</a></li>';
  }
  $output .= '</ul></article>';

  return $output;
}


function css($filename) {
  
  $output = '<link rel="stylesheet" type="text/css" media="screen"';
  $output .= 'href="';
  $output .= url_for('/_css/'. $filename . '.css">');
  
  return $output;
  
}


function script($filename) {
  
  $output = '<script type="text/javascript" src="';
  $output .= url_for('/_js/'. $filename . '.js"></script>');
  
  return $output;
  
}


function get_files_list($folder) {
  $complete_file_list = scandir($folder);
  //remove trash
  $file_list = array_diff($complete_file_list, ['.', '..']);
  return $file_list;
}


function get_singers_amd_songs($villancicos) {

  $singers = [];
  foreach ($villancicos as $villancico) {
    $singers[] = $villancico['vocal_credits'];
    $singers[] = $villancico['instrumental_credits'];
  }

  $unique_singers = array_unique($singers);

  sort($unique_singers);

  $songs_list = get_files_list('audio');
  $singers_and_songs = [];

  foreach ($unique_singers as $singer) {

    $songs =[];

    foreach ($villancicos as $villancico) {

      if ($villancico['vocal_credits'] === $singer && in_array($villancico['vocal'] . '.mp3', $songs_list)) { 
        $songs[] = $villancico['name'] . ' - vocal';
      }

      if ($villancico['instrumental_credits'] === $singer && in_array($villancico['instrumental'] . '.mp3', $songs_list)) { 
        $songs[] = $villancico['name'] . ' - instrumental';
      }

    }

    if (!empty($songs)) {
      $singers_and_songs[$singer] = $songs;
    }

  }

  return $singers_and_songs;
}
