<?php
	$gl_images_count =  get_option( $post->ID . 'gl_images_count', '0' );
	
	if ( $gl_images_count != '0' )
	{
		?>
			<div class="flexslider" data-autoplay="false" data-interval="3000" data-animation="slide" data-direction="horizontal" data-animationSpeed="600"  data-pauseOnHover="true">
				<ul class="slides">
					<?php
						for ( $i = 0; $i < $gl_images_count; $i++ )
						{
							$gl_image = stripcslashes( get_option( $post->ID . 'gl_image' . $i, "" ) );
							
							
							if ( $gl_image != "" )
							{
								$gl_image_title = stripcslashes( get_option( $post->ID . 'gl_image_title' . $i, "" ) );
								
								
								?>
									<li>
										<img alt="<?php echo $gl_image_title; ?>" src="<?php echo $gl_image; ?>">
										
										<p class="flex-title"><?php echo $gl_image_title; ?></p>
									</li>
								<?php
							}
						}
					?>
				</ul>
			</div>
		<?php
	}
?>