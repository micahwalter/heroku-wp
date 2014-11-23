<?php
	get_header();
?>

<div id="main" class="site-main">
	<?php
		get_template_part( 'part', 'main_slider' );
	?>
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="blog-alt">
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
													
													<span class="comment-link">
														<i class="pw-icon-comment"></i>
														
														<?php
															comments_popup_link( __( '0 Comment', 'read' ), __( '1 Comment', 'read' ), __( '% Comments', 'read' ) );
														?>
													</span>
													
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
			
			<div class="layout-full">
				<?php
					get_template_part( 'part', 'pagination' );
				?>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>