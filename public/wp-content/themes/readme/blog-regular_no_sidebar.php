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
				<div class="blog-regular">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
												<?php
													$hide_post_title = get_option( $post->ID . 'hide_post_title', false );
													
													if ( $hide_post_title )
													{
														$hide_post_title_out = 'style="display: none;"';
													}
													else
													{
														$hide_post_title_out = "";
													}
												?>
												<a <?php echo $hide_post_title_out; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
												
												<?php
													edit_post_link( __( 'Edit', 'read' ), '<span class="edit-link">', '</span>' );
												?>
											</div>
										</header>
										
										
										<?php
											if ( ( has_post_format( 'audio' ) == false ) && ( has_post_format( 'video' ) == false ) )
											{
												if ( has_post_thumbnail() )
												{
													?>
														<div class="featured-image">
															<?php
																the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
															?>
														</div>
													<?php
												}
											}
										?>
										
										
										<div class="entry-content">
											<?php
												if ( has_post_format( 'audio' ) || has_post_format( 'video' ) )
												{
													get_template_part( 'part', 'format_audio_video_media' );
												}
												elseif ( has_post_format( 'gallery' ) )
												{
													get_template_part( 'part', 'format_gallery_slider' );
												}
											?>
											
											
											<?php
												if ( has_excerpt() )
												{
													the_excerpt();
													
													echo '<span class="more"><a class="more-link" href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) . '</a></span>';
												}
												else
												{
													$theme_excerpt = get_option( 'theme_excerpt', 'No' );
													
													if ( $theme_excerpt == 'Yes' )
													{
														the_excerpt();
													}
													elseif ( $theme_excerpt == 'standard' )
													{
														$format = get_post_format();
														
														if ( $format == false )
														{
															the_excerpt();
														}
														else
														{
															the_content( __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) );
														}
													}
													else
													{
														the_content( __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) );
													}
												}
											?>
											
											
											<?php
												wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
											?>
										</div>
									</article>
								<?php
							endwhile;
						endif;
						wp_reset_query();
					?>
					
					
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