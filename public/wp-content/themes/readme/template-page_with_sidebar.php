<?php
/*
Template Name: Page with Sidebar
*/

get_header();
?>


<div id="main" class="site-main">
	<div id="primary" class="content-area with-sidebar">
		<div id="content" class="site-content" role="main">
			<div class="layout-fixed">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry post' ); ?>>
									<header class="entry-header">
										<h1 class="entry-title"><?php the_title(); ?></h1>
									</header>
									
									
									<div class="entry-content">
										<?php
											the_content();
										?>
										
										<?php
											wp_link_pages( array( 'before' => '<div class="page-links clearfix">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
										?>
									</div>
								</article>
							<?php
						endwhile;
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</div>
	
	
	<?php
		get_sidebar();
	?>
</div>


<?php
	get_footer();
?>