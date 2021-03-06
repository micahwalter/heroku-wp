<?php
	get_header();
?>


<div id="main" class="site-main">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				?>
					<?php
						$post_featured_image_style = get_option( 'post_featured_image_style', 'Full-width' );
						
						if ( $post_featured_image_style != 'Fixed' )
						{
							$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							
							$featured_image_out = 'style="background-image: url( ' .  $featured_image[0] . ' );"';
							
							?>
								<div class="post-thumbnail" <?php echo $featured_image_out; ?>>
									<div class="f-image">
										<?php
											the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
										?>
									</div>
									
									
									<header class="entry-header">
										<div class="layout-fixed">
											<div class="entry-meta">
												<span class="cat-links">
													<?php
														the_category( ' ' );
													?>
												</span>
											</div>
											
											
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
											<h1 class="entry-title" <?php echo $hide_post_title; ?>><?php the_title(); ?></h1>
											
											
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
											
											<div class="share"></div>
										</div>
									</header>
								</div>
							<?php
						}
					?>
					
					
					<div id="primary" class="content-area with-sidebar">
						<div id="content" class="site-content" role="main">
							<div class="layout-fixed">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php
										if ( $post_featured_image_style == 'Fixed' )
										{
											?>
												<header class="entry-header">
													<div class="entry-meta">
														<span class="cat-links">
															<?php
																the_category( ' ' );
															?>
														</span>
													</div>
													
													
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
													<h1 class="entry-title" <?php echo $hide_post_title; ?>><?php the_title(); ?></h1>
													
													
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
												</header>
												
												
												<div class="featured-image">
													<?php
														the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
													?>
												</div>
											<?php
										}
									?>
									
									
									<div class="entry-content">
										<?php
											the_content();
										?>
										
										<?php
											wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
										?>
										
										<?php
											$about_the_author_module = get_option( 'about_the_author_module', 'Yes' );
											
											if ( $about_the_author_module == 'Yes' )
											{
												get_template_part( 'part', 'about_author' );
											}
										?>
									</div>
									
									
									<?php
										if ( get_the_tags() != "" )
										{
											?>
												<footer class="entry-meta post-tags">
													<h3><?php echo __( 'TAGS', 'read' ); ?></h3>
													
													<?php
														the_tags( "", ' ', "" );
													?>
												</footer>
											<?php
										}
									?>
								</article>
								
								
								<?php
									get_template_part( 'part', 'read_next' );
								?>
								
								 
								<nav class="nav-single row">
									<div class="nav-previous col-sm-6">
										<?php
											previous_post_link( '<h4>' . __( 'PREVIOUS POST', 'read' ) . '</h4>%link', '<span class="meta-nav">&#8592;</span> %title' );
										?>
									</div>
									
									<div class="nav-next col-sm-6">
										<?php
											next_post_link( '<h4>' . __( 'NEXT POST', 'read' ) . '</h4>%link', '%title <span class="meta-nav">&#8594;</span>' );
										?>
									</div>
								</nav>
								
								<?php
									comments_template( "", true );
								?>
							</div>
						</div>
					</div>
				<?php
			endwhile;
		endif;
		wp_reset_query();
	?>
	
	
	<?php
		get_sidebar();
	?>
</div>


<?php
	get_footer();
?>