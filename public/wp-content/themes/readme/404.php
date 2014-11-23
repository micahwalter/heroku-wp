<?php
	get_header();
?>

<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="layout-full">
				<article class="hentry page page-404">
					<header class="entry-header">
						<h1 class="entry-title"><?php echo __( 'Page Not Found!', 'read' ); ?></h1>
					</header>
					
					<div class="entry-content">
						<div class="http-alert">
							<h1><i class="pw-icon-doc-alt"></i></h1>
						</div>
						
						<p><?php echo __( 'You can search for what you are looking.', 'read' ); ?></p>
						
						<form method="get" action="<?php echo home_url( '/' ); ?>">
							<input type="text" id="search-big" name="s" placeholder="<?php echo __( 'search...', 'read' ); ?>">
						</form>
					</div>
				</article>
			 </div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>