<?php
	$post_sidebar = 'Yes';


	// ===============================================================


	if ( isset( $_GET['post_sidebar'] ) )
	{
		if ( $_GET['post_sidebar'] == 'no' )
		{
			$post_sidebar = 'No';
		}
		else
		{
			$post_sidebar = 'Yes';
		}
	}
	else
	{
		$post_sidebar = get_option( 'post_sidebar', 'Yes' );
	}


	// ===============================================================


	if ( has_post_format( 'audio' ) || has_post_format( 'video' ) || has_post_format( 'gallery' ) )
	{
		if ( has_post_thumbnail() )
		{
			if ( $post_sidebar == 'No' )
			{
				get_template_part( 'post_custom', 'feat_img_no_sidebar' );
			}
			else
			{
				get_template_part( 'post_custom', 'feat_img_sidebar' );
			}
		}
		else
		{
			if ( $post_sidebar == 'No' )
			{
				get_template_part( 'post_custom', 'no_feat_img_no_sidebar' );
			}
			else
			{
				get_template_part( 'post_custom', 'no_feat_img_sidebar' );
			}
		}
	}
	else
	{
		if ( has_post_thumbnail() )
		{
			if ( $post_sidebar == 'No' )
			{
				get_template_part( 'post_other', 'feat_img_no_sidebar' );
			}
			else
			{
				get_template_part( 'post_other', 'feat_img_sidebar' );
			}
		}
		else
		{
			if ( $post_sidebar == 'No' )
			{
				get_template_part( 'post_other', 'no_feat_img_no_sidebar' );
			}
			else
			{
				get_template_part( 'post_other', 'no_feat_img_sidebar' );
			}
		}
	}
?>