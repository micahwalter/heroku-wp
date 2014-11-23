<?php
	get_header();
?>


<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="layout-fixed">
									<header class="entry-header">
										<h1 class="entry-title"><?php the_title(); ?></h1>
										
										
										<?php
											$portfolio_page_slug = get_option( 'portfolio_page_slug', "" );
											
											if ( $portfolio_page_slug != "" )
											{
												?>
													<ul class="header-links">
														<li>
															<a href="<?php echo esc_url( home_url( '/' ) ) . $portfolio_page_slug; ?>"><span class="meta-nav">&#8592;</span> <?php echo __( 'Back to Portfolio', 'read' ); ?></a>
														</li>
													</ul>
												<?php
											}
										?>
									</header>
								</div>
								
								
								<div class="entry-content">
									<?php
										$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
										
										if ( $pf_type == 'Direct URL' )
										{
											$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description', "" ) );
											
											if ( $pf_short_description != "" )
											{
												?>
													<p><?php echo $pf_short_description; ?></p>
												<?php
											}
											
											
											$pf_direct_url = stripcslashes( get_option( $post->ID . 'pf_direct_url', "" ) );
											
											if ( $pf_direct_url != "" )
											{
												$pf_link_new_tab = get_option( $post->ID . 'pf_link_new_tab', true );
												
												?>
													<p>
														<a class="button" <?php if ( $pf_link_new_tab == true ) { echo 'target="_blank"'; } ?> href="<?php echo $pf_direct_url; ?>"><?php echo __( 'Launch Project', 'read' ); ?></a>
													</p>
												<?php
											}
											
											
											if ( has_post_thumbnail() )
											{
												?>
													<p>
														<?php
															the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
														?>
													</p>
												<?php
											}
										}
										elseif ( $pf_type == 'Lightbox Featured Image' )
										{
											$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description', "" ) );
											
											if ( $pf_short_description != "" )
											{
												?>
													<p><?php echo $pf_short_description; ?></p>
												<?php
											}
											
											
											if ( has_post_thumbnail() )
											{
												?>
													<p>
														<?php
															the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
														?>
													</p>
												<?php
											}
										}
									?>
									
									
									<?php
										the_content();
									?>
									
									
									<?php
										wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
									?>
								</div>
								
								
								<div class="layout-full">
									<nav class="row nav-single">
										<div class="col-sm-6 nav-previous">
											<?php
												next_post_link( '<h4>' . __( 'PREVIOUS PROJECT', 'read' ) . '</h4>' . '%link', '<span class="meta-nav">&#8592;</span> %title' );
											?>
										</div>
										
										<div class="col-sm-6 nav-next">
											<?php
												previous_post_link( '<h4>' . __( 'NEXT PROJECT', 'read' ) . '</h4>' . '%link', '%title <span class="meta-nav">&#8594;</span>' );
											?>
										</div>
									</nav>
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


<?php
	get_footer();
?>