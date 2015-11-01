			<section>
			
                <header>
                    <h2>The Hourglass Test</h2>
                </header>
                
                <article id="introduction">             
                    <h3>The Challenge</h3>
                    <p>In your favorite language (preferably PHP), write a program that will output an hourglass according to user input.</p> 

					<p>Input is composed of two numbers: First number is a greater than 1 integer that represents the height of the bulbs, second number is a percentage (0 - 100) of the hourglass' capacity.</p>

					<p>The hourglass' height is made by adding more lines to the hourglass' bulbs, so size 2 (the minimum accepted size) would be:</p>
					<pre>
					_____ 
					\   / 
					 \ / 
					 / \ 
					/___\
					
					</pre>
					<p>Size 3 will add more lines making the bulbs be able to fit more 'sand'.</p>

					<p>Sand will be drawn using the character x. The top bulb will contain N percent 'sand' while the bottom bulb will contain (100 - N) percent sand, where N is the second variable.</p>

					<p>'Capacity' is measured by the amount of spaces () the hourglass contains. Where percentage is not exact, it should be rounded up.</p>

					<p>Sand is drawn from outside in, giving the right side precedence in case percentage result is even.</p>

                </article>
				<article id="introduction">
					<header>
						<h3>The Input</h3>
						<p>Results will be below the form.</p>
					</header>
					<?=form_open('welcome/hourglass');?>
					<?=validation_errors(form_fieldset('ERROR',array('class'=>'form-error')), form_fieldset_close());?>
					<?=form_fieldset('Enter Parameters');?>
						<?=form_label('What is the hourglass\' height?','height');?><br>
						<?=form_input('height',set_value('height'));?><br>
						<?=form_label('How much sand is remains in the top?(percentage)','remaining');?><br>
						<?=form_input('remaining',set_value('remaining'));?>%
					<?=form_fieldset_close();?>
					<?=form_fieldset();?>
						<?=form_submit('generate','Generate Hourglass');?>
					<?=form_fieldset_close();?>
					<?=form_close();?>
				</article>
				<article id="introduction"> 
					<h3>The Result</h3>
					<p class="hourglass"><?=$hourglass;?></p>
				</article>
            </section>