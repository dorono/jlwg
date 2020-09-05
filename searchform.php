<form method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="input-prepend">
		<input type="text" id="prependedInput" name="s" size="100%" class="span4" placeholder="<?php echo __( 'Enter your search term...', 'reboot' ); ?>" value="<?php the_search_query(); ?>">
	</div>
</form>