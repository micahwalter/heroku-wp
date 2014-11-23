<?php
/*
Template Name: Archives
*/

get_header();
?>


<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="layout-fixed">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
									<header class="entry-header" <?php echo $hide_post_title; ?>>
										<h1 class="entry-title"><?php the_title(); ?></h1>
									</header>
									
									<div class="entry-content">
										<?php
											the_content();
										?>
										
										<div class="post-list archives-list">
											<h2><?php echo __( 'last 30 posts', 'read' ); ?></h2>
											
											<ul>
												<?php
													$args_loop = array( 'post_type' => 'post', 'posts_per_page' => 30 );
													$loop_custom = new WP_Query( $args_loop );
													
													if ( $loop_custom->have_posts() ) :
														while ( $loop_custom->have_posts() ) : $loop_custom->the_post();
														
															?>
																<li>
																	<article>
																		<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
																		
																		<span class="read-time"><i class="pw-icon-bookmark-empty-1"></i><span class="eta"></span> <?php echo __( 'read', 'read' ); ?></span>
																	</article>
																</li>
															<?php
															
														endwhile;
													endif;
													wp_reset_query();
												?>
											</ul>
										</div>
										
										<div class="archives-list archives-tag archives-by-month">
											<h2><?php echo __( 'archives by month', 'read' ); ?></h2>
											
											<ul>
												<?php
													$args = array(  'format' => 'custom', 
																	'before' => '<li>',
																	'after' => '</li>' );
													
													wp_get_archives( $args );
												?>
											</ul>
										</div>
										
										<div class="archives-list archives-tag archives-by-category">
											<h2><?php echo __( 'archives by category', 'read' ); ?></h2>
											
											<ul>
												<?php
													$categories = get_categories();
													
													foreach ( $categories as $category )
													{
														echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li> ';
													}
												?>
											</ul>
										</div>
										
										<div class="archives-list archives-tag archives-by-tag">
											<h2><?php echo __( 'archives by tag', 'read' ); ?></h2>
											
											<ul>
												<?php
													$tags = get_tags();
													
													foreach ( $tags as $tag )
													{
														echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
													}
												?>
											</ul>
										</div>
										
										<div class="archives-list archives-tag archives-by-format">
											<h2><?php echo __( 'archives by format', 'read' ); ?></h2>
											
											<ul>
												<?php
													$post_formats = get_theme_support( 'post-formats' );
													
													foreach ( $post_formats[0] as $post_format )
													{
														$format_link = get_post_format_link( $post_format );
														
														echo '<li><a href="' . $format_link . '">' . $post_format . '</a></li> ';
													}
												?>
											</ul>
									   </div>
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
</div>


<?php
	get_footer();
?>