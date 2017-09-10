<?php

// sets time format in spanish
setlocale(LC_TIME, "es_ES");


// TESTING CODE
//$date = mktime(0, 0, 0, 12, 16, 2017);

// COMMENTED OUT FOR TESTING
$date = time();

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$start = mktime(0, 0, 0, 12, 16, $year);

$daysTo = round(($start - $date) / (60 * 60 * 24));

// FECHA
$fecha = "";

$days = ["16"=>"primero",
 "17"=>"segundo",
 "18"=>"tercero",
 "19"=>"cuarto",
 "20"=>"quinto",
 "21"=>"sexto",
 "22"=>"séptimo",
 "23"=>"octavo",
 "24"=>"noveno"];

if ($month == 12 && $day > 15 && $day < 25) {
    $fecha = ucwords(strftime('%a, %b %e', $date));
    $dias = "D&iacute;a " . $days[$day];
} elseif ($month == 12 && $day > 24) {
    $dias = "Acab&ocute; de pasar";
} else {
    $dias = "Faltan " . $daysTo . " d&iacute;as";
}
