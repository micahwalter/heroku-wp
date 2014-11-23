<?php
	function show_main_slider()
	{
		?>
			<div class="flexslider" data-autoplay="true" data-interval="3000" data-animation="slide" data-direction="horizontal" data-animationSpeed="600"  data-pauseOnHover="true">
				<ul class="slides">
					<?php
						$args_main_slider = array( 'post_type' => 'post', 'posts_per_page' => 5 );
						$loop_main_slider = new WP_Query( $args_main_slider );
						
						if ( $loop_main_slider->have_posts() ) :
							while ( $loop_main_slider->have_posts() ) : $loop_main_slider->the_post();
							
								if ( has_post_thumbnail() )
								{
									?>
										<li>
											<article class="hentry post">
												<?php
													$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
													
													$featured_image_url = $featured_image[0];
												?>
												<div class="post-thumbnail" style="background-image: url( <?php echo $featured_image_url; ?> );">
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
															</div>
														</div>
													</header>
												</div>
											</article>
										</li>
									<?php
								}
							
							endwhile;
						endif;
						wp_reset_query();
					?>
				</ul>
			</div>		
		<?php
	}
	
	
	
	if ( isset( $_GET['main_slider'] ) )
	{
		if ( $_GET['main_slider'] == 'yes' )
		{
			show_main_slider();
		}
	}
	else
	{
		$main_slider = get_option( 'main_slider', 'No' );
		
		
		if ( $main_slider == 'Yes' )
		{
			show_main_slider();
		}
	}
?>