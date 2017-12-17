<?php

// sets time format in spanish
setlocale(LC_TIME, "es_ES.UTF-8");

// initialize date variable
$date = time();

////////////////////////////////////////// TESTING CODE

if (isset($_GET['d'])) {

  $test_date = strtotime(substr($_GET['d'], 0, 25));

} else {
  exit;
}

// process date parts
$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);

// hard copy
//$date = mktime(0, 0, 8, 12, 16, 2017);

// adjust year if it past december 24 of the same year
if ($month == 12 && $day > 24) {
  $year += 1;
}

// sets the starting date for the next novena and the days to 
$start = mktime(0, 0, 0, 12, 16, $year);
$end = mktime(23, 59, 59, 12, 24, $year);
$days_to = round(($start - $date) / (60 * 60 * 24));

// novena's names array
$novena = [
  "16"=>["primero", 1],
  "17"=>["segundo", 2],
  "18"=>["tercero", 3],
  "19"=>["cuarto", 4],
  "20"=>["quinto", 5],
  "21"=>["sexto", 6],
  "22"=>["séptimo", 7],
  "23"=>["octavo", 8],
  "24"=>["noveno", 9]
];


// analize date
// if today is part of novena sets info
if ($start < $date && $date < $end) {
  
  $todays_date = htmlentities(ucwords(strftime('%a, %b %e', $date)));
  $today_is = htmlentities("Día ") . htmlentities($novena[$day][0]);
  
  $graph = '';
  
  $left = $todays_date;
  $right = $today_is;
  
  $class = 'date-header';
  
} else {
  
  $number = ($days_to == 1) ? 'singular' : 'plural';
  
  $left = "";
  // how many days are missing
  $right = '<span>';
  $right .= $number == 'singular' ? 'Falta' : 'Faltan';
  $right .= ' </span><span>' . $days_to . '</span><span> ';
  $right .= $number == 'singular' ? 'd&iacute;a' : 'd&iacute;as';
  $right .= '</span>';
  $graph = '<svg id="pie"><path /></svg>';

  $class = 'almost';
  
}

$date_header = '<div class="date">' . $left . '</div>';
$date_header .= '<div class="day">'. $right . '</div>';

$_SESSION['date-header'] = $date_header;
