<?php

$height = 4;
$capacity = 0;

echo "\nInput: ". $height. " ". $capacity. "%";

$rows = ($height * 2) + 1;
echo "\n";

// printing first line
for ($i = 0; $i < $rows; $i++) {
	echo "_";
}

// build clock upper body 
echo "\n";
for ($i = 0; $i < $height; $i++) {
	$line = "";
	for ($j = 0; $j < $rows; $j++) {
		if ($i == $j) {
			$line .= "\\";
		} if ($j == $rows - $i -2) {
			$line .= "/";
		} else {
			$line .= " ";
		}
	}
	echo $line."\n";
}

// build clock bottom body 
$middle = $height - 1;
for ($i = 0; $i < $height; $i++) {
	$line = "";
	for ($j = 0; $j < $rows - 1; $j++) {
		if ($middle - $i == $j) {
			$line .= "/";
		} if ($middle  + $i + 1 == $j) {
			$line .= "\\";
		} else {
			if ($i == $height -1) {
				$line .= "_";
			} else {
				$line .= " ";
			}
		}
	}
	echo $line."\n";
}
echo "\n";

?>
