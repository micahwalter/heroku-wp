<?php
	get_header();
?>

<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<header class="entry-header">
				<div class="layout-fixed">
					<h1 class="entry-title"><?php single_post_title(); ?></h1> 
					
					<?php
						$gallery_page_slug = get_option( 'gallery_page_slug', "" );
						
						if ( $gallery_page_slug != "" )
						{
							?>
								<ul class="header-links">
									<li>
										<a href="<?php echo esc_url( home_url( '/' ) ) . $gallery_page_slug; ?>"><span class="meta-nav">&#8592;</span> <?php echo __( 'Back to Gallery', 'read' ); ?></a>
									</li>
								</ul>
							<?php
						}
					?>
				</div>
			</header>
			
			<div id="rg-gallery" class="rg-gallery">
				<ul id="carousel" class="elastislide-list">
					<?php
						$parent_post_id = get_the_ID();
						
						$args_loop = array( 'post_parent' => $parent_post_id, 'post_status' => 'any', 'post_type' => 'attachment', 'posts_per_page' => -1 );
						$loop_custom = new WP_Query( $args_loop );
						
						if ( $loop_custom->have_posts() ) :
							while ( $loop_custom->have_posts() ) : $loop_custom->the_post();
							
								$attachment_id = get_the_ID();
								
								$attachment_url = wp_get_attachment_url( $attachment_id );
								
								$attachment_image = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
								
								$attachment_image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
								
								$attachment_image_caption = $wpdb->get_var( "SELECT post_excerpt FROM $wpdb->posts WHERE ID = '$attachment_id'" );
								
								?>
									<li>
										<a href="<?php echo $attachment_url; ?>">
											<img alt="<?php echo $attachment_image_alt; ?>" data-description="<?php echo $attachment_image_caption; ?>" src="<?php echo $attachment_image[0]; ?>">
										</a>
									</li>
								<?php
							
							endwhile;
						endif;
						wp_reset_query();
					?>
				</ul>
				
				<div class="rg-image-wrapper">
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
					
					<div class="rg-image"></div>
					
					<div class="rg-loading"></div>
					
					<div class="rg-caption-wrapper">
						<div class="rg-caption" style="display:none;">
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>