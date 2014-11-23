<?php
	get_header();
?>


<div id="main" class="site-main">
	<?php
		get_template_part( 'part', 'main_slider' );
	?>
	
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="layout-fixed">
				<div class="blog-simple">
					<header class="entry-header blog-page-title">
						<?php
							if ( is_category() )
							{
								?>
									<h1 class="entry-title"><?php echo __( 'Posts in', 'read' ); ?> : <i>"<?php echo single_cat_title(); ?>"</i></h1>
								<?php
							}
							elseif ( is_tag() )
							{
								?>
									<h1 class="entry-title"><?php echo __( 'Posts tagged', 'read' ); ?> : <i>"<?php echo single_tag_title(); ?>"</i></h1>
								<?php
							}
							elseif ( is_author() )
							{
								?>
									<h1 class="entry-title"><?php echo __( 'Posts by', 'read' ); ?> : <i>"<?php the_author(); ?>"</i></h1>
								<?php
							}
							elseif ( is_date() )
							{
								?>
									<h1 class="entry-title">
										<?php echo __( 'Date archives', 'read' ); ?> : <i>
																							"<?php
																								if ( is_day() )
																								{
																									printf( get_the_date() );
																								}
																								elseif ( is_month() )
																								{
																									printf( get_the_date( _x( 'F Y', 'monthly archives date format', 'read' ) ) );
																								}
																								elseif ( is_year() )
																								{
																									printf( get_the_date( _x( 'Y', 'yearly archives date format', 'read' ) ) );
																								}
																								else
																								{
																									_e( 'Archives', 'read' );
																								}
																							?>"
																						</i>
									</h1>
								<?php
							}
							elseif ( is_search() )
							{
								?>
									<h1 class="entry-title"><?php echo __( 'Searched for', 'read' ); ?> : <i>"<?php the_search_query(); ?>"</i></h1>
								<?php
							}
							else
							{
								?>
									<h1 class="entry-title"><?php single_post_title(); ?></h1>
								<?php
							}
						?>
					</header>
					
					
					<ul>
						<?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();
									?>
										<li>
											<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry post' ); ?>>
												<header class="entry-header">
													<div class="entry-meta">
														<span class="post-format"></span>
														
														<span class="cat-links">
															<?php
																the_category( ' ' );
															?>
														</span>
													</div>
													
													
													<h1 class="entry-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h1>
													
													
													<p>
														<?php
															pixelwars_theme_excerpt_max_charlength( 55 );
														?>
													</p>
													
													
													<div class="entry-meta">
														<span class="read-time"><i class="pw-icon-bookmark-empty-1"></i><span class="eta"></span> <?php echo __( 'read', 'read' ); ?></span>
														
														<span class="comment-link">
															<i class="pw-icon-comment"></i>
															
															<?php
																comments_popup_link( __( '0 Comment', 'read' ), __( '1 Comment', 'read' ), __( '% Comments', 'read' ) );
															?>
														</span>
														
														<span class="entry-date">
															<i class="pw-icon-clock"></i>
															
															<a href="<?php the_permalink(); ?>" rel="bookmark">
																<time class="entry-date" datetime="2012-02-13T04:34:10+00:00"><?php echo get_the_date(); ?></time>
															</a>
														</span>
													</div>
												</header>
											</article>
										</li>
									<?php
								endwhile;
							endif;
							wp_reset_query();
						?>
					</ul>
					
					
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