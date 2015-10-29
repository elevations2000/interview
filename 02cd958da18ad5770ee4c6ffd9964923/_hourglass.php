<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="description" content="PHP test case for Junior Developer">

<title>Hourglass Test</title>
<style>
.hourglass
{
	font-family:courier, "courier new", monospace;
	font-size:1em;
	color:#000;
	background-color:#eee;
	display: inline-block;
}
</style>
</head>
<body>
<?php

	function generateHourglass($height,$remaining)
	{
			$capacity 			= $height * $height;//total sand capacity
			$topSandDecimal  	= $capacity * (ceil("{$remaining}")/100);//sand in the top half
			$topSand  			= ceil("{$topSandDecimal}");//sand in the top half, rouded up
			$topEmpty 			= $capacity - $topSand ;
			$botEmpty 			= $topSand;//empty space in the top half
			$botSand			= $topEmpty;//empty space in the bottom half
			$nbsp = '&nbsp;';
			
			//lets start with the top half
			$output = str_repeat('_', ($height*2)+1) . '<br>';
			
			$i = $height;
			$blankTotal = 0;
			while($i >=1 )
			{
				$leftSpace = $height-$i;
				$output .= str_repeat($nbsp, $leftSpace) . '\\';
				$rowCount =($i*2)-1;
				//will we print more than enough blankspace?
				if(($rowCount + $blankTotal) > $topEmpty)
				{
					$spacesRemaining = $topEmpty - $blankTotal;
					//do we have a split row situation(x's and spaces)?
					if($spacesRemaining == 0)
					{
						$output .= str_repeat('x', $rowCount);
					}else{//if so then split the row
						$xRemaining = $rowCount - $spacesRemaining;
						$leftSide = floor($xRemaining/2);
						$output .= str_repeat('x', $leftSide );
						$output .= str_repeat($nbsp, $spacesRemaining);
						$output .= str_repeat('x', $xRemaining - $leftSide );
					}
					$blankTotal = $blankTotal + $spacesRemaining;
				}else{//if not print an entire line of space
					$output .= str_repeat($nbsp, $rowCount);
					$blankTotal = $blankTotal + $rowCount; 
				}
				$output .= '/' . "<br>";
				$i--;
			}
			
			//and now the bottom half
			$i = $height;
			$blankTotal = 0;
			while($i >=1 )
			{
				$leftSpace = $i-1;
				$output .= str_repeat($nbsp, $leftSpace) . '/';
				$rowCount =($height - $i)+($height - $i+1);
				//will we print more than enough blankspace?
				if(($rowCount + $blankTotal) > $botEmpty)
				{
					$spacesRemaining = $botEmpty - $blankTotal;
					//do we have a split row situation(x's and spaces)?
					if($spacesRemaining == 0)
					{
						$output .= str_repeat('x', $rowCount);
					}else{//if so then split the row
						$xRemaining = $rowCount - $spacesRemaining;
						$leftSide = floor($spacesRemaining/2);
						if($i == 1)
						{
							$nbsp = '_';
						}
						$output .= str_repeat($nbsp, $leftSide );
						$output .= str_repeat('x', $xRemaining);
						$output .= str_repeat($nbsp, $spacesRemaining - $leftSide );
					}
					$blankTotal = $blankTotal + $spacesRemaining;
				}else{//if not print an entire line of space
					$output .= str_repeat($nbsp, $rowCount);
					$blankTotal = $blankTotal + $rowCount; 
				}
				$output .= '\\' . "<br>";
				$i--;
			}
			return $output;
	}
?>

	<form action="_hourglass.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Enter Parameters</legend>
			<label for="height">What is the hourglass' height?</label><br>
			<input type="text" name="height" value=""><br>
			<label for="remaining">How much sand is remains in the top?(percentage)</label><br>
			<input type="text" name="remaining" value="">%
		</fieldset>					
		<fieldset>
			<input type="submit" name="generate" value="Generate Hourglass">
		</fieldset>					
	</form>
<div class="hourglass">
<?php
if(isset($_POST['generate']))
{
	echo generateHourglass($_POST['height'],$_POST['remaining']);
}
?>
</div>
</body>
</html>