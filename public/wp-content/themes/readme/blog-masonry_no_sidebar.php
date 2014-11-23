<?php
	get_header();
?>


<div id="main" class="site-main blog-type-masonry">
	<?php
		get_template_part( 'part', 'main_slider' );
	?>
	
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				$hide_post_title = get_option( $post->ID . 'hide_post_title', false );
				
				if ( $hide_post_title )
				{
					$hide_post_title = 'style="display: none;"';
				}
				else
				{
					$hide_post_title = "";
				}
			?>
			<header class="entry-header blog-page-title" <?php echo $hide_post_title; ?>>
				<div class="layout-fixed">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</div>
			</header>
			
			
			<div class="layout-full">
				<?php
					$blog_masonry_item_width = get_option( 'blog_masonry_item_width', '340' );
				?>
				<div class="masonry blog-masonry" data-layout="masonry" data-item-width="<?php echo $blog_masonry_item_width; ?>">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry post' ); ?>>
										<header class="entry-header">
											<h1 class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h1>
											
											
											<div class="entry-meta">
												<span class="entry-date">
													<i class="pw-icon-clock"></i>
													
													<a href="<?php the_permalink(); ?>" rel="bookmark">
														<time class="entry-date" datetime="2012-02-13T04:34:10+00:00"><?php echo get_the_date(); ?></time>
													</a>
												</span>
												
												<span class="comment-link">
													<i class="pw-icon-comment"></i>
													
													<?php
														comments_popup_link( __( '0 Comment', 'read' ), __( '1 Comment', 'read' ), __( '% Comments', 'read' ) );
													?>
												</span>
											</div>
										</header>
										
										
										<?php
											if ( ( has_post_format( 'audio' ) == false ) && ( has_post_format( 'video' ) == false ) )
											{
												if ( has_post_thumbnail() )
												{
													?>
														<div class="featured-image">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ), 'title' => "" ) );
																?>
															</a>
														</div>
													<?php
												}
											}
										?>
										
										
										<div class="entry-content">
											<?php
												if ( has_post_format( 'chat' ) || has_post_format( 'image' ) || has_post_format( 'link' ) || has_post_format( 'aside' ) || has_post_format( 'quote' ) )
												{
													the_content();
												}
												elseif ( has_post_format( 'video' ) || has_post_format( 'audio' ) )
												{
													get_template_part( 'part', 'format_audio_video_media' );
													
													// echo '<p>'; theme_excerpt_max_charlength( 120 ); echo '</p>';
													
													the_excerpt();
												}
												elseif ( has_post_format( 'gallery' ) )
												{
													get_template_part( 'part', 'format_gallery_slider' );
													
													// echo '<p>'; theme_excerpt_max_charlength( 120 ); echo '</p>';
													
													the_excerpt();
												}
												else
												{
													// echo '<p>'; theme_excerpt_max_charlength( 120 ); echo '</p>';
													
													the_excerpt();
												}
											?>
										</div>
									</article>
								<?php
							endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
				
				
				<div class="layout-full">
					<?php
						get_template_part( 'part', 'pagination' );
					?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
	get_footer();
?>