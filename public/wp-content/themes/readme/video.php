<?php
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
									<header class="entry-header">
										<h1 class="entry-title"><?php the_title(); ?></h1>
										
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
										
										<div class="share"></div>
									</header>
									
									<div class="entry-content">
										<div class="media-wrap">
											<video style="width: 100%; height: 100%;" preload="none" src="<?php echo wp_get_attachment_url(); ?>"></video>
										</div>
										
										<?php
											the_content();
										?>
										
										<?php
											wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
										?>
									</div>
								</article>
								
								<?php
									comments_template( "", true );
								?>
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