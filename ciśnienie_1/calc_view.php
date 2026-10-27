<?php require_once dirname(__FILE__) . '/config.php';?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>Kalkulator Ciśnienia</title>
</head>
<body>

<h1>Kalkulator Ciśnienia</h1>
<p>Wzór: p = F / A</p>

<form action="<?php print(_APP_URL);?>/calc.php" method="get">
	<label for="id_f">Siła (F): </label>
	<input id="id_f" type="text" name="f" value="<?php print(isset($f) ? $f : ''); ?>" /><br /><br />
	
	<label for="id_a">Powierzchnia (A): </label>
	<input id="id_a" type="text" name="a" value="<?php print(isset($a) ? $a : ''); ?>" /><br /><br />
	
	<input type="submit" value="Oblicz ciśnienie" />
</form>	

<?php
if (isset($messages)) {
	if (count($messages) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:350px;">';
		foreach ($messages as $key => $msg) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:350px;">
<?php echo ' Ciśnienie =  <strong>' . $result . '</strong> Pa (N/m²)'; ?>
</div>
<?php } ?>

</body>
</html>