<?php
	get_header();
?>


<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<header class="entry-header">
				<div class="layout-fixed">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
					
					
					<ul id="filters" class="filters">
						<?php
							$all_departments = get_categories( array( 'type' => 'portfolio', 'taxonomy' => 'department' ) );
							$parent_department_slug = get_query_var( 'term' );
							$parent_department_id = "";
							
							foreach ( $all_departments as $one_department ) :
							
								if ( $one_department->slug == $parent_department_slug )
								{
									$parent_department_id = $one_department->term_id;
								}
								
							endforeach;
							
							
							$pf_terms = get_categories( array( 'type' => 'portfolio', 'taxonomy' => 'department', 'child_of' => $parent_department_id ) );
							
							if ( count( $pf_terms ) >= 2 )
							{
								?>
									<li class="current pf-all-items">
										<a href="#" data-filter="*"><?php echo __( 'ALL', 'read' ); ?></a>
									</li>
								<?php
							}
							
							
							foreach ( $pf_terms as $pf_term )
							{
								?>
									<li>
										<a href="<?php echo get_home_url() . '/department/' . $pf_term->slug; ?>" data-filter=".<?php echo $pf_term->slug; ?>"><?php echo $pf_term->name; ?></a>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</header>
			
			
			<div class="layout-full">
				<?php
					$portfolio_layout = get_option( 'portfolio_layout', 'masonry' );
					
					$portfolio_columns = get_option( 'portfolio_columns', '340' );
				?>
				<div class="portfolio media-grid masonry" data-layout="<?php echo $portfolio_layout; ?>" data-item-width="<?php echo $portfolio_columns; ?>">
					<?php
						$args_portfolio = array( 'post_type' => 'portfolio', 'department' => $parent_department_slug, 'posts_per_page' => -1 );
						$loop_portfolio = new WP_Query( $args_portfolio );
						
						if ( $loop_portfolio->have_posts() ) :
							while ( $loop_portfolio->have_posts() ) : $loop_portfolio->the_post();
								
								$pf_type = get_option( get_the_ID() . 'pf_type', 'Standard' );
								$pf_type_out = "";
								
								if ( $pf_type == 'Standard' ) { $pf_type_out = ""; }
								elseif ( $pf_type == 'Lightbox Featured Image' ) { $pf_type_out = 'image'; }
								elseif ( $pf_type == 'Lightbox Gallery' ) { $pf_type_out = 'image'; }
								elseif ( $pf_type == 'Lightbox Video' ) { $pf_type_out = 'video'; }
								elseif ( $pf_type == 'Lightbox Audio' ) { $pf_type_out = 'audio'; }
								elseif ( $pf_type == 'Direct URL' ) { $pf_type_out = 'url'; }
								
								
								$terms = get_the_terms( get_the_ID(), 'department' );
								$on_draught = "";
								
								if ( $terms && ! is_wp_error( $terms ) ) :
									
									$draught_links = array();
									
									foreach ( $terms as $term )
									{
										$draught_links[] = $term->slug;
									}
									
									$on_draught = join( " ", $draught_links );
									
								endif;
								
								
								$pf_thumb_size = get_option( get_the_ID() . 'pf_thumb_size' );
								
								?>
									<div id="post-<?php the_ID(); ?>" class="media-cell hentry <?php echo $pf_thumb_size; ?> <?php echo $on_draught; ?>">
										<?php
											if ( has_post_thumbnail() )
											{
												?>
													<div class="media-box <?php echo $pf_type_out; ?>">
														<?php
															if ( $pf_thumb_size == 'x2' )
															{
																the_post_thumbnail( 'theme_image_size_1200', array( 'alt' => get_the_title(), 'title' => "" ) );
															}
															else
															{
																the_post_thumbnail( 'theme_image_size_600', array( 'alt' => get_the_title(), 'title' => "" ) );
															}
														?>
														
														<div class="mask"></div>
														
														<?php
															if ( $pf_type == 'Standard' )
															{
																?>
																	<a href="<?php the_permalink(); ?>"></a>
																<?php
															}
															elseif ( $pf_type == 'Lightbox Featured Image' )
															{
																$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
																
																$featured_image_url = $featured_image[0];
																
																?>
																	<a class="lightbox" title="<?php the_title_attribute(); ?>" href="<?php echo $featured_image_url; ?>"></a>
																<?php
															}
															elseif ( $pf_type == 'Lightbox Gallery' )
															{
																the_content();
															}
															elseif ( $pf_type == 'Lightbox Video' )
															{
																the_content();
															}
															elseif ( $pf_type == 'Lightbox Audio' )
															{
																the_content();
															}
															elseif ( $pf_type == 'Direct URL' )
															{
																$pf_direct_url = stripcslashes( get_option( get_the_ID() . 'pf_direct_url' ) );
																
																$pf_link_new_tab = get_option( get_the_ID() . 'pf_link_new_tab', true );
																
																?>
																	<a <?php if ( $pf_link_new_tab ) { echo 'target="_blank"'; } ?> href="<?php echo $pf_direct_url; ?>"></a>
																<?php
															}
														?>
													</div>
													
													<div class="media-cell-desc">
														<h3><?php the_title(); ?></h3>
														
														<?php
															$pf_short_description = stripcslashes( get_option( get_the_ID() . 'pf_short_description', "" ) );
														?>
														<p class="category"><?php echo $pf_short_description; ?></p>
													</div>
												<?php
											}
											else
											{
												?>
													<div class="media-cell-desc">
														<h3>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
														
														<?php
															$pf_short_description = stripcslashes( get_option( get_the_ID() . 'pf_short_description', "" ) );
														?>
														<p class="category"><?php echo $pf_short_description; ?></p>
													</div>

												<?php
											}
										?>
									</div>
								<?php
							endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
	get_footer();
?>