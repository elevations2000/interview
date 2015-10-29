<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <meta name="description" content="<?=$description;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?=$stylesheets;?>
</head>
<body>
    <header role="banner" class="main-header">
    
        <h1><?=$title;?></h1>
        <nav role="navigation">
			<ul>
                <li><a href="<?=site_url('welcome/');?>">Welcome</a></li>
                <li><a href="<?=site_url('welcome/hourglass');?>">Hourglass Test</a></li>
				<li><a href="<?=site_url('welcome/css');?>">CSS Test</a></li>
				<li><a href="<?=site_url('welcome/skills');?>">Skill Ratings</a></li>
				<li><a href="<?=site_url('welcome/examples');?>">Code Examples</a></li>
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
    <footer role="contentinfo" class="main-footer">
        <p class="copyright"><small>Submitted by</small></p>
		<p class="identifier"><small><?=md5('jayjfletcher@gmail.com');?></small></p>
    </footer>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script src="<?=base_url('js/scripts.js')?>" media="all"></script>
</body>
</html>