<?php
	$previous_post = get_adjacent_post();
	
	
	if ( ! empty( $previous_post ) )
	{
		$previous_post_id = $previous_post->ID;
		
		$previous_post_author_id = $previous_post->post_author;
		
		
		$featured_image_out = "";
		
		if ( has_post_thumbnail( $previous_post_id ) )
		{
			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post_id ), 'full' );
			
			$featured_image_out = 'style="background-image: url( ' .  $featured_image[0] . ' );"';
			
			$no_featured_image = "";
		}
		else
		{
			$no_featured_image = 'no-featured-image';
		}
		
		
		?>
			<aside class="read-next">
				<div class="post-thumbnail <?php echo $no_featured_image; ?>" <?php echo $featured_image_out; ?>>
					<header class="entry-header">
						<div class="layout-fixed">
							<h3><?php echo __( 'NEXT READING', 'read' ); ?></h3>
							
							<div class="entry-meta">
								<span class="cat-links">
									<?php
										the_category( ' ', "", $previous_post_id );
									?>
								</span>
							</div>
							
							
							<h1 class="entry-title">
								<a href="<?php echo get_permalink( $previous_post_id ); ?>"><?php echo get_the_title( $previous_post_id ); ?></a>
							</h1>
							
							
							<div class="entry-meta">
								<span class="entry-date">
									<i class="pw-icon-clock"></i>
									
									<a href="<?php echo get_permalink( $previous_post_id ); ?>" rel="bookmark">
										<time class="entry-date" datetime="2012-02-13T04:34:10+00:00"><?php echo get_the_date( null, $previous_post_id ); ?></time>
									</a>
								</span>
								
								
								<span class="comment-link">
									<i class="pw-icon-comment"></i>
									
									<?php
										$all_comments = wp_count_comments( $previous_post_id );
										
										$approved_comments = $all_comments->approved;
										
										if ( $approved_comments >= 2 )
										{
											$approved_comments .= ' ' . __( 'Comments', 'read' );
										}
										else
										{
											$approved_comments .= ' ' . __( 'Comment', 'read' );
										}
									?>
									<a href="<?php echo get_permalink( $previous_post_id ); ?>"><?php echo $approved_comments; ?></a>
								</span>
								
								
								<span class="byline">
									<span class="author vcard">
										<i class="pw-icon-user-outline"></i>
										
										<a class="url fn n" href="<?php echo get_author_posts_url( $previous_post_author_id ); ?>" rel="author"><?php the_author_meta( 'display_name', $previous_post_author_id ); ?></a>
									</span>
								</span>
								
								<span class="read-time"><i class="pw-icon-bookmark-empty-1"></i><span class="eta"></span> <?php echo __( 'read', 'read' ); ?></span>
							</div>
						</div>
					</header>
				</div>
			</aside>
		<?php
	}
?>