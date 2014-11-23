<div class="media-wrap">
	<?php
		$featured_image_url = "";
		
		if ( has_post_thumbnail() )
		{
			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			
			$featured_image_url = $featured_image[0];
		}
		
		
		$format_details_media_type = get_option( $post->ID . 'format_details_media_type', 'iframe_code' );
		
		$format_details_media = stripcslashes( get_option( $post->ID . 'format_details_media', "" ) );
		
		if ( $format_details_media_type == 'iframe_code' )
		{
			echo $format_details_media;
		}
		elseif ( $format_details_media_type == 'media_url' )
		{
			if ( has_post_format( 'video' ) )
			{
				?>
					<video src="<?php echo $format_details_media; ?>" poster="<?php echo $featured_image_url; ?>" preload="none" style="width: 100%; height: 100%;"></video>
				<?php
			}
			elseif ( has_post_format( 'audio' ) )
			{
				if ( $featured_image_url != "" )
				{
					?>
						<img alt="" src="<?php echo $featured_image_url; ?>">
					<?php
				}
				
				?>
					<audio preload="none" src="<?php echo $format_details_media; ?>" style="width: 100%;"></audio>
				<?php
			}
		}
	?>
</div>