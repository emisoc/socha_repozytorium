<?php
require_once dirname(__FILE__) . '/config.php';

$f = isset($_REQUEST['f']) ? $_REQUEST['f'] : null;
$a = isset($_REQUEST['a']) ? $_REQUEST['a'] : null;

$messages = array();

if (! (isset($f) && isset($a))) {
	$messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($f === "" || $f === null) {
	$messages[] = 'Nie podano siły (F)';
}
if ($a === "" || $a === null) {
	$messages[] = 'Nie podano powierzchni (A)';
}

if (empty($messages)) {
	if (!is_numeric($f)) {
		$messages[] = 'Siła (F) nie jest prawidłową liczbą';
	}
	if (!is_numeric($a)) {
		$messages[] = 'Powierzchnia (A) nie jest prawidłową liczbą';
	}	
}

$result = null;
if (empty($messages)) {
	$f = floatval($f);
	$a = floatval($a);
	
	if ($a == 0) {
		$messages[] = 'Powierzchnia (A) nie może wynosić 0!';
	} else {
		$result = $f / $a; 
	}
}

include _ROOT_PATH . '/calc_view.php';
?>