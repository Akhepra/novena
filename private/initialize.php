<?php
ob_start(); // output buffering is turned on

session_start(); // turn on sessions

// IN PRODUCTION
// include requires HD location
// url requires localhost location

// for the links that require HD location
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
//define("SHARED_PATH", PRIVATE_PATH . '/shared');


// for the links that require localhost location
// COMMENT FOR DEPLOY
$novena_end = strpos($_SERVER['SCRIPT_NAME'], '/novena') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $novena_end);
define("WWW_ROOT", $doc_root);

// UNCOMMENT FOR DEPLOY
//define("WWW_ROOT", '');

require_once('functions.php');
