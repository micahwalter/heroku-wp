<form role="search" id="searchform" class="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php echo __( 'Search for:', 'read' ); ?></label>
		
		<input type="text" id="s" name="s" required="required" placeholder="<?php echo __( 'type and hit enter ...', 'read' ); ?>" value="">
		
		<input type="submit" id="searchsubmit" style="display: none;" value="<?php echo __( 'Search', 'read' ); ?>">
	</div>
</form>