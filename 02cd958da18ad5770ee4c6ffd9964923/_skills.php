<?php
		$skills = array ( 
			'CSS' => 3, 
			'HTML/HTML5' => 4, 
			'Javascript' => array(
				'Javascript' => 2,
				'Bootstrap' => 2,
				'Jquery' => 2,
				'Angular' => 1,
				'Unify' => 1
			),
			'Linux' => array(
				'Command line' => 2,
				'Shell scripting' => 1,
				'Piped commands' => 1
			),
			'.net' => array(
				'C#' => 1,
				'VB' => 1
			),
			'PHP' => array(
				'PHP 5.x' => 4,
				'CTFr Framework' => 0,
				'Codeigniter' => 4,
				'Drupal' => 1
			),
			'Python' => 1,
			'Ruby On Rails' => 2,
			'SQL' => array(
				'SQL' => 3,
				'Stored Procedures' => 1,
				'Views' => 1
			),
		);


?>
<pre>
	<?=print_r($skills);?>
</pre>
		