<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="title" content="State of Rhode Island: Interview Hourglass Test">
<meta name="description" content="Hourglass test case for Junior Developer">

<title>State of Rhode Island: Interview Hourglass Test</title>

<!-- Style Sheets -->
<link rel='stylesheet' media="screen" href='hourglass.css'>
</head>
<body>
<form action="hourglass.php" method="get">
	Height:<br>
		<input type="text" name="height"><br>
	Sand Percent:<br>
		<input type="text" name="sand">%<br>
		<input type="submit">
</form>
<?php
// CHECK FOR INPUT
if(!empty($_GET)){
	
	//VALIDATE INPUT
	$valid = FALSE;
	$error = '';
	if(is_numeric($_GET['height']) && is_numeric($_GET['sand'])){
		if($_GET['height'] > 1 || $_GET['sand'] >= 0 || $_GET['sand'] <= 100){
			$valid = TRUE;
		}else{$error = 'Height must be greater than 1.<br>Sand level can not be less than 0 or greater than 100.';}
	}else{$error = 'Please be sure to use valid numbers!';}
	
	//IF NOT VALID OUTPUT AN ERROR
	if($valid == FALSE){
		echo '<div class="error">' . $error . '</div>';
	}else{//IF VALID GENERATE THE HOURGLASS
		
		//FUNCTION TO GENERATE HOURGLASS HALVES
		$height = (int)$_GET['height'];
		$sand = (int)$_GET['sand'];
		function createHourglass($half = 'top',$height,$sand){
			//LETS SET UP A FEW VARIABLES
			$capacity = $height * $height;//total x capacity
			$round = $capacity * ($sand/100);
			$topCount = ceil("{$round}");//top x count, rounding up
			$botCount = $capacity - $topCount;//bottom x count
			$output = '';//and empty output variable we're going to fill
			$sCount = 0;
			$split = FALSE;//for rows that are both x and &nbsp;
			
			//SOME VARIABLES THAT ARE DEPENDENT ON WHICH HALF WE ARE GENERATING
			if($half == 'top'){
				$ls = '\\';
				$rs = '/';
				$outer ='x';
				$inner ='&nbsp;';
				$output .= str_repeat('_', ($height*2)+1) . '<br>';
			}else{
				$ls = '/';
				$rs = '\\';
				$outer ='&nbsp;';
				$inner ='x';
			}
			
			
			// A WHILE STATEMENT TO GENERATE EACH ROW BASED ON HEIGHT
			$i = $height;
			while( $i >= 1){
				//SOME CALCULATIONS THAT ARE DEPENDENT ON WHICH HALF WE ARE GENERATING
				if($half == 'top'){
					$space = $height-$i;
					$rowCount =($i*2)-1;
					$sCount = $sCount + $rowCount;
					if($sCount > $botCount)
						$split = TRUE;
					$diff = $sCount - $botCount;
				}else{
					$space = $i-1;
					$rowCount =($height - $i)+($height - $i+1);
					$sCount = $sCount + $rowCount;
					if($sCount > $topCount)
						$split = TRUE;
					$diff = $sCount - $topCount;
					if($i == 1)
						$outer = '_';
				}
				
				
				//LEFT WALL OF HOURGLASS
				$output .= str_repeat('&nbsp;', $space) . $ls;
				//HOURGLASS FILL
				if($split){
					if($diff <= $rowCount){
						if($half == 'top'){
						$output .= str_repeat($outer, ceil($diff/2 - $diff%2));
							$output .= str_repeat($inner, $rowCount - $diff);
							$output .= str_repeat($outer, $diff/2 + $diff%2);
						}else{
							if($i == 1){
								$output .= str_repeat($outer, ($rowCount - $diff)/2 +($rowCount - $diff)%2 -1);
								$output .= str_repeat($inner, $diff);
								$output .= str_repeat($outer, ($rowCount - $diff)/2 +1);
							}else{
								$output .= str_repeat($outer, (($rowCount - $diff)/2) - 1 );
								$output .= str_repeat($inner, $diff);
								$output .= str_repeat($outer, (($rowCount - $diff)/2 +($rowCount - $diff)%2) + 1 );
							}
						}
					}else{$output .= str_repeat("x", $rowCount);}
				}else{$output .= str_repeat("&nbsp;", $rowCount);}
				//RIGHT WALL OF HOURGLASS
				$output .= $rs;
				$output .= '<br>';
				$i--;
			}
			return $output;
		}
		
		//FINALLY SOME OUTPUT
		echo '<div>';
		echo 'HEIGHT :' . $height . '<br>';
		echo 'PERCENT:' . $sand . '%<br>';
		echo createHourglass('top',$height,$sand);
		echo createHourglass('bottom',$height,$sand);
		echo '</div>';
	}
}
?>
</body>
</html>
