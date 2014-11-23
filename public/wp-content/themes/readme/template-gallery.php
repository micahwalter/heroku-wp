<?php
/*
Template Name: Gallery
*/

get_header();

update_option( 'gallery_page_slug', get_post_field( 'post_name', get_the_ID() ) );
?>

<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<header class="entry-header">
				<div class="layout-fixed">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</div>
			</header>
			
			<div class="layout-full">
				<?php
					$gallery_layout = get_option( 'gallery_layout', 'masonry' );
					
					$gallery_columns = get_option( 'gallery_columns', '340' );
				?>
				<div class="r-gallery masonry media-grid" data-layout="<?php echo $gallery_layout; ?>" data-item-width="<?php echo $gallery_columns; ?>">
					<?php
						$args_loop = array( 'post_type' => 'gallery', 'posts_per_page' => -1 );
						$loop_custom = new WP_Query( $args_loop );
						
						if ( $loop_custom->have_posts() ) :
							while ( $loop_custom->have_posts() ) : $loop_custom->the_post();
								?>
									<div class="media-cell hentry">
										<div class="media-box">
											<?php
												if ( has_post_thumbnail() )
												{
													the_post_thumbnail( 'pixelwars_theme_image_size_600', array( 'alt' => get_the_title(), 'title' => "" ) );
												}
											?>
											
											<div class="mask">
												<div class="media-cell-desc">
													<h3><?php the_title(); ?></h3>
												</div>
											</div>
											
											<a href="<?php the_permalink(); ?>"></a>
										</div>
									</div>
								<?php
							endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>