
			<section>
				
				<header>
					<h2>Create Article <a href="<?=site_url('crud')?>" title="Back to the article listing.">[ back to listing ]</a></h2>
				</header>
				
				<article id="introduction"> 
					<?=form_open('crud/create');?>
					<?=validation_errors(form_fieldset('ERROR',array('class'=>'form-error')), form_fieldset_close());?>
					<?=form_fieldset('Enter Information');?>
						<?=form_label('Title','title');?><br>
						<?=form_input('title',set_value('title'));?><br>
						<?=form_label('Content','content');?><br>
						<?=form_textarea('content',set_value('content'));?>
					<?=form_fieldset_close();?>
					<?=form_fieldset();?>
						<?=form_submit('create','Create Article!');?>
					<?=form_fieldset_close();?>
					<?=form_close();?>
				</article>
					
			</section>
			