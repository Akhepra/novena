<?php

// sets time format in spanish
setlocale(LC_TIME, "es_ES");



$date = time();

// TESTING CODE

if (isset($_GET['d'])) {
  $date = mktime(0, 0, 0, 12, $_GET['d'], 2017);
}



$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$start = mktime(0, 0, 0, 12, 16, $year);

$daysTo = round(($start - $date) / (60 * 60 * 24));

// FECHA
$fecha = "";

$days = [
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

if ($month == 12 && $day > 15 && $day < 25) {
    $fecha = htmlentities(ucwords(strftime('%a, %b %e', $date)));
    $dias = htmlentities("Día ") . htmlentities($days[$day][0]);
} elseif ($month == 12 && $day > 24) {
    $dias = "Acab&oacute; de pasar";
} else {
    $dias = "Faltan " . $daysTo . " d&iacute;as";
}
