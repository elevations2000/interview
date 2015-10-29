
			<section>
				
				<header>
					<h2>Latest Entries <a href="<?=site_url('crud/create')?>" title="Create new article.">[ create new ]</a></h2>
					<?php if($message = $this->session->flashdata('message')){ ?>
					<p class="flash-message"><?=$message;?></p>
					<?php }?>
				</header>
				
      <?php if(!empty($query)){ 
			foreach($query as $article){ ?>
				<article>
					<header>
						<h3><?=$article->title;?></h3>
						<p>Published: <?=date('m/d/Y', strtotime($article->date));?><br>
						<a href="<?=site_url('crud/update/'.$article->id)?>" title="Edit selected article.">[ edit ]</a> <a href="<?=site_url('crud/delete/'.$article->id)?>" title="Delete selected article.">[ delete ]</a> <a href="<?=site_url('crud/retrieve/'.$article->id)?>" title="View selected article.">[ view ]</a></p>
					</header>
					<p><?=$article->content;?></p>
				</article>
				
	  <?php }}else{?>
				<p>Oops! Looks like there aren't any entries yet</p>
	  <?php }?>
					
			</section>
			