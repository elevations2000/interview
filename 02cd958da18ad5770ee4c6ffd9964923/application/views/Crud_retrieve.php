
			<section>
				
				<article>
					<header>
						<h2><?=$query->title;?> <a href="<?=site_url('crud')?>" title="Back to the article listing.">[ back to listing ]</a></h2>
						<p>Published: <?=date('m/d/Y', strtotime($query->date));?><br>
						<a href="<?=site_url('crud/update/'.$query->id)?>" title="Edit selected article.">[ edit ]</a> <a href="<?=site_url('crud/delete/'.$query->id)?>" title="Delete selected article.">[ delete ]</a></p>
					</header>
					<p><?=$query->content;?></p>
				</article>
			</section>
			