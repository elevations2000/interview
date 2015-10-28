<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <meta name="description" content="<?=$description;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?=$stylesheets;?>
</head>
<body>
    <header role="banner">
    
        <h1><?=$title;?></h1>
        <nav role="navigation">
			<ul>
                <li><a href="<?=site_url('welcome/');?>">Welcome</a></li>
                <li><a href="<?=site_url('welcome/hourglass');?>">Hourglass Test</a></li>
				<li><a href="<?=site_url('welcome/css');?>">CSS Test</a></li>
				<li><a href="<?=site_url('welcome/skills');?>">Skills</a></li>
				<li><a href="<?=site_url('welcome/example');?>">Example Code</a></li>
            </ul>		
        </nav>
        
    </header>
    <div class="wrap">
        <main role="main">  
			<?=$content;?>            
        </main>
<!-- Not using a sidebar
        <aside role="complementary">  
        </aside>
 -->       
    </div>
<!-- Not using a footer
    <footer role="contentinfo">
        <small>Copyright &copy; <time datetime="2015">2015</time></small>
    </footer>
-->	
    <!--[if lt IE 9]><script src="<?=base_url('js/html5shiv-printshiv.js')?>" media="all"></script><![endif]-->
	<script src="<?=base_url('js/scripts.js')?>" media="all"></script>
</body>
</html>