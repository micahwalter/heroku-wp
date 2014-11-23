<?php
	get_header();
?>


<div id="main" class="site-main blog-type-masonry-alternate">
	<?php
		get_template_part( 'part', 'main_slider' );
	?>
	
	
	<div id="primary" class="content-area with-sidebar">
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
			
			
			<div class="layout-fixed">
				<?php
					$blog_masonry_alternate_item_width = get_option( 'blog_masonry_alternate_item_width', '440' );
				?>
				<div class="masonry blog-alt" data-layout="masonry" data-item-width="<?php echo $blog_masonry_alternate_item_width; ?>">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry post' ); ?>>
										<?php
											if ( has_post_thumbnail() )
											{
												$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
												
												$featured_image_out = 'style="background-image: url( ' .  $featured_image[0] . ' )"';
												
												$no_featured_image = "";
											}
											else
											{
												$featured_image_out = "";
												
												$no_featured_image = 'no-featured-image';
											}
										?>
										<div class="post-thumbnail <?php echo $no_featured_image; ?>" <?php echo $featured_image_out; ?>>
											<header class="entry-header">
												<div class="layout-fixed">
													<div class="entry-meta">
														<span class="cat-links">
															<?php
																the_category( ' ' );
															?>
														</span>
													</div>
													
													
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
														
														<?php
															if ( comments_open() )
															{
																?>
																	<span class="comment-link">
																		<i class="pw-icon-comment"></i>
																		
																		<?php
																			if ( comments_open() )
																			comments_popup_link( __( '0 Comment', 'read' ), __( '1 Comment', 'read' ), __( '% Comments', 'read' ) );
																		?>
																	</span>
																<?php
															}
														?>
														
														<span class="byline">
															<span class="author vcard">
																<i class="pw-icon-user-outline"></i>
																
																<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php the_author(); ?></a>
															</span>
														</span>	
														
														<span class="read-time"><i class="pw-icon-bookmark-empty-1"></i><span class="eta"></span> <?php echo __( 'read', 'read' ); ?></span>														
													</div>
												</div>
											</header>
										</div>
									</article>
								<?php
							endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
				
				
				<?php
					get_template_part( 'part', 'pagination' );
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