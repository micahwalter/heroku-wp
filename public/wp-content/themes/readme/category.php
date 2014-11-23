<?php
	if ( isset( $_GET['blog_type'] ) )
	{
		if ( $_GET['blog_type'] == 'simple' )
		{
			get_template_part( 'blog', 'simple' );
		}
		elseif ( $_GET['blog_type'] == 'alternate' )
		{
			get_template_part( 'blog', 'alternate' );
		}
		elseif ( $_GET['blog_type'] == 'masonry' )
		{
			get_template_part( 'blog', 'masonry' );
		}
		elseif ( $_GET['blog_type'] == 'masonry_alternate' )
		{
			get_template_part( 'blog', 'masonry_alternate' );
		}
		else
		{
			get_template_part( 'blog', 'regular' );
		}
	}
	else
	{
		$blog_type = get_option( 'category_archive_type', 'Regular' );
		
		
		if ( $blog_type == 'Simple' )
		{
			get_template_part( 'blog', 'simple' );
		}
		elseif ( $blog_type == 'Alternate' )
		{
			get_template_part( 'blog', 'alternate' );
		}
		elseif ( $blog_type == 'Masonry' )
		{
			get_template_part( 'blog', 'masonry' );
		}
		elseif ( $blog_type == 'Masonry Alternate' )
		{
			get_template_part( 'blog', 'masonry_alternate' );
		}
		else
		{
			get_template_part( 'blog', 'regular' );
		}
	}
?>