<?php

// sets time format in spanish
setlocale(LC_TIME, "es_ES");

// initialize date variable
$date = time();

// TESTING CODE
// if url has variable "d" simulates a novena day
if (isset($_GET['d'])) {
  $date = mktime(0, 0, 0, 12, $_GET['d'], 2017);
}

// process date parts
$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$start = mktime(0, 0, 0, 12, 16, $year);
$daysTo = round(($start - $date) / (60 * 60 * 24));

// initializes today's date
$todays_date = "";

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
if ($month == 12 && $day > 15 && $day < 25) {
  $todays_date = htmlentities(ucwords(strftime('%a, %b %e', $date)));
  $today_is = htmlentities("Día ") . htmlentities($novena[$day][0]);
} elseif ($month == 12 && $day > 24) {
  // if it just happen
  $today_is = "Acab&oacute; de pasar";
} else {
  // how many days are missing
  $today_is = "Faltan " . $daysTo . " d&iacute;as";
}
