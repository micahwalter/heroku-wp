<?php


/* ============================================================================================================================================= */


	function pixelwars_theme_enqueue_login()
	{
		wp_enqueue_script( 'jquery' );
	}
	
	add_action( 'login_enqueue_scripts', 'pixelwars_theme_enqueue_login' );


/* ============================================================================================================================================= */


	function pixelwars_theme_enqueue_admin()
	{
		wp_enqueue_style( 'admin', get_template_directory_uri() . '/admin/admin.css' );
		wp_enqueue_style( 'thickbox' );
		
		
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
	}
	
	add_action( 'admin_enqueue_scripts', 'pixelwars_theme_enqueue_admin' );


/* ============================================================================================================================================= */


	function pixelwars_theme_enqueue()
	{
		$extra_char_set = false;
		
		global $pixelwars_subset;
		
		$pixelwars_subset = '&subset=';
		
		
		if ( get_option( 'char_set_latin', false ) ) { $pixelwars_subset .= 'latin,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_latin_ext', false ) ) { $pixelwars_subset .= 'latin-ext,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_cyrillic', false ) ) { $pixelwars_subset .= 'cyrillic,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_cyrillic_ext', false ) ) { $pixelwars_subset .= 'cyrillic-ext,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_greek', false ) ) { $pixelwars_subset .= 'greek,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_greek_ext', false ) ) { $pixelwars_subset .= 'greek-ext,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_vietnamese', false ) ) { $pixelwars_subset .= 'vietnamese,'; $extra_char_set = true; }
		
		if ( $extra_char_set == false ) { $pixelwars_subset = ""; } else { $pixelwars_subset = substr( $pixelwars_subset, 0, -1 ); }
		
		
		wp_enqueue_style( 'noticia-text', '//fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' . $pixelwars_subset, null, null );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', null, null );
		wp_enqueue_style( 'fontello', get_template_directory_uri() . '/css/fonts/fontello/css/fontello.css', null, null );
		wp_enqueue_style( 'prettify', get_template_directory_uri() . '/js/google-code-prettify/prettify.css', null, null );
		wp_enqueue_style( 'uniform', get_template_directory_uri() . '/js/jquery.uniform/uniform.default.css', null, null );
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup/magnific-popup.css', null, null );
		wp_enqueue_style( 'fluidbox', get_template_directory_uri() . '/js/jquery.fluidbox/fluidbox.css', null, null );
		wp_deregister_style( 'mediaelement' );
		wp_enqueue_style( 'mediaelement', get_template_directory_uri() . '/js/mediaelement/mediaelementplayer.min.css', null, null );
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider/flexslider.css', null, null );
		wp_enqueue_style( 'selection-sharer', get_template_directory_uri() . '/js/selection-sharer/selection-sharer.css', null, null );
		wp_enqueue_style( 'elastislide', get_template_directory_uri() . '/js/responsive-image-gallery/elastislide.css', null, null );
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', null, null );
		wp_enqueue_style( '768', get_template_directory_uri() . '/css/768.css', null, null );
		wp_enqueue_style( '992', get_template_directory_uri() . '/css/992.css', null, null );
		wp_enqueue_style( '1200', get_template_directory_uri() . '/css/1200.css', null, null );
		wp_enqueue_style( '1400', get_template_directory_uri() . '/css/1400.css', null, null );
		wp_enqueue_style( 'wp-fix', get_template_directory_uri() . '/css/wp-fix.css', null, null );
		wp_enqueue_style( 'theme-style', get_stylesheet_uri(), null, null );
		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', null, null );
		wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/fastclick.js', null, null, true );
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', null, null, true );
		wp_enqueue_script( 'prettify', get_template_directory_uri() . '/js/google-code-prettify/prettify.js', null, null, true );
		wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', null, null, true );
		wp_enqueue_script( 'uniform', get_template_directory_uri() . '/js/jquery.uniform/jquery.uniform.min.js', null, null, true );
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', null, null, true );
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', null, null, true );
		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup/jquery.magnific-popup.min.js', null, null, true );
		wp_enqueue_script( 'fluidbox', get_template_directory_uri() . '/js/jquery.fluidbox/jquery.fluidbox.min.js', null, null, true );
		wp_deregister_script( 'mediaelement' );
		wp_enqueue_script( 'mediaelement', get_template_directory_uri() . '/js/mediaelement/mediaelement-and-player.min.js', null, null, true );
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider/jquery.flexslider-min.js', null, null, true );
		wp_enqueue_script( 'readingTime', get_template_directory_uri() . '/js/readingTime.js', null, null, true );
		wp_enqueue_script( 'share', get_template_directory_uri() . '/js/share.min.js', null, null, true );
		wp_enqueue_script( 'selection-sharer', get_template_directory_uri() . '/js/selection-sharer/selection-sharer.js', null, null, true );
		wp_enqueue_script( 'r-gallery', get_template_directory_uri() . '/js/responsive-image-gallery/r-gallery.js', null, null, true );
		wp_enqueue_script( 'socialstream', get_template_directory_uri() . '/js/socialstream.jquery.js', null, null, true );
		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', null, null, true );
		wp_enqueue_script( 'wp-fix', get_template_directory_uri() . '/js/wp-fix.js', null, null, true );
	}


/* ============================================================================================================================================= */


	function pixelwars_theme_setup()
	{
		add_action( 'wp_enqueue_scripts', 'pixelwars_theme_enqueue' );
		
		$lang_dir = get_template_directory() . '/languages';
		
		load_theme_textdomain( 'read', $lang_dir ); 
		
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		
		if ( is_readable( $locale_file ) )
		{
			require_once( $locale_file );
		}
	}
	
	add_action( 'after_setup_theme', 'pixelwars_theme_setup' );


/* ============================================================================================================================================= */


	function pixelwars_theme_favicons()
	{
		$favicon = get_option( 'favicon', "" );
		
		if ( $favicon != "" )
		{
			?>

<link rel="shortcut icon" href="<?php echo $favicon; ?>">

			<?php
		}
		
		
		$apple_touch_icon = get_option( 'apple_touch_icon', "" );
		
		if ( $apple_touch_icon != "" )
		{
			?>

<link rel="apple-touch-icon-precomposed" href="<?php echo $apple_touch_icon; ?>">

			<?php
		}
	}
	
	add_action( 'wp_head', 'pixelwars_theme_favicons' );
	
	add_action( 'admin_head', 'pixelwars_theme_favicons' );
	
	add_action( 'login_head', 'pixelwars_theme_favicons' );


/* ============================================================================================================================================= */


	function pixelwars_custom_login_logo_url( $url )
	{
		return esc_url( home_url( '/' ) );
	}
	
	
	function pixelwars_custom_login_logo_title()
	{
		return get_bloginfo( 'name' );
	}
	
	
	function pixelwars_theme_login_logo()
	{
		$logo_login_hide = get_option( 'logo_login_hide', false );
		
		$logo_login = get_option( 'logo_login', "" );
		
		
		if ( $logo_login_hide )
		{
			echo '<style type="text/css"> h1 { display: none; } </style>';
		}
		else
		{
			if ( $logo_login != "" )
			{
				add_filter( 'login_headerurl', 'pixelwars_custom_login_logo_url' );
				
				add_filter( 'login_headertitle', 'pixelwars_custom_login_logo_title' );
				
				
				echo '<style type="text/css">
						h1 a
						{
							background-image: url( "' . $logo_login . '" ) !important;
						}
					</style>';
			}
		}
	}
	
	add_action( 'login_head', 'pixelwars_theme_login_logo' );


/* ============================================================================================================================================= */


	function pixelwars_theme_wp_title( $title, $sep )
	{
		global $paged, $page;
		
		if ( is_feed() )
		{
			return $title;
		}
		
		
		$title .= get_bloginfo( 'name' );
		
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) )
		{
			$title = "$title $sep $site_description";
		}
		
		
		if ( $paged >= 2 || $page >= 2 )
		{
			$title = "$title $sep " . sprintf( __( 'Page %s', 'read' ), max( $paged, $page ) );
		}
		
		return $title;
	}
	
	add_filter( 'wp_title', 'pixelwars_theme_wp_title', 10, 2 );


/* ============================================================================================================================================= */


	if ( function_exists( 'add_theme_support' ) )
	{
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		
		add_theme_support( 'post-thumbnails', array( 'post', 'portfolio', 'gallery', 'page' ) );
		
		add_theme_support( 'automatic-feed-links' );
	}


/* ============================================================================================================================================= */


	if ( function_exists( 'add_editor_style' ) )
	{
		add_editor_style( 'custom-editor-style.css' );
	}


/* ============================================================================================================================================= */


	if ( ! isset( $content_width ) )
	{
		$content_width = 740;
	}


/* ============================================================================================================================================= */


	if ( function_exists( 'add_image_size' ) )
	{
		add_image_size( 'pixelwars_theme_image_size_600', 600 ); // portfolio page fetaured image 1x, gallery page featured image
		add_image_size( 'pixelwars_theme_image_size_1200', 1200 ); // portfolio page fetaured image 2x
	}


/* ============================================================================================================================================= */


	function pixelwars_theme_new_post_column_add( $columns )
	{
		return array_merge( $columns, array( 'pixelwars_post_feat_img' => __( 'Featured Image', 'read' ) ) );
	}
	
	add_filter( 'manage_posts_columns' , 'pixelwars_theme_new_post_column_add' );
	
	
	function pixelwars_theme_new_post_column_show( $column, $post_id )
	{
		if ( $column == 'pixelwars_post_feat_img' )
		{
			if ( has_post_thumbnail() )
			{
				the_post_thumbnail( 'thumbnail' );
			}
		}
	}
	
	add_action( 'manage_posts_custom_column' , 'pixelwars_theme_new_post_column_show', 10, 2 );


/* ============================================================================================================================================= */


	if ( function_exists( 'register_nav_menus' ) )
	{
		register_nav_menus( array( 'pixelwars_theme_menu_location_1' => __( 'Theme Navigation Menu', 'read' ) ) );
	}
	
	
	function pixelwars_wp_page_menu2( $args = array() )
	{
		$defaults = array(  'sort_column' => 'menu_order, post_title',
							'menu_class' => 'menu',
							'echo' => true,
							'link_before' => "",
							'link_after' => "" );
							
		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'wp_page_menu_args', $args );
		
		$menu = "";
		
		$list_args = $args;
		
		// Show Home in the menu
		if ( ! empty( $args['show_home'] ) )
		{
			if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			{
				$text = __( 'Home', 'read' );
			}
			else
			{
				$text = $args['show_home'];
			}
			
			
			$class = "";
			
			if ( is_front_page() && !is_paged() )
			{
				$class = 'class="current_page_item"';
			}
			
			$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr( $text ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
			
			// If the front page is a page, add it to the exclude list
			if ( get_option( 'show_on_front' ) == 'page' )
			{
				if ( ! empty( $list_args['exclude'] ) )
				{
					$list_args['exclude'] .= ',';
				}
				else
				{
					$list_args['exclude'] = '';
				}
				
				$list_args['exclude'] .= get_option('page_on_front');
			}
		}
		
		$list_args['echo'] = false;
		$list_args['title_li'] = "";
		$menu .= str_replace( array( "\r", "\n", "\t" ), "", wp_list_pages( $list_args ) );
		
		if ( $menu )
		{
			$menu = '<ul class="menu-default vs-nav">' . $menu . '</ul>';
		}
		
		$menu = $menu . "\n";
		$menu = apply_filters( 'wp_page_menu', $menu, $args );
		
		if ( $args['echo'] )
		{
			echo $menu;
		}
		else
		{
			return $menu;
		}
	}


/* ============================================================================================================================================= */


	if ( ! function_exists( 'pixelwars_theme_comments' ) ) :
	
		/*
			Template for comments and pingbacks.
			
			To override this walker in a child theme without modifying the comments template
			simply create your own pixelwars_theme_comments(), and that function will be used instead.
			
			Used as a callback by wp_list_comments() for displaying the comments.
		*/
		
		function pixelwars_theme_comments( $comment, $args, $depth )
		{
			$GLOBALS['comment'] = $comment;
			
			
			switch ( $comment->comment_type ) :
			
				case 'pingback' :
				
				case 'trackback' :
				
					// Display trackbacks differently than normal comments.
					?>
						<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
							<p>
								<?php
									_e( 'Pingback:', 'read' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'read' ), '<span class="edit-link">', '</span>' );
								?>
							</p>
					<?php
				break;
				
				default :
				
					// Proceed with normal comments.
					global $post;
					
					?>
					
					<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
						<article id="comment-<?php comment_ID(); ?>" class="comment">
							<header class="comment-meta comment-author vcard">
								<?php
									echo get_avatar( $comment, 150 );
									
									
									printf( '<cite class="fn">%1$s %2$s</cite>',
											get_comment_author_link(),
											// If current post author is also comment author, make it known visually.
											( $comment->user_id === $post->post_author ) ? '<span></span>' : "" );
									
									
									printf( '<a title="%3$s" href="%1$s"><i class="pw-icon-calendar-1"></i><time datetime="%2$s">%3$s</time></a>',
											esc_url( get_comment_link( $comment->comment_ID ) ),
											get_comment_time( 'c' ),
											/* translators: 1: date, 2: time */
											sprintf( __( '%1$s at %2$s', 'read' ), get_comment_date(), get_comment_time() ) );
								?>
							</header>
							
							<?php
								if ( '0' == $comment->comment_approved ) :
									?>
										<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'read' ); ?></p>
									<?php
								endif;
							?>
							
							<section class="comment-content comment">
								<?php
									comment_text();
								?>
								
								<?php
									edit_comment_link( __( 'Edit', 'read' ), '<p class="edit-link">', '</p>' );
								?>
							</section>
							
							<div class="reply">
								<?php
									comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'read' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
								?>
							</div>
						</article>
					<?php
				break;
				
			endswitch;
		}
		
	endif;


/* ============================================================================================================================================= */


	function pixelwars_theme_password_form()
	{
		global $post;
		
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		
		$o = '<form class="password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p>' . __( "This content is password protected. To view it please enter the password below:", 'responsy' ) . '</p><label for="' . $label . '">' . __( "Password:", 'responsy' ) . ' </label><input type="password" id="' . $label . '" name="post_password" class="post-password" size="20" maxlength="20" /><input type="submit" name="Submit" class="btn" value="' . esc_attr__( "Submit", 'responsy' ) . '" /></form>';
		
		return $o;
	}
	
	add_filter( 'the_password_form', 'pixelwars_theme_password_form' );


/* ============================================================================================================================================= */


	function pixelwars_theme_excerpt_password_form( $excerpt )
	{
		if ( post_password_required() )
		{
			$excerpt = get_the_password_form();
		}
		
		return $excerpt;
	}
	
	add_filter( 'the_excerpt', 'pixelwars_theme_excerpt_password_form' );


/* ============================================================================================================================================= */


	function pixelwars_theme_excerpt_more( $more )
	{
		return '... <span class="more"><a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) . '</a></span>';
	}
	
	add_filter( 'excerpt_more', 'pixelwars_theme_excerpt_more' );


/* ============================================================================================================================================= */


	function pixelwars_theme_excerpt_max_charlength( $charlength )
	{
		$excerpt = get_the_excerpt();
		$charlength++;
		
		if ( mb_strlen( $excerpt ) > $charlength )
		{
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			
			if ( $excut < 0 )
			{
				echo mb_substr( $subex, 0, $excut );
			}
			else
			{
				echo $subex;
			}
			
			echo '...';
		}
		else
		{
			echo $excerpt;
		}
	}


/* ============================================================================================================================================= */


	function pixelwars_og_description_max_charlength( $charlength )
	{
		$excerpt = get_post_field( 'post_content', get_the_ID(), 'attribute' );
		$charlength++;
		
		if ( mb_strlen( $excerpt ) > $charlength )
		{
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			
			if ( $excut < 0 )
			{
				return mb_substr( $subex, 0, $excut );
			}
			else
			{
				return $subex;
			}
			
			return '[...]';
		}
		else
		{
			return $excerpt;
		}
	}
	
	
	function pixelwars_theme_open_graph_protocol()
	{
		if ( is_singular() )
		{
			$og_description = pixelwars_og_description_max_charlength( 140 );
			
			$og_title = get_the_title();
			
			$og_image_url = "";
			
			if ( has_post_thumbnail() )
			{
				$og_image_source = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
				
				$og_image_url = $og_image_source[0];
			}
			
			
			if ( $og_image_url != "" )
			{
				echo "\n" . '<meta property="og:image" content="' . $og_image_url . '">' . "\n";
			}
			
			
			if ( $og_title != "" )
			{
				echo '<meta property="og:title" content="' . $og_title . '">' . "\n";
			}
			
			
			if ( $og_description != "" )
			{
				echo '<meta property="og:description" content="' . $og_description . '">' . "\n\n";
			}
		}
	}
	
	
	$pixelwars_theme_og_protocol = get_option( 'pixelwars_theme_og_protocol', 'No' );
	
	if ( $pixelwars_theme_og_protocol == 'Yes' )
	{
		add_action( 'wp_head', 'pixelwars_theme_open_graph_protocol' );
	}


/* ============================================================================================================================================= */


	$pixelwars_theme_seo_fields = get_option( 'pixelwars_theme_seo_fields', 'No' );
	
	
	function pixelwars_theme_custom_box_show_seo( $post )
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field( 'pixelwars_theme_custom_box_show_seo', 'pixelwars_theme_custom_box_nonce_seo' );
				?>
				
				
				<p>
					<label for="my_seo_description"><?php echo __( 'Description:', 'read' ); ?></label>
					
					<?php
						$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description' ) );
					?>
					<textarea id="my_seo_description" name="my_seo_description" rows="4" cols="46" class="widefat"><?php echo $my_seo_description; ?></textarea>
				</p>
				
				
				<p>
					<label for="my_seo_keywords"><?php echo __( 'Keywords:', 'read' ); ?></label>
					
					<?php
						$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords' ) );
					?>
					<textarea id="my_seo_keywords" name="my_seo_keywords" rows="4" cols="46" class="widefat"><?php echo $my_seo_keywords; ?></textarea>
				</p>
				
				<p class="howto"><?php echo __( 'Separate keywords with commas', 'read' ); ?></p>
			</div>
		<?php
	}
	
	
	function pixelwars_theme_custom_box_add_seo()
	{
		add_meta_box( 'pixelwars_theme_custom_box_seo_post', __( 'SEO', 'read' ), 'pixelwars_theme_custom_box_show_seo', 'post', 'side', 'low' );
		
		add_meta_box( 'pixelwars_theme_custom_box_seo_page', __( 'SEO', 'read' ), 'pixelwars_theme_custom_box_show_seo', 'page', 'side', 'low' );
		
		
		$args = array( '_builtin' => false );
		$post_types = get_post_types( $args ); 
		
		foreach ( $post_types as $post_type )
		{
			add_meta_box( 'pixelwars_theme_custom_box_seo_' . $post_type, __( 'SEO', 'read' ), 'pixelwars_theme_custom_box_show_seo', $post_type, 'side', 'low' );
		}
	}
	
	
	if ( $pixelwars_theme_seo_fields == 'Yes' )
	{
		add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_seo' );
	}
	
	
	function pixelwars_theme_custom_box_save_seo( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_seo'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_seo'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_seo' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'my_seo_description', $_POST['my_seo_description'] );
		update_option( $post_id . 'my_seo_keywords', $_POST['my_seo_keywords'] );
	}
	
	
	if ( $pixelwars_theme_seo_fields == 'Yes' )
	{
		add_action( 'save_post', 'pixelwars_theme_custom_box_save_seo' );
	}
	
	
	function pixelwars_theme_seo_wp_head()
	{
		global $post, $post_ID;
		
		
		if ( is_singular() )
		{
			$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description', "" ) );
			$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords', "" ) );
			
			
			if ( $my_seo_description != "" )
			{
				echo "\n" . '<meta name="description" content="' . $my_seo_description . '">' . "\n";
			}
			
			
			if ( $my_seo_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $my_seo_keywords . '">' . "\n";
			}
		}
		else
		{
			$site_description = stripcslashes( get_option( 'site_description', "" ) );
			$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
			
			
			if ( $site_description != "" )
			{
				echo "\n" . '<meta name="description" content="' . $site_description . '">' . "\n";
			}
			
			
			if ( $site_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $site_keywords . '">' . "\n";
			}
		}
	}
	
	
	if ( $pixelwars_theme_seo_fields == 'Yes' )
	{
		add_action( 'wp_head', 'pixelwars_theme_seo_wp_head' );
	}


/* ============================================================================================================================================= */


	function pixelwars_theme_custom_box_show_post_title_visibility( $post )
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field( 'pixelwars_theme_custom_box_show_post_title_visibility', 'pixelwars_theme_custom_box_nonce_post_title_visibility' );
				?>
				
				<p>
					<?php
						$hide_post_title = get_option( $post->ID . 'hide_post_title', false );
						
						if ( $hide_post_title )
						{
							$hide_post_title_out = 'checked="checked"';
						}
						else
						{
							$hide_post_title_out = "";
						}
					?>
					<label for="hide_post_title"><input type="checkbox" id="hide_post_title" name="hide_post_title" <?php echo $hide_post_title_out; ?>> Hide title</label>
				</p>
			</div>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_post_title_visibility()
	{
		add_meta_box( 'pixelwars_theme_custom_box_post_title_visibility_post', __( 'Title Visibility', 'read' ), 'pixelwars_theme_custom_box_show_post_title_visibility', 'post', 'side', 'high' );
		
		add_meta_box( 'pixelwars_theme_custom_box_post_title_visibility_page', __( 'Title Visibility', 'read' ), 'pixelwars_theme_custom_box_show_post_title_visibility', 'page', 'side', 'high' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_post_title_visibility' );
	
	
	function pixelwars_theme_custom_box_save_post_title_visibility( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_post_title_visibility'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_post_title_visibility'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_post_title_visibility' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'hide_post_title', $_POST['hide_post_title'] );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_post_title_visibility' );


/* ============================================================================================================================================= */


	function pixelwars_theme_custom_box_show_format_details( $post )
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field( 'pixelwars_theme_custom_box_show_format_details', 'pixelwars_theme_custom_box_nonce_format_details' );
				?>
				
				
				<p class="howto"><?php echo __( '- For Audio and Video formats.', 'read' ); ?></p>
				
				
				<p>
					<?php
						$format_details_media_type = get_option( $post->ID . 'format_details_media_type', 'iframe_code' );
					?>
					
					<label>
						<input type="radio" name="format_details_media_type" <?php if ( $format_details_media_type == 'iframe_code' ) { echo 'checked="checked"'; } ?> value="iframe_code"> <?php echo __( 'Iframe Code: (YouTube, Vimeo, SoundCloud etc.)', 'read' ); ?>
					</label>
					
					<br>
					
					<label>
						<input type="radio" name="format_details_media_type" <?php if ( $format_details_media_type == 'media_url' ) { echo 'checked="checked"'; } ?> value="media_url"> <?php echo __( 'Media URL: (Self-hosted audio/video)', 'read' ); ?>
					</label>
				</p>
				
				
				<p>
					<?php
						$format_details_media = stripcslashes( get_option( $post->ID . 'format_details_media', "" ) );
					?>
					<textarea id="format_details_media" name="format_details_media" rows="4" cols="46" class="widefat"><?php echo $format_details_media; ?></textarea>
				</p>
			</div>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_format_details()
	{
		add_meta_box( 'pixelwars_theme_custom_box_format_details', __( 'Format Details - Media', 'read' ), 'pixelwars_theme_custom_box_show_format_details', 'post', 'normal', 'high' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_format_details' );
	
	
	function pixelwars_theme_custom_box_save_format_details( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_format_details'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_format_details'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_format_details' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'format_details_media_type', $_POST['format_details_media_type'] );
		update_option( $post_id . 'format_details_media', $_POST['format_details_media'] );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_format_details' );


/* ============================================================================================================================================= */


	function pixelwars_theme_custom_box_show_gallery_2( $post )
	{
		?>
			<?php
				wp_nonce_field( 'pixelwars_theme_custom_box_show_gallery_2', 'pixelwars_theme_custom_box_nonce_gallery_2' );
			?>
			
			
			<p class="howto"><?php echo __( '- For Gallery format.', 'read' ); ?></p>
			
			
			<?php
				$gl_images_count =  get_option( $post->ID . 'gl_images_count', '0' );
				
				for ( $i = 0; $i < $gl_images_count; $i++ )
				{
					$gl_image = stripcslashes( get_option( $post->ID . 'gl_image' . $i, "" ) );
					
					if ( $gl_image != "" )
					{
						$gl_image_title = stripcslashes( get_option( $post->ID . 'gl_image_title' . $i, "" ) );
						
						global $wpdb;
						
						$attachment_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE guid = '$gl_image'" );
						
						$image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
						
						?>
							<p style="float: left; margin-right: 10px;">
								<img style="display: block; max-width: 150px; margin-bottom: 10px;" alt="" src="<?php echo $image_attributes[0]; ?>">
								
								<input type="text" name="gl_image_title[]" style="display: block; margin-bottom: 10px;" placeholder="Image Title" value="<?php echo $gl_image_title; ?>">
								
								<input type="text" name="gl_image[]" class="upload code2" style="display: none; width: 50%;" value="<?php echo $gl_image; ?>">
								
								<input type="button" class="button upload-button" value="<?php echo __( 'Change', 'read' ); ?>">
								
								<a style="display: inline-block; margin-left: 10px;" class="gallery-remove-image" href="#"><?php echo __( 'Remove', 'read' ); ?></a>
							</p>
						<?php
					}
				}
			?>
			
			
			<div style="clear: both;"></div>
			
			
			<div class="app"></div>
			
			
			<p>
				<a id="gallery-add-new-image" href="#"><?php echo __( 'Add Image', 'read' ); ?></a>
				
				<input type="hidden" id="gl_images_count" name="gl_images_count" value="<?php echo $gl_images_count; ?>">
			</p>
			
			
			<script>
				jQuery(document).ready(function($)
				{
					// Image Upload
					var uploadID = "";

					jQuery( '.upload-button' ).live( 'click', function()
					{
						window.send_to_editor = function( html )
						{
							imgurl = jQuery( 'img', html ).attr( 'src' );
							uploadID.val( imgurl );
							uploadID.trigger( 'change' );
							tb_remove();
						}
						
						uploadID = jQuery(this).prev( 'input' );
						formfield = jQuery( '.upload' ).attr( 'name' );
						
						tb_show( '', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
						return false;
					});
					// end Image Upload
					
					
					// Add New Image
					$( '#gallery-add-new-image' ).click( function()
					{
						var str = '<p><input type="text" name="gl_image_title[]" placeholder="Image Title" value=""><input type="text" name="gl_image[]" class="upload code2" style="width: 50%;" placeholder="Image Url" value=""><input type="button" class="button upload-button" value="Browse"></p>';
						
						$( '.app' ).append( str );
						
						var gl_images_count = $( '#gl_images_count' ).val();
						
						gl_images_count++;
						
						$( '#gl_images_count' ).val( gl_images_count );
						
						return false;
					});
					// end Add New Image
					
					
					// Remove Image
					$( '.gallery-remove-image' ).click( function()
					{
						$( this ).parent( 'p' ).find( 'input.upload' ).val( "" );
						
						$( this ).parent( 'p' ).hide( 'slow' );
						
						return false;
					});
					// end Remove Image
					
					
					// Change Image
					function addImageChange()
					{
					    $( 'input.upload' ).bind( 'change', function()
					    {
							$( this ).prev( 'img' ).attr( 'src', $( this ).val() );
					    });
					} 
					
					addImageChange();
					// end Change Image
				});
			</script>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_gallery_2()
	{
		add_meta_box( 'pixelwars_theme_custom_box_gallery_2', __( 'Format Details - Slider', 'read' ), 'pixelwars_theme_custom_box_show_gallery_2', 'post', 'normal', 'high' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_gallery_2' );


	function pixelwars_theme_custom_box_save_gallery_2( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_gallery_2'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_gallery_2'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_gallery_2' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		$gl_images_count = $_POST['gl_images_count'];
		
		for ( $i = 0; $i < $gl_images_count; $i++ )
		{
			update_option( $post_id . 'gl_image' . $i , $_POST['gl_image'][$i] );
			update_option( $post_id . 'gl_image_title' . $i , esc_attr( $_POST['gl_image_title'][$i] ) );
		}
		
		update_option( $post_id . 'gl_images_count' , $gl_images_count );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_gallery_2' );


/* ============================================================================================================================================= */


	if ( function_exists( 'register_sidebar' ) )
	{
		register_sidebar( array('name'          => __( 'Blog Sidebar', 'read' ),
								'id'            => 'pixelwars_blog_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>' ) );
		
		
		register_sidebar( array('name'          => __( 'Page Sidebar', 'read' ),
								'id'            => 'pixelwars_page_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>' ) );
		
		
		register_sidebar( array('name'          => __( 'Header Social Icons', 'read' ),
								'id'            => 'pixelwars_header_sidebar',
								'description'   => 'Use social media shortcodes with the Text widget in this widget location to add icons to your header.',
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>' ) );
		
		
		register_sidebar( array('name'          => __( 'Footer 1', 'read' ),
								'id'            => 'pixelwars_footer_1',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>' ) );
		
		
		register_sidebar( array('name'          => __( 'Footer 2', 'read' ),
								'id'            => 'pixelwars_footer_2',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>' ) );
		
		
		register_sidebar( array('name'          => __( 'Footer 3', 'read' ),
								'id'            => 'pixelwars_footer_3',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>' ) );
		
		
		register_sidebar( array('name'          => __( 'Footer 4', 'read' ),
								'id'            => 'pixelwars_footer_4',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>' ) );
		
		
		$sidebars_with_commas = get_option( 'sidebars_with_commas' );
		
		if ( $sidebars_with_commas != "" )
		{
			$sidebars = preg_split("/[\s]*[,][\s]*/", $sidebars_with_commas);
			
			foreach ( $sidebars as $sidebar_name )
			{
				register_sidebar( array('name'          => $sidebar_name,
										'id'            => $sidebar_name,
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget'  => '</aside>',
										'before_title'  => '<h3 class="widget-title">',
										'after_title'   => '</h3>' ) );
			}
		}
	}


/* ============================================================================================================================================= */


	function pixelwars_theme_custom_box_show_sidebar( $post )
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field( 'pixelwars_theme_custom_box_show_sidebar', 'pixelwars_theme_custom_box_nonce_sidebar' );
				?>
				
				
				<p>
					<label for="my_sidebar">Select sidebar:</label>
					
					<?php
						$my_sidebar = get_option( $post->ID . 'my_sidebar', 'pixelwars_page_sidebar' );
					?>
					<select id="my_sidebar" name="my_sidebar" class="widefat">
						<option <?php if ( $my_sidebar == 'pixelwars_page_sidebar' ) { echo 'selected="selected"'; } ?> value="pixelwars_page_sidebar"><?php echo __( 'Page Sidebar', 'read' ); ?></option>
						
						<option <?php if ( $my_sidebar == 'pixelwars_blog_sidebar' ) { echo 'selected="selected"'; } ?> value="pixelwars_blog_sidebar"><?php echo __( 'Blog Sidebar', 'read' ); ?></option>
						
						<?php
							$sidebars_with_commas = get_option( 'sidebars_with_commas' );
							
							if ( $sidebars_with_commas != "" )
							{
								$sidebars = preg_split( "/[\s]*[,][\s]*/", $sidebars_with_commas );

								foreach ( $sidebars as $sidebar_name )
								{
									$selected = "";
									
									if ( $my_sidebar == $sidebar_name )
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . $sidebar_name . '">' . $sidebar_name . '</option>';
								}
							}
						?>
					</select>
				</p>
				
				
				<p class="howto">
					Select Page with Sidebar template.<br>Create new from Theme Options > Sidebar.
				</p>
			</div>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_sidebar()
	{
		add_meta_box( 'pixelwars_theme_custom_box_sidebar', __( 'Sidebar', 'read' ), 'pixelwars_theme_custom_box_show_sidebar', 'page', 'side', 'low' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_sidebar' );
	
	
	function pixelwars_theme_custom_box_save_sidebar( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_sidebar'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_sidebar'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_sidebar' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'my_sidebar', $_POST['my_sidebar'] );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_sidebar' );


/* ============================================================================================================================================= */


	class pixelwars_Flickr_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('pixelwars_flickr_widget',
								__( '- Flickr', 'read' ),
								array( 'description' => __( 'Flickr widget.', 'read' ) ) );
		}
		
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			
			
			if ( isset( $instance[ 'user' ] ) ) { $user = $instance[ 'user' ]; } else { $user = ""; }
			
			if ( isset( $instance[ 'number_of_items' ] ) ) { $number_of_items = $instance[ 'number_of_items' ]; } else { $number_of_items = '8'; }
			
			
			?>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Title:', 'read' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				
				
				<p>
					<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php echo __( 'User:', 'read' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" value="<?php echo esc_attr( $user ); ?>">
				</p>
				
				
				<p>
					<label for="<?php echo $this->get_field_id( 'number_of_items' ); ?>"><?php echo __( 'Number of items to show:', 'read' ); ?></label>
					
					<input type="text" id="<?php echo $this->get_field_id( 'number_of_items' ); ?>" name="<?php echo $this->get_field_name( 'number_of_items' ); ?>" size="3" value="<?php echo esc_attr( $number_of_items ); ?>">
				</p>
			<?php
		}
		
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			
			$instance['user'] = strip_tags( $new_instance['user'] );
			
			$instance['number_of_items'] = strip_tags( $new_instance['number_of_items'] );
			
			
			return $instance;
		}
		
		
		public function widget( $args, $instance )
		{
			extract( $args );
			
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			
			$user = apply_filters( 'widget_user', $instance['user'] );
			
			$number_of_items = apply_filters( 'widget_number_of_items', $instance['number_of_items'] );
			
			
			echo $before_widget;
			
			
				if ( ! empty( $title ) )
				{
					echo $before_title . $title . $after_title;
				}
				
				
				?>
					<div class="flickr-badges flickr-badges-s">
						<script src="http://www.flickr.com/badge_code_v2.gne?size=s&amp;count=<?php echo $number_of_items; ?>&amp;display=random&amp;layout=x&amp;source=user&amp;user=<?php echo $user; ?>"></script>
					</div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action( 'widgets_init', create_function( '', 'register_widget( "pixelwars_flickr_widget" );' ) );


/* ============================================================================================================================================= */


	class pixelwars_Social_Feed_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('pixelwars_social_feed_widget',
								__( '- Social Feed', 'read' ),
								array( 'description' => __( 'Social feed widget.', 'read' ) ) );
		}
		
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			
			
			if ( isset( $instance[ 'network' ] ) ) { $network = $instance[ 'network' ]; } else { $network = ""; }
			
			if ( isset( $instance[ 'user' ] ) ) { $user = $instance[ 'user' ]; } else { $user = ""; }
			
			if ( isset( $instance[ 'number_of_items' ] ) ) { $number_of_items = $instance[ 'number_of_items' ]; } else { $number_of_items = '8'; }
			
			
			?>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Title:', 'read' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				
				
				<p>
					<label for="<?php echo $this->get_field_id( 'network' ); ?>"><?php echo __( 'Network:', 'read' ); ?></label>
					
					<select class="widefat" id="<?php echo $this->get_field_id( 'network' ); ?>" name="<?php echo $this->get_field_name( 'network' ); ?>">
					
						<option <?php if ( $network == 'instagram' ) { echo 'selected="selected"'; } ?> value="instagram">Instagram</option>
						
						<option <?php if ( $network == 'pinterest' ) { echo 'selected="selected"'; } ?> value="pinterest">Pinterest</option>
						
						<option <?php if ( $network == 'dribbble' ) { echo 'selected="selected"'; } ?> value="dribbble">Dribbble</option>
						
						<option <?php if ( $network == 'picasa' ) { echo 'selected="selected"'; } ?> value="picasa">Picasa</option>
						
						<option <?php if ( $network == 'youtube' ) { echo 'selected="selected"'; } ?> value="youtube">YouTube</option>
						
					</select>
				</p>
				
				
				<p>
					<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php echo __( 'User:', 'read' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" value="<?php echo esc_attr( $user ); ?>">
				</p>
				
				
				<p>
					<label for="<?php echo $this->get_field_id( 'number_of_items' ); ?>"><?php echo __( 'Number of items to show:', 'read' ); ?></label>
					
					<input type="text" id="<?php echo $this->get_field_id( 'number_of_items' ); ?>" name="<?php echo $this->get_field_name( 'number_of_items' ); ?>" size="3" value="<?php echo esc_attr( $number_of_items ); ?>">
				</p>
			<?php
		}
		
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			
			$instance['network'] = strip_tags( $new_instance['network'] );
			
			$instance['user'] = strip_tags( $new_instance['user'] );
			
			$instance['number_of_items'] = strip_tags( $new_instance['number_of_items'] );
			
			
			return $instance;
		}
		
		
		public function widget( $args, $instance )
		{
			extract( $args );
			
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			
			$network = apply_filters( 'widget_network', $instance['network'] );
			
			$user = apply_filters( 'widget_user', $instance['user'] );
			
			$number_of_items = apply_filters( 'widget_number_of_items', $instance['number_of_items'] );
			
			
			echo $before_widget;
			
			
				if ( ! empty( $title ) )
				{
					echo $before_title . $title . $after_title;
				}
				
				
				?>
					<div class="social-feed" data-social-network="<?php echo $network; ?>" data-username="<?php echo $user; ?>" data-limit="<?php echo $number_of_items; ?>"></div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action( 'widgets_init', create_function( '', 'register_widget( "pixelwars_social_feed_widget" );' ) );


/* ============================================================================================================================================= */


	function pixelwars_create_post_type_portfolio()
	{
		$labels = array('name'               => __( 'Portfolio', 'read' ),
						'singular_name'      => __( 'Portfolio Item', 'read' ),
						'add_new'            => __( 'Add New', 'read' ),
						'add_new_item'       => __( 'Add New', 'read' ),
						'edit_item'          => __( 'Edit', 'read' ),
						'new_item'           => __( 'New', 'read' ),
						'all_items'          => __( 'All', 'read' ),
						'view_item'          => __( 'View', 'read' ),
						'search_items'       => __( 'Search', 'read' ),
						'not_found'          => __( 'No Items found', 'read' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
						'parent_item_colon'  => '',
						'menu_name'          => 'Portfolio' );
		
		
		$args = array(  'labels' => $labels,
						'public' => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => true,
						'show_ui'             => true,
						'query_var'           => true,
						'show_in_nav_menus'   => true,
						'capability_type'     => 'post',
						'hierarchical'        => false,
						'menu_position'       => 5,
						'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
						'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ) );
		
		
		register_post_type( 'portfolio' , $args );
	}
	
	add_action( 'init', 'pixelwars_create_post_type_portfolio' );
	
	
	function pixelwars_updated_messages_portfolio( $messages )
	{
		global $post, $post_ID;
		
		$messages['portfolio'] = array( 0 => "", // Unused. Messages start at index 1.
										
										1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										
										2 => __( 'Custom field updated.', 'read' ),
										
										3 => __( 'Custom field deleted.', 'read' ),
										
										4 => __( 'Updated.', 'read' ),
										
										// translators: %s: date and time of the revision
										5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'read' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
										
										6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										
										7 => __( 'Saved.', 'read' ),
										
										8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
										
										9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'read' ),
										
										// translators: Publish box date format, see http://php.net/date
										date_i18n( __( 'M j, Y @ G:i', 'read' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
										
										10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ) );
		
		
		return $messages;
	}
	
	add_filter( 'post_updated_messages', 'pixelwars_updated_messages_portfolio' );
	
	
	function pixelwars_portfolio_columns( $pf_columns )
	{
		$pf_columns = array('cb'                   => '<input type="checkbox">',
							'title'                => __( 'Title', 'read' ),
							'pf_featured_image'    => __( 'Featured Image', 'read' ),
							'portfolio_type'       => __( 'Type', 'read' ),
							'departments'          => __( 'Departments', 'read' ),
							'pf_short_description' => __( 'Short Description', 'read' ),
							'author'               => __( 'Author', 'read' ),
							'comments'             => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
							'date'                 => __( 'Date', 'read' ) );
		
		
		return $pf_columns;
	}
	
	add_filter( 'manage_edit-portfolio_columns', 'pixelwars_portfolio_columns' );
	
	
	function pixelwars_custom_columns_portfolio( $pf_column )
	{
		global $post, $post_ID;
		
		switch ( $pf_column )
		{
			case 'pf_featured_image':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'thumbnail' );
				}
				
			break;
			
			case 'portfolio_type':
			
				$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				
				echo $pf_type;
				
			break;
			
			case 'departments':
			
				$taxonomy = 'department';
				
				$terms_list = get_the_terms( $post_ID, $taxonomy );
				
				if ( ! empty( $terms_list ) )
				{
					$out = array();
					
					foreach ( $terms_list as $term_list )
					{
						$out[] = '<a href="edit.php?post_type=portfolio&department=' . $term_list->slug . '">' . $term_list->name . ' </a>';
					}
					
					echo join( ', ', $out );
				}
				
			break;
			
			case 'pf_short_description':
			
				$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description', "" ) );
				
				echo $pf_short_description;
				
			break;
		}
	}
	
	add_action( 'manage_posts_custom_column',  'pixelwars_custom_columns_portfolio' );
	
	
	function pixelwars_taxonomy_portfolio()
	{
		$labels_cat = array('name'              => __( 'Departments', 'read' ),
							'singular_name'     => __( 'Department', 'read' ),
							'search_items'      => __( 'Search', 'read' ),
							'all_items'         => __( 'All', 'read' ),
							'parent_item'       => __( 'Parent', 'read' ),
							'parent_item_colon' => __( 'Parent:', 'read' ),
							'edit_item'         => __( 'Edit', 'read' ),
							'update_item'       => __( 'Update', 'read' ),
							'add_new_item'      => __( 'Add New', 'read' ),
							'new_item_name'     => __( 'New Name', 'read' ),
							'menu_name'         => __( 'Departments', 'read' ) );
		
		
		register_taxonomy(  'department',
							array( 'portfolio' ),
							array(  'hierarchical' => true,
									'labels'       => $labels_cat,
									'show_ui'      => true,
									'public'       => true,
									'query_var'    => true,
									'rewrite'      => array( 'slug' => 'department' ) ) );
		
		
		$labels_tag = array('name'              => __( 'Portfolio Tags', 'read' ),
							'singular_name'     => __( 'Portfolio Tag', 'read' ),
							'search_items'      => __( 'Search', 'read' ),
							'all_items'         => __( 'All', 'read' ),
							'parent_item'       => __( 'Parent Tag', 'read' ),
							'parent_item_colon' => __( 'Parent Tag:', 'read' ),
							'edit_item'         => __( 'Edit', 'read' ),
							'update_item'       => __( 'Update', 'read' ),
							'add_new_item'      => __( 'Add New', 'read' ),
							'new_item_name'     => __( 'New Tag Name', 'read' ),
							'menu_name'         => __( 'Portfolio Tags', 'read' ) );
		
		
		register_taxonomy(  'portfolio_tag',
							array( 'portfolio' ),
							array(  'hierarchical' => false,
									'labels'       => $labels_tag,
									'show_ui'      => true,
									'public'       => true,
									'query_var'    => true,
									'rewrite'      => array( 'slug' => 'portfolio_tag' ) ) );
	}
	
	add_action( 'init', 'pixelwars_taxonomy_portfolio' );
	
	
	function pixelwars_taxonomy_filter_portfolio()
	{
		global $typenow;
		
		if ( $typenow == 'portfolio' )
		{
			$filters = array( 'department' );
			
			foreach ( $filters as $tax_slug )
			{
				$tax_obj = get_taxonomy( $tax_slug );
				
				$tax_name = $tax_obj->labels->name;
				
				$terms = get_terms( $tax_slug );
				
				echo '<select name="' .$tax_slug .'" id="' .$tax_slug .'" class="postform">';
				
					echo '<option value="">' . __( 'Show All', 'read' ) . ' ' .$tax_name .'</option>';
					
					foreach ( $terms as $term )
					{
						echo '<option value='. $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
					}
				
				echo '</select>';
			}
		}
	}
	
	add_action( 'restrict_manage_posts', 'pixelwars_taxonomy_filter_portfolio' );
	
	
	function pixelwars_theme_custom_box_show_portfolio( $post )
	{
		?>
			<?php
				wp_nonce_field( 'pixelwars_theme_custom_box_show_portfolio', 'pixelwars_theme_custom_box_nonce_portfolio' );
			?>
			
			<h4><?php echo __( 'Type', 'read' ); ?></h4>
			
			<p class="pf-type-wrap">
				<?php
					$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				?>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Standard' ) { echo 'checked="checked"'; } ?> value="Standard"> <?php echo __( 'Standard', 'read' ); ?>
				</label>
				
				<br>
				
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Featured Image' ) { echo 'checked="checked"'; } ?> value="Lightbox Featured Image"> <?php echo __( 'Lightbox Featured Image', 'read' ); ?>
				</label>
				
				<br>
				
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Gallery' ) { echo 'checked="checked"'; } ?> value="Lightbox Gallery"> <?php echo __( 'Lightbox Gallery', 'read' ); ?>
				</label>
				
				<br>
				
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Video' ) { echo 'checked="checked"'; } ?> value="Lightbox Video"> <?php echo __( 'Lightbox Video', 'read' ); ?>
				</label>
				
				<br>
				
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Audio' ) { echo 'checked="checked"'; } ?> value="Lightbox Audio"> <?php echo __( 'Lightbox Audio', 'read' ); ?>
				</label>
				
				<br>
				
				<label style="display: inline-block;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Direct URL' ) { echo 'checked="checked"'; } ?> value="Direct URL" class="pf-type-direct-url"> <?php echo __( 'Direct URL', 'read' ); ?>
				</label>
			</p>
			<!-- end .pf-type-wrap -->
			
			<p class="direct-url-wrap" style="<?php if ( $pf_type == 'Direct URL' ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
				<?php
					$pf_direct_url = stripcslashes( get_option( $post->ID . 'pf_direct_url' ) );
					
					$pf_link_new_tab = get_option( $post->ID . 'pf_link_new_tab', true );
				?>
				<label for="pf_direct_url"><?php echo __( 'Direct URL:', 'read' ); ?></label>
				
				<input type="text" id="pf_direct_url" name="pf_direct_url" class="widefat code2" placeholder="Link Url" value="<?php echo $pf_direct_url; ?>">
				
				<label style="display: inline-block; margin-top: 5px;"><input type="checkbox" id="pf_link_new_tab" name="pf_link_new_tab" <?php if ( $pf_link_new_tab ) { echo 'checked="checked"'; } ?>> <?php echo __( 'Open link in new tab', 'read' ); ?></label>
			</p>
			<!-- end .direct-url-wrap -->
			
			<script>
				jQuery(document).ready(function($)
				{
					$( '.pf-type-wrap label' ).click(function()
					{
						if ( $( this ).find( 'input' ).hasClass( 'pf-type-direct-url' ) )
						{
							$( '.direct-url-wrap' ).show();
						}
						else
						{
							$( '.direct-url-wrap' ).hide();
						}
					});
				});
			</script>
			
			<hr>
			
			<h4><?php echo __( 'Thumbnail Size', 'read' ); ?></h4>
			
			<p>
				<?php
					$pf_thumb_size = get_option( $post->ID . 'pf_thumb_size', 'x1' );
				?>
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="pf_thumb_size" <?php if ( $pf_thumb_size == 'x1' ) { echo 'checked="checked"'; } ?> value="x1"> <?php echo __( '1x', 'read' ); ?></label>
				
				<br>
				
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="pf_thumb_size" <?php if ( $pf_thumb_size == 'x2' ) { echo 'checked="checked"'; } ?> value="x2"> <?php echo __( '2x', 'read' ); ?></label>
			</p>
			
			<hr>
			
			<h4><?php echo __( 'Short Description', 'read' ); ?></h4>
			
			<p>
				<?php
					$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description' ) );
				?>
				<textarea id="pf_short_description" name="pf_short_description" rows="4" cols="46" class="widefat"><?php echo $pf_short_description; ?></textarea>
			</p>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_portfolio()
	{
		add_meta_box( 'pixelwars_theme_custom_box_portfolio', __( 'Details', 'read' ), 'pixelwars_theme_custom_box_show_portfolio', 'portfolio', 'side', 'low' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_portfolio' );
	
	
	function pixelwars_theme_custom_box_save_portfolio( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_portfolio'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_portfolio'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_portfolio' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'pf_type', $_POST['pf_type'] );
		update_option( $post_id . 'pf_direct_url', $_POST['pf_direct_url'] );
		update_option( $post_id . 'pf_link_new_tab', $_POST['pf_link_new_tab'] );
		update_option( $post_id . 'pf_thumb_size', $_POST['pf_thumb_size'] );
		update_option( $post_id . 'pf_short_description', $_POST['pf_short_description'] );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_portfolio' );


/* ============================================================================================================================================= */


	function pixelwars_create_post_type_gallery()
	{
		$labels = array('name'               => __( 'Gallery', 'read' ),
						'singular_name'      => __( 'Gallery', 'read' ),
						'add_new'            => __( 'Add New', 'read' ),
						'add_new_item'       => __( 'Add New', 'read' ),
						'edit_item'          => __( 'Edit', 'read' ),
						'new_item'           => __( 'New', 'read' ),
						'all_items'          => __( 'All', 'read' ),
						'view_item'          => __( 'View', 'read' ),
						'search_items'       => __( 'Search', 'read' ),
						'not_found'          => __( 'No Items found', 'read' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
						'parent_item_colon'  => '',
						'menu_name'          => 'Gallery' );
		
		
		$args = array(  'labels'              => $labels,
						'public'              => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => true,
						'show_ui'             => true,
						'query_var'           => true,
						'show_in_nav_menus'   => true,
						'capability_type'     => 'post',
						'hierarchical'        => false,
						'menu_position'       => 5,
						'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
						'rewrite'             => array( 'slug' => 'gallery', 'with_front' => false ));
		
		
		register_post_type( 'gallery' , $args );
	}
	
	add_action( 'init', 'pixelwars_create_post_type_gallery' );
	
	
	function pixelwars_updated_messages_gallery( $messages )
	{
		global $post, $post_ID;
		
		$messages['gallery'] = array(  0 => "", // Unused. Messages start at index 1.
		
									1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
									
									2 => __( 'Custom field updated.', 'read' ),
									
									3 => __( 'Custom field deleted.', 'read' ),
									
									4 => __( 'Updated.', 'read' ),
									
									// translators: %s: date and time of the revision
									5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'read' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) :false,
									
									6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
									
									7 => __( 'Saved.', 'read' ),
									
									8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
									
									9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'read' ),
									
									// translators: Publish box date format, see http://php.net/date
									date_i18n( __( 'M j, Y @ G:i', 'read' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
									
									10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ) );
		
		
		return $messages;
	}
	
	add_filter( 'post_updated_messages', 'pixelwars_updated_messages_gallery' );
	
	
	function pixelwars_gallery_columns( $gallery_columns )
	{
		$gallery_columns = array(   'cb'             => '<input type="checkbox">',
									'title'          => __( 'Title', 'read' ),
									'featured_image' => __( 'Featured Image', 'read' ),
									'author'         => __( 'Author', 'read' ),
									'comments'       => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
									'date'           => __( 'Date', 'read' ) );
		
		
		return $gallery_columns;
	}
	
	add_filter( 'manage_edit-gallery_columns', 'pixelwars_gallery_columns' );
	
	
	function pixelwars_custom_columns_gallery( $gallery_column )
	{
		global $post, $post_ID;
		
		
		switch ( $gallery_column )
		{
			case 'featured_image':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'thumbnail' );
				}
			
			break;
		}
	}
	
	add_action( 'manage_posts_custom_column',  'pixelwars_custom_columns_gallery' );


/* ============================================================================================================================================= */


	function pixelwars_create_post_type_book()
	{
		$labels = array('name'               => __( 'Books', 'read' ),
						'singular_name'      => __( 'Book', 'read' ),
						'add_new'            => __( 'Add New', 'read' ),
						'add_new_item'       => __( 'Add New', 'read' ),
						'edit_item'          => __( 'Edit', 'read' ),
						'new_item'           => __( 'New', 'read' ),
						'all_items'          => __( 'All', 'read' ),
						'view_item'          => __( 'View', 'read' ),
						'search_items'       => __( 'Search', 'read' ),
						'not_found'          => __( 'No Items found', 'read' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
						'parent_item_colon'  => '',
						'menu_name'          => 'Books' );
		
		
		$args = array(  'labels'              => $labels,
						'public'              => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => true,
						'show_ui'             => true,
						'query_var'           => true,
						'show_in_nav_menus'   => true,
						'capability_type'     => 'post',
						'hierarchical'        => false,
						'menu_position'       => 5,
						'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
						'rewrite'             => array( 'slug' => 'book', 'with_front' => false ));
		
		
		register_post_type( 'book' , $args );
	}
	
	add_action( 'init', 'pixelwars_create_post_type_book' );
	
	
	function pixelwars_updated_messages_book( $messages )
	{
		global $post, $post_ID;
		
		$messages['book'] = array(  0 => "", // Unused. Messages start at index 1.
		
									1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
									
									2 => __( 'Custom field updated.', 'read' ),
									
									3 => __( 'Custom field deleted.', 'read' ),
									
									4 => __( 'Updated.', 'read' ),
									
									// translators: %s: date and time of the revision
									5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'read' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) :false,
									
									6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
									
									7 => __( 'Saved.', 'read' ),
									
									8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
									
									9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'read' ),
									
									// translators: Publish box date format, see http://php.net/date
									date_i18n( __( 'M j, Y @ G:i', 'read' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
									
									10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ) );
		
		
		return $messages;
	}
	
	add_filter( 'post_updated_messages', 'pixelwars_updated_messages_book' );
	
	
	function pixelwars_book_columns( $book_columns )
	{
		$book_columns = array(  'cb'          => '<input type="checkbox">',
								'title'       => __( 'Title', 'read' ),
								'book_image'  => __( 'Book Image', 'read' ),
								'book_author' => __( 'Book Author', 'read' ),
								'author'      => __( 'Author', 'read' ),
								'comments'    => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
								'date'        => __( 'Date', 'read' ) );
		
		
		return $book_columns;
	}
	
	add_filter( 'manage_edit-book_columns', 'pixelwars_book_columns' );
	
	
	function pixelwars_custom_columns_book( $book_column )
	{
		global $post, $post_ID;
		
		switch ( $book_column )
		{
			case 'book_image':
			
				$book_cover_image = stripcslashes( get_option( $post->ID . 'book_cover_image', "" ) );
				
				if ( $book_cover_image != "" )
				{
					?>
						<img style="max-height: 150px;" alt="<?php the_title_attribute(); ?>" src="<?php echo $book_cover_image; ?>">
					<?php
				}
			
			break;
			
			case 'book_author':
			
				$taxonomy = 'book_author';
				
				$terms_list = get_the_terms( $post_ID, $taxonomy );
				
				if ( ! empty( $terms_list ) )
				{
					$out = array();
					
					foreach ( $terms_list as $term_list )
					{
						$out[] = '<a href="edit.php?post_type=book&book_author=' . $term_list->slug . '">' . $term_list->name . ' </a>';
					}
					
					echo join( ', ', $out );
				}
			
			break;
		}
	}
	
	add_action( 'manage_posts_custom_column',  'pixelwars_custom_columns_book' );
	
	
	function pixelwars_taxonomy_book()
	{
		$labels_cat = array('name'              => __( 'Book Authors', 'read' ),
							'singular_name'     => __( 'Book Author', 'read' ),
							'search_items'      => __( 'Search', 'read' ),
							'all_items'         => __( 'All', 'read' ),
							'parent_item'       => __( 'Parent', 'read' ),
							'parent_item_colon' => __( 'Parent:', 'read' ),
							'edit_item'         => __( 'Edit', 'read' ),
							'update_item'       => __( 'Update', 'read' ),
							'add_new_item'      => __( 'Add New', 'read' ),
							'new_item_name'     => __( 'New Name', 'read' ),
							'menu_name'         => __( 'Book Authors', 'read' ) );
		
		
		register_taxonomy(  'book_author',
							array( 'book' ),
							array(  'hierarchical' => true,
									'labels'       => $labels_cat,
									'show_ui'      => true,
									'public'       => true,
									'query_var'    => true,
									'rewrite'      => array( 'slug' => 'book_author' ) ) );
		
		
		$labels_tag = array('name'              => __( 'Book Tags', 'read' ),
							'singular_name'     => __( 'Book Tag', 'read' ),
							'search_items'      => __( 'Search', 'read' ),
							'all_items'         => __( 'All', 'read' ),
							'parent_item'       => __( 'Parent Tag', 'read' ),
							'parent_item_colon' => __( 'Parent Tag:', 'read' ),
							'edit_item'         => __( 'Edit', 'read' ),
							'update_item'       => __( 'Update', 'read' ),
							'add_new_item'      => __( 'Add New', 'read' ),
							'new_item_name'     => __( 'New Tag Name', 'read' ),
							'menu_name'         => __( 'Book Tags', 'read' ) );
		
		
		register_taxonomy(  'book_tag',
							array( 'book' ),
							array(  'hierarchical' => false,
									'labels'       => $labels_tag,
									'show_ui'      => true,
									'public'       => true,
									'query_var'    => true,
									'rewrite'      => array( 'slug' => 'book_tag' ) ) );
	}
	
	add_action( 'init', 'pixelwars_taxonomy_book' );
	
	
	function pixelwars_taxonomy_filter_book()
	{
		global $typenow;
		
		if ( $typenow == 'book' )
		{
			$filters = array( 'book_author' );
			
			foreach ( $filters as $tax_slug )
			{
				$tax_obj = get_taxonomy( $tax_slug );
				
				$tax_name = $tax_obj->labels->name;
				
				$terms = get_terms( $tax_slug );
			
				echo '<select id="' .$tax_slug .'" name="' .$tax_slug .'" class="postform">';
				
					echo '<option value="">' . __( 'Show All', 'read' ) . ' ' .$tax_name .'</option>';
					
					foreach ( $terms as $term )
					{
						echo '<option value='. $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
					}
				
				echo '</select>';
			}
		}
	}
	
	add_action( 'restrict_manage_posts', 'pixelwars_taxonomy_filter_book' );
	
	
	function pixelwars_theme_custom_box_show_book( $post )
	{
		?>
			<?php
				wp_nonce_field( 'pixelwars_theme_custom_box_show_book', 'pixelwars_theme_custom_box_nonce_book' );
			?>
			
			
			<p>
				<label for="book_buy_url"><?php echo __( 'Buy URL:', 'read' ); ?></label>
				<?php
					$book_buy_url = stripcslashes( get_option( $post->ID . 'book_buy_url', "" ) );
					
					$book_buy_url_new_tab = get_option( $post->ID . 'book_buy_url_new_tab', true );
				?>
				<input type="text" id="book_buy_url" name="book_buy_url" class="widefat code2" value="<?php echo $book_buy_url; ?>">
				
				<label><input type="checkbox" id="book_buy_url_new_tab" name="book_buy_url_new_tab" <?php if ( $book_buy_url_new_tab ) { echo 'checked="checked"'; } ?>> <?php echo __( 'Open link in new tab', 'read' ); ?></label>
			</p>
			
			
			<hr>
			
			
			<p>
				<label for="book_cover_image"><?php echo __( 'Cover Image:', 'read' ); ?></label>
				<?php
					$book_cover_image = stripcslashes( get_option( $post->ID . 'book_cover_image', "" ) );
				?>
				<input type="text" id="book_cover_image" name="book_cover_image" class="widefat code2 upload" value="<?php echo $book_cover_image; ?>">
				
				<input type="button" class="button upload-button" style="margin-top: 10px;" value="<?php echo __( 'Browse', 'read' ); ?>">
				
				<br>
				
				<img style="margin-top: 10px; max-height: 150px;" alt="" src="<?php echo $book_cover_image; ?>">
			</p>
			
			
			<hr>
			
			
			<p>
				<label for="book_side_image"><?php echo __( 'Side Image:', 'read' ); ?></label>
				<?php
					$book_side_image = stripcslashes( get_option( $post->ID . 'book_side_image', "" ) );
				?>
				<input type="text" id="book_side_image" name="book_side_image" class="widefat code2 upload" value="<?php echo $book_side_image; ?>">
				
				<input type="button" class="button upload-button" style="margin-top: 10px;" value="<?php echo __( 'Browse', 'read' ); ?>">
				
				<br>
				
				<img style="margin-top: 10px; max-height: 150px;" alt="" src="<?php echo $book_side_image; ?>">
			</p>
			
			
			<script>
				jQuery(document).ready(function($)
				{
					// Image Upload
					var uploadID = "";

					$( '.upload-button' ).live( 'click', function()
					{
						window.send_to_editor = function( html )
						{
							imgurl = $( 'img', html ).attr( 'src' );
							
							uploadID.val( imgurl );
							
							uploadID.trigger( 'change' );
							
							tb_remove();
						}
						
						uploadID = $(this).prev( 'input' );
						
						formfield = $( '.upload' ).attr( 'name' );
						
						tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
						
						return false;
					});
					// end Image Upload
				});
			</script>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_book()
	{
		add_meta_box( 'pixelwars_theme_custom_box_book', __( 'Details', 'read' ), 'pixelwars_theme_custom_box_show_book', 'book', 'side', 'low' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_book' );
	
	
	function pixelwars_theme_custom_box_save_book( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_book'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_book'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_book' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'book_buy_url', $_POST['book_buy_url'] );
		update_option( $post_id . 'book_buy_url_new_tab', $_POST['book_buy_url_new_tab'] );
		update_option( $post_id . 'book_cover_image', $_POST['book_cover_image'] );
		update_option( $post_id . 'book_side_image', $_POST['book_side_image'] );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_book' );


/* ============================================================================================================================================= */


	/*
		This function filters the post content when viewing a post with the "chat" post format.  It formats the 
		content with structured HTML markup to make it easy for theme developers to style chat posts. The 
		advantage of this solution is that it allows for more than two speakers (like most solutions). You can 
		have 100s of speakers in your chat post, each with their own, unique classes for styling.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $content The content of the post.
		@return string $chat_output The formatted content of the post.
	*/
	
	
	function pixelwars_theme_post_format_chat_content( $content )
	{
		global $_post_format_chat_ids;
		
		
		/* If this is not a 'chat' post, return the content. */
		if ( !has_post_format( 'chat' ) )
		{
			return $content;
		}
		
		
		/* Set the global variable of speaker IDs to a new, empty array for this chat. */
		$_post_format_chat_ids = array();
		
		/* Allow the separator (separator for speaker/text) to be filtered. */
		$separator = apply_filters( 'my_post_format_chat_separator', ':' );
		
		/* Open the chat transcript div and give it a unique ID based on the post ID. */
		$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';
		
		/* Split the content to get individual chat rows. */
		$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );
		
		
		/* Loop through each row and format the output. */
		foreach ( $chat_rows as $chat_row )
		{
			/* If a speaker is found, create a new chat row with speaker and text. */
			if ( strpos( $chat_row, $separator ) )
			{
				/* Split the chat row into author/text. */
				$chat_row_split = explode( $separator, trim( $chat_row ), 2 );
				
				
				/* Get the chat author and strip tags. */
				$chat_author = strip_tags( trim( $chat_row_split[0] ) );
				
				
				/* Get the chat text. */
				$chat_text = trim( $chat_row_split[1] );
				
				
				/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
				$speaker_id = pixelwars_theme_post_format_chat_row_id( $chat_author );
				
				
				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
				
				
				/* Add the chat row author. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';
				
				
				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';
				
				
				/* Close the chat row. */
				$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
			}
			/*
				If no author is found, assume this is a separate paragraph of text that belongs to the
				previous speaker and label it as such, but let's still create a new row.
			*/
			else
			{
				/* Make sure we have text. */
				if ( !empty( $chat_row ) )
				{
					/* Open the chat row. */
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
					
					
					/* Don't add a chat row author.  The label for the previous row should suffice. */
					
					
					/* Add the chat row text. */
					$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';
					
					
					/* Close the chat row. */
					$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
				}
			}
		}
		
		
		/* Close the chat transcript div. */
		$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";
		
		
		/* Return the chat content and apply filters for developers. */
		return apply_filters( 'my_post_format_chat_content', $chat_output );
	}
	
	
	/*
		This function returns an ID based on the provided chat author name. It keeps these IDs in a global 
		array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
		that will be used in an HTML class for individual chat rows so they can be styled. So, speaker "John" 
		will always have the same class each time he speaks. And, speaker "Mary" will have a different class 
		from "John" but will have the same class each time she speaks.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $chat_author Author of the current chat row.
		@return int The ID for the chat row based on the author.
	*/
	
	
	function pixelwars_theme_post_format_chat_row_id( $chat_author )
	{
		global $_post_format_chat_ids;
		
		
		/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
		$chat_author = strtolower( strip_tags( $chat_author ) );
		
		
		/* Add the chat author to the array. */
		$_post_format_chat_ids[] = $chat_author;
		
		
		/* Make sure the array only holds unique values. */
		$_post_format_chat_ids = array_unique( $_post_format_chat_ids );
		
		
		/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
		return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
	}
	
	
	/* Filter the content of chat posts. */
	add_filter( 'the_content', 'pixelwars_theme_post_format_chat_content' );


/* ============================================================================================================================================= */


	add_filter( 'the_excerpt', 'do_shortcode' );
	
	add_filter( 'widget_text', 'do_shortcode' );


/* ============================================================================================================================================= */


	function row( $atts, $content = "" )
	{
		$row = '<div class="row">' . do_shortcode( $content ) . '</div>';
		
		
		return $row;
	}
	
	add_shortcode( 'row', 'row' );


/* ============================================================================================================================================= */


	function column( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width'    => "",
										'width_xs' => "",
										'width_md' => "",
										'width_lg' => "" ), $atts ) );
		
		
		if ( $width != "" )
		{
			$width = 'col-sm-' . $width;
		}
		
		
		if ( $width_xs != "" )
		{
			$width_xs = 'col-xs-' . $width_xs;
		}
		
		
		if ( $width_md != "" )
		{
			$width_md = 'col-md-' . $width_md;
		}
		
		
		if ( $width_lg != "" )
		{
			$width_lg = 'col-lg-' . $width_lg;
		}
		
		
		$column = '<div class="' . $width . ' ' . $width_xs . ' ' . $width_md . ' ' . $width_lg . '">' . do_shortcode( $content ) . '</div>';
		
		
		return $column;
	}
	
	add_shortcode( 'column', 'column' );


/* ============================================================================================================================================= */


	function alert( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type'  => "",
										'title' => "" ), $atts ) );
		
		
		$alert = '<div class="alert ' . $type . '"><strong>' . $title . '</strong> ' . do_shortcode( $content ) . '</div>';
		
		
		return $alert;
	}
	
	add_shortcode( 'alert', 'alert' );


/* ============================================================================================================================================= */


	function button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text'   => "",
										'url'    => "",
										'target' => "",
										'color'  => "",
										'size'   => "",
										'icon'   => "" ), $atts ) );
		
		
		if ( $icon != "" )
		{
			$icon = '<i class="pw-icon-' . $icon . '"></i>';
		}
		
		
		$button = '<a target="' . $target . '" href="' . $url . '" class="button ' . $color . ' ' . $size . '">' . $icon . $text . '</a>';
		
		
		return $button;
	}
	
	add_shortcode( 'button', 'button' );


/* ============================================================================================================================================= */


	function social_icon_wrap( $atts, $content = "" )
	{
		$social_icon_wrap = '<ul class="social">' . do_shortcode( $content ) . '</ul>';
		
		
		return $social_icon_wrap;
	}
	
	add_shortcode( 'social_icon_wrap', 'social_icon_wrap' );


/* ============================================================================================================================================= */


	function social_icon( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "",
										'url'  => "" ), $atts ) );
		
		
		$social_icon = '<li><a target="_blank" class="' . $type . '" href="' . $url . '"></a></li>';
		
		
		return $social_icon;
	}
	
	add_shortcode( 'social_icon', 'social_icon' );


/* ============================================================================================================================================= */


	function toggle_wrap( $atts, $content = "" )
	{
		$toggle_wrap = '<div class="toggle-group">' . do_shortcode( $content ) . '</div>';
		
		
		return $toggle_wrap;
	}
	
	add_shortcode( 'toggle_wrap', 'toggle_wrap' );


/* ============================================================================================================================================= */


	function toggle( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		
		$toggle = '<div class="toggle"><h4>' . $title . '</h4><div class="toggle-content">' . do_shortcode( $content ) . '</div></div>';
		
		
		return $toggle;
	}
	
	add_shortcode( 'toggle', 'toggle' );


/* ============================================================================================================================================= */


	function accordion_wrap( $atts, $content = "" )
	{
		$accordion_wrap = '<div class="toggle-group accordion">' . do_shortcode( $content ) . '</div>';
		
		
		return $accordion_wrap;
	}
	
	add_shortcode( 'accordion_wrap', 'accordion_wrap' );


/* ============================================================================================================================================= */


	function accordion( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		
		$accordion = '<div class="toggle"><h4>' . $title . '</h4><div class="toggle-content">' . do_shortcode( $content ) . '</div></div>';
		
		
		return $accordion;
	}
	
	add_shortcode( 'accordion', 'accordion' );


/* ============================================================================================================================================= */


	function tab_wrap( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'titles' => "",
										'active' => "" ), $atts ) );
		
		
		$titles_with_commas = $titles;
		$titles_with_markup = "";
		
		if ( $titles_with_commas != "" )
		{
			$titles_array = preg_split("/[\s]*[,][\s]*/", $titles_with_commas);
			
			foreach ( $titles_array as $title_name )
			{
				if ( $active == $title_name )
				{
					$titles_with_markup .= '<li><a class="active">' . $title_name . '</a></li>';
				}
				else
				{
					$titles_with_markup .= '<li><a>' . $title_name . '</a></li>';
				}
			}
		}
		
		
		$tab_wrap = '<div class="tabs"><ul class="tab-titles">' . $titles_with_markup . '</ul><div class="tab-content">' . do_shortcode( $content ) . '</div></div>';
		
		
		return $tab_wrap;
	}
	
	add_shortcode( 'tab_wrap', 'tab_wrap' );


/* ============================================================================================================================================= */


	function tab( $atts, $content = "" )
	{
		$tab = '<div>' . do_shortcode( $content ) . '</div>';
		
		
		return $tab;
	}
	
	add_shortcode( 'tab', 'tab' );


/* ============================================================================================================================================= */


	function lightbox_wrap( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type'      => "",
										'thumbnail' => "" ), $atts ) );
		
		
		$lightbox_wrap = '<div class="media-box ' . $type . '"><img alt="" src="' . $thumbnail . '"><div class="mask">' . do_shortcode( $content ) . '</div></div>';
		
		
		return $lightbox_wrap;
	}
	
	add_shortcode( 'lightbox_wrap', 'lightbox_wrap' );


/* ============================================================================================================================================= */


	function lightbox_image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'first_item' => "",
										'title'      => "",
										'url'        => "" ), $atts ) );
		
		
		if ( $first_item == 'yes' )
		{
			$first_item = "";
		}
		else
		{
			$first_item = 'hidden';
		}
		
		
		$lightbox_image = '<a class="lightbox ' . $first_item . '" title="' . $title . '" href="' . $url . '"></a>';
		
		
		return $lightbox_image;
	}
	
	add_shortcode( 'lightbox_image', 'lightbox_image' );


/* ============================================================================================================================================= */


	function lightbox_video( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url'   => "" ), $atts ) );
		
		
		$lightbox_video = '<a class="lightbox mfp-iframe" title="' . $title . '" href="' . $url . '"></a>';
		
		
		return $lightbox_video;
	}
	
	add_shortcode( 'lightbox_video', 'lightbox_video' );


/* ============================================================================================================================================= */


	function lightbox_audio( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url'   => "" ), $atts ) );
		
		
		$lightbox_audio = '<a class="lightbox mfp-iframe" title="' . $title . '" href="' . $url . '"></a>';
		
		
		return $lightbox_audio;
	}
	
	add_shortcode( 'lightbox_audio', 'lightbox_audio' );


/* ============================================================================================================================================= */


	function portfolio_lightbox_image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'first_item' => "",
										'title'      => "",
										'url'        => "" ), $atts ) );
		
		
		if ( $first_item == 'yes' )
		{
			$first_item = "";
		}
		else
		{
			$first_item = 'hidden';
		}
		
		
		if ( is_single() )
		{
			$portfolio_lightbox_image = '<img alt="' . $title . '" src="' . $url . '">';
		}
		else
		{
			$portfolio_lightbox_image = '<a class="lightbox ' . $first_item . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		
		return $portfolio_lightbox_image;
	}
	
	add_shortcode( 'portfolio_lightbox_image', 'portfolio_lightbox_image' );


/* ============================================================================================================================================= */


	function portfolio_lightbox_audio( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'first_item' => "",
										'title'      => "",
										'url'        => "" ), $atts ) );
		
		
		if ( $first_item == 'yes' )
		{
			$first_item = "";
		}
		else
		{
			$first_item = 'hidden';
		}
		
		
		if ( is_single() )
		{
			$portfolio_lightbox_audio = '<div class="media-wrap"><iframe width="100%" height="408" scrolling="no" frameborder="no" src="' . $url . '"></iframe></div>';
		}
		else
		{
			$portfolio_lightbox_audio = '<a class="lightbox mfp-iframe ' . $first_item . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		
		return $portfolio_lightbox_audio;
	}
	
	add_shortcode( 'portfolio_lightbox_audio', 'portfolio_lightbox_audio' );


/* ============================================================================================================================================= */


	function portfolio_lightbox_video( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'first_item' => "",
										'title'      => "",
										'url'        => "" ), $atts ) );
		
		
		if ( $first_item == 'yes' )
		{
			$first_item = "";
		}
		else
		{
			$first_item = 'hidden';
		}
		
		
		if ( is_single() )
		{
			if ( has_post_thumbnail() )
			{
				$portfolio_lightbox_video = '<div class="media-box video">' . get_the_post_thumbnail() . '<div class="mask"><a class="lightbox mfp-iframe" title="' . $title . '" href="' . $url . '"></a></div></div>';
			}
		}
		else
		{
			$portfolio_lightbox_video = '<a class="lightbox mfp-iframe ' . $first_item . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		
		return $portfolio_lightbox_video;
	}
	
	add_shortcode( 'portfolio_lightbox_video', 'portfolio_lightbox_video' );


/* ============================================================================================================================================= */


	function project_action( $atts, $content = "" )
	{
		$project_action = '<div class="project-action">' . do_shortcode( $content ) . '</div>';
		
		
		return $project_action;
	}
	
	add_shortcode( 'project_action', 'project_action' );


/* ============================================================================================================================================= */


	function call_to_action( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'text'  => "" ), $atts ) );
		
		
		$call_to_action = '<div class="cta"><div class="row"><div class="col-sm-8"><h3>' . $title . '</h3><p>' . $text . '</p></div><div class="col-sm-4"><div class="cta-button">' . do_shortcode( $content ) . '</div></div></div></div>';
		
		
		return $call_to_action;
	}
	
	add_shortcode( 'call_to_action', 'call_to_action' );


/* ============================================================================================================================================= */


	function contact_form( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'to'      => "",
										'subject' => "",
										'captcha' => "" ), $atts ) );
		
		
		if ( $captcha == "yes" )
		{
			$random1 = rand(1, 5);
			$random2 = rand(1, 5);
			
			$sum_random = $random1 + $random2;
			
			$captcha_out = '<p>';
			$captcha_out .= '<input type="hidden" id="captcha" name="captcha" value="yes">';
			$captcha_out .= '<label for="sum_user">' . $random1 . ' + ' . $random2 . ' = ?</label>';
			$captcha_out .= '<input type="text" id="sum_user" name="sum_user" class="required" placeholder="' . __( 'What is the sum?', 'read' ) . '">';
			$captcha_out .= '<input type="hidden" id="sum_random" name="sum_random" value="' . $sum_random . '">';
			$captcha_out .= '</p>';
		}
		else
		{
			$captcha_out = '<p style="padding: 0px; margin: 0px;">';
			$captcha_out .= '<input type="hidden" id="captcha" name="captcha" value="no">';
			$captcha_out .= '</p>';
		}
		
		
		// Get the site domain and get rid of www.
		$site_url = strtolower( $_SERVER['SERVER_NAME'] );
		
		if ( substr( $site_url, 0, 4 ) == 'www.' )
		{
			$site_url = substr( $site_url, 4 );
		}
		
		$sender_domain = 'server@' . $site_url;
		
		
		$contact_form = '<div class="contact-form">';
		$contact_form .= '<form id="contact-form" class="validate-form" method="post" action="' . get_template_directory_uri() . '/send-mail.php">';
		
		$contact_form .= '<input type="hidden" id="sender_domain" name="sender_domain" value="' . $sender_domain . '">';
		$contact_form .= '<input type="hidden" id="to" name="to" value="' . $to . '">';
		$contact_form .= '<input type="hidden" id="site_name" name="site_name" value="' . get_bloginfo( 'name' ) . '">';
		$contact_form .= '<input type="hidden" id="subject" name="subject" value="' . $subject . '">';
		
		$contact_form .= '<p>';
		$contact_form .= '<label for="name">' . __( 'NAME', 'read' ) . '</label>';
		$contact_form .= '<input type="text" id="name" name="name" class="required">';
		$contact_form .= '</p>';
		
		$contact_form .= '<p>';
		$contact_form .= '<label for="email">' . __( 'EMAIL', 'read' ) . '</label>';
		$contact_form .= '<input type="text" id="email" name="email" class="required email">';
		$contact_form .= '</p>';
		
		$contact_form .= '<p>';
		$contact_form .= '<label for="message">' . __( 'MESSAGE', 'read' ) . '</label>';
		$contact_form .= '<textarea id="message" name="message" class="required"></textarea>';
		$contact_form .= '</p>';
		
		$contact_form .= $captcha_out;
		
		$contact_form .= '<p>';
		$contact_form .= '<button class="submit button"><span class="submit-label">' . __( 'Submit', 'read' ) . '</span><span class="submit-status"></span></button>';
		$contact_form .= '</p>';
		
		$contact_form .= '</form>';
		$contact_form .= '</div>';
		
		
		return $contact_form;
	}
	
	add_shortcode( 'contact_form', 'contact_form' );


/* ============================================================================================================================================= */


	function section_title( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "",
										'align' => "" ), $atts ) );
		
		
		$section_title = '<h2 class="section-title ' . $align . '">' . $text . '</h2>';
		
		
		return $section_title;
	}
	
	add_shortcode( 'section_title', 'section_title' );


/* ============================================================================================================================================= */


	function latest_from_the_blog( $atts, $content = "" )
	{
		$post_list = "";
		
		$args = array( 'posts_per_page' => 10 );
		
		$posts = get_posts( $args );
		
		if ( $posts )
		{
			foreach ( $posts as $post )
			{
				setup_postdata( $post );
				
				$post_list .= '<li><article><h3 class="entry-title"><a href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a></h3><span class="read-time"><i class="pw-icon-bookmark-empty-1"></i><span class="eta"></span> ' . __( 'read', 'read' ) . '</span></article></li>';
			}
			
			wp_reset_postdata();
		}
		
		
		$latest_from_the_blog = '<div class="post-list"><ul>' . $post_list . '</ul></div>';
		
		
		return $latest_from_the_blog;
	}
	
	add_shortcode( 'latest_from_the_blog', 'latest_from_the_blog' );


/* ============================================================================================================================================= */


	function fun_fact( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'icon' => "",
										'text' => "" ), $atts ) );
		
		
		$fun_fact = '<div class="fun-fact"><i class="pw-icon-' . $icon . '"></i><h4>' . $text . '</h4></div>';
		
		
		return $fun_fact;
	}
	
	add_shortcode( 'fun_fact', 'fun_fact' );


/* ============================================================================================================================================= */


	function service( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'icon'  => "",
										'title' => "",
										'text'  => "" ), $atts ) );
		
		
		$service = '<div class="service"><i class="pw-icon-' . $icon . '"></i><h4>' . $title . '</h4><p>' . $text . '</p></div>';
		
		
		return $service;
	}
	
	add_shortcode( 'service', 'service' );


/* ============================================================================================================================================= */


	function launch_button( $atts, $content = "" )
	{
		$launch_button = '<p class="launch-wrap">' . do_shortcode( $content ) . '</p>';
		
		
		return $launch_button;
	}
	
	add_shortcode( 'launch_button', 'launch_button' );


/* ============================================================================================================================================= */


	function intro( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'image' => "" ), $atts ) );
		
		
		$intro = '<div class="intro cf"><img alt="" src="' . $image . '"><h2>' . do_shortcode( $content ) . '</h2></div>';
		
		
		return $intro;
	}
	
	add_shortcode( 'intro', 'intro' );


/* ============================================================================================================================================= */


	function rotate_words( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'titles' => "" ), $atts ) );
		
		
		$titles_with_commas = $titles;
		$titles_with_markup = "";
		
		if ( $titles_with_commas != "" )
		{
			$titles_array = preg_split("/[\s]*[,][\s]*/", $titles_with_commas);
			
			foreach ( $titles_array as $title_name )
			{
				$titles_with_markup .= '<span>' . $title_name . '</span>';
			}
		}
		
		
		$rotate_words = '<span class="rotate-words">' . $titles_with_markup . '</span>';
		
		
		return $rotate_words;
	}
	
	add_shortcode( 'rotate_words', 'rotate_words' );


/* ============================================================================================================================================= */


	function skill_wrap( $atts, $content = "" )
	{
		$skill_wrap = '<div class="skillset">' . do_shortcode( $content ) . '</div>';
		
		
		return $skill_wrap;
	}
	
	add_shortcode( 'skill_wrap', 'skill_wrap' );


/* ============================================================================================================================================= */


	function skill( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'percent' => "" ), $atts ) );
		
		
		$skill = '<div class="skill-unit"><h4>' . $title . '</h4><div class="bar" data-percent="' . $percent . '"><div class="progress"></div></div></div>';
		
		
		return $skill;
	}
	
	add_shortcode( 'skill', 'skill' );


/* ============================================================================================================================================= */


	function testimonial_wrap( $atts, $content = "" )
	{
		$testimonial_wrap = '<div class="testo-group">' . do_shortcode( $content ) . '</div>';
		
		
		return $testimonial_wrap;
	}
	
	add_shortcode( 'testimonial_wrap', 'testimonial_wrap' );


/* ============================================================================================================================================= */


	function testimonial( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'image' => "",
										'title' => "",
										'sub_title' => "" ), $atts ) );
		
		
		$testimonial = '<div class="testo"><img alt="" src="' . $image . '"><h4>' . $title . '<span>' . $sub_title . '</span></h4><p>' . do_shortcode( $content ) . '</p></div>';
		
		
		return $testimonial;
	}
	
	add_shortcode( 'testimonial', 'testimonial' );


/* ============================================================================================================================================= */


	function timeline( $atts, $content = "" )
	{
		$timeline = '<div class="timeline">' . do_shortcode( $content ) . '</div>';
		
		
		return $timeline;
	}
	
	add_shortcode( 'timeline', 'timeline' );


/* ============================================================================================================================================= */


	function event_group_title( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'icon' => "",
										'text' => "" ), $atts ) );
		
		
		$event_group_title = '<div class="event"><h2>' . $text . '</h2><i class="pw-icon-' . $icon . '"></i></div>';
		
		
		return $event_group_title;
	}
	
	add_shortcode( 'event_group_title', 'event_group_title' );


/* ============================================================================================================================================= */


	function event( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'current' => "",
										'date' => "",
										'title' => "",
										'sub_title' => "" ), $atts ) );
		
		
		$event = '<div class="event ' . $current . '"><span class="date">' . $date . '</span><h4>' . $title . '</h4><h5>' . $sub_title . '</h5><p>' . do_shortcode( $content ) . '</p></div>';
		
		
		return $event;
	}
	
	add_shortcode( 'event', 'event' );


/* ============================================================================================================================================= */


	function slider( $atts, $content = "" )
	{
		$slider = '<div class="flexslider" data-autoplay="false" data-interval="3000" data-animation="slide" data-direction="horizontal" data-animationSpeed="600"  data-pauseOnHover="true"><ul class="slides">' . do_shortcode( $content ) . '</ul></div>';
		
		
		return $slider;
	}
	
	add_shortcode( 'slider', 'slider' );


/* ============================================================================================================================================= */


	function slide( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'image' => "" ), $atts ) );
		
		
		$slide = '<li><img alt="" src="' . $image . '"></li>';
		
		
		return $slide;
	}
	
	add_shortcode( 'slide', 'slide' );


/* ============================================================================================================================================= */


	function quote( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'name'  => "",
										'align' => "" ), $atts ) );
		
		
		$quote = '<blockquote class="' . $align . '">' . do_shortcode( $content ) . '<cite>' . $name . '</cite></blockquote>';
		
		
		return $quote;
	}
	
	add_shortcode( 'quote', 'quote' );


/* ============================================================================================================================================= */


	function link_wrap( $atts, $content = "" )
	{
		$link_wrap = '<div class="link-content">' . do_shortcode( $content ) . '</div>';
		
		
		return $link_wrap;
	}
	
	add_shortcode( 'link_wrap', 'link_wrap' );


/* ============================================================================================================================================= */


	function aside_wrap( $atts, $content = "" )
	{
		$aside_wrap = '<div class="aside-content">' . do_shortcode( $content ) . '</div>';
		
		
		return $aside_wrap;
	}
	
	add_shortcode( 'aside_wrap', 'aside_wrap' );


/* ============================================================================================================================================= */


	function media_wrap( $atts, $content = "" )
	{
		$media_wrap = '<div class="media-wrap">' . do_shortcode( $content ) . '</div>';
		
		
		return $media_wrap;
	}
	
	add_shortcode( 'media_wrap', 'media_wrap' );


/* ============================================================================================================================================= */


	function theme_audio( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'url' => "",
										'poster' => "" ), $atts ) );
		
		
		if ( $poster != "" )
		{
			$poster = '<img alt="" src="' . $poster . '">';
		}
		
		
		$theme_audio = $poster . '<audio src="' . $url . '" preload="none" style="width: 100%;"></audio>';
		
		
		return $theme_audio;
	}
	
	add_shortcode( 'theme_audio', 'theme_audio' );


/* ============================================================================================================================================= */


	function theme_video( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'url' => "",
										'poster' => "" ), $atts ) );
		
		
		$theme_video = '<video src="' . $url . '" poster="' . $poster . '" preload="none" style="width: 100%; height: 100%;"></video>';
		
		
		return $theme_video;
	}
	
	add_shortcode( 'theme_video', 'theme_video' );


/* ============================================================================================================================================= */


	function drop_cap( $atts, $content = "" )
	{
		$drop_cap = '<p class="drop-cap">' . do_shortcode( $content ) . '</p>';
		
		
		return $drop_cap;
	}
	
	add_shortcode( 'drop_cap', 'drop_cap' );


/* ============================================================================================================================================= */


	function tagline( $atts, $content = "" )
	{
		$tagline = '<div class="tagline"><p>' . do_shortcode( $content ) . '</p></div>';
		
		
		return $tagline;
	}
	
	add_shortcode( 'tagline', 'tagline' );


/* ============================================================================================================================================= */


	function portflio_field( $atts, $content = "" )
	{
		$portflio_field = '<div class="portflio-fields">' . do_shortcode( $content ) . '</div>';
		
		
		return $portflio_field;
	}
	
	add_shortcode( 'portflio_field', 'portflio_field' );


/* ============================================================================================================================================= */


	function tag_wrap( $atts, $content = "" )
	{
		$tag_wrap = '<ul class="tags">' . do_shortcode( $content ) . '</ul>';
		
		
		return $tag_wrap;
	}
	
	add_shortcode( 'tag_wrap', 'tag_wrap' );


/* ============================================================================================================================================= */


	function tag( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "" ), $atts ) );
		
		
		$tag = '<li><a>' . $text . '</a></li>';
		
		
		return $tag;
	}
	
	add_shortcode( 'tag', 'tag' );


/* ============================================================================================================================================= */


	function full_width_image( $atts, $content = "" )
	{
		$full_width_image = '<div class="full-width-image">' . do_shortcode( $content ) . '</div>';
		
		
		return $full_width_image;
	}
	
	add_shortcode( 'full_width_image', 'full_width_image' );


/* ============================================================================================================================================= */


	function pixelwars_theme_run_shortcode( $content )
	{
		global $shortcode_tags;
		
		
		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		
		remove_all_shortcodes();
		
		
		add_shortcode( 'row', 'row' );
		add_shortcode( 'column', 'column' );
		add_shortcode( 'alert', 'alert' );
		add_shortcode( 'contact_form', 'contact_form' );
		add_shortcode( 'section_title', 'section_title' );
		add_shortcode( 'latest_from_the_blog', 'latest_from_the_blog' );
		add_shortcode( 'fun_fact', 'fun_fact' );
		add_shortcode( 'service', 'service' );
		add_shortcode( 'launch_button', 'launch_button' );
		add_shortcode( 'project_action', 'project_action' );
		add_shortcode( 'call_to_action', 'call_to_action' );
		add_shortcode( 'button', 'button' );
		add_shortcode( 'intro', 'intro' );
		add_shortcode( 'rotate_words', 'rotate_words' );
		add_shortcode( 'social_icon_wrap', 'social_icon_wrap' );
		add_shortcode( 'social_icon', 'social_icon' );
		add_shortcode( 'toggle_wrap', 'toggle_wrap' );
		add_shortcode( 'toggle', 'toggle' );
		add_shortcode( 'accordion_wrap', 'accordion_wrap' );
		add_shortcode( 'accordion', 'accordion' );
		add_shortcode( 'tab_wrap', 'tab_wrap' );
		add_shortcode( 'tab', 'tab' );
		add_shortcode( 'lightbox_wrap', 'lightbox_wrap' );
		add_shortcode( 'lightbox_image', 'lightbox_image' );
		add_shortcode( 'lightbox_video', 'lightbox_video' );
		add_shortcode( 'lightbox_audio', 'lightbox_audio' );
		add_shortcode( 'portfolio_lightbox_image', 'portfolio_lightbox_image' );
		add_shortcode( 'portfolio_lightbox_audio', 'portfolio_lightbox_audio' );
		add_shortcode( 'portfolio_lightbox_video', 'portfolio_lightbox_video' );
		add_shortcode( 'skill_wrap', 'skill_wrap' );
		add_shortcode( 'skill', 'skill' );
		add_shortcode( 'testimonial_wrap', 'testimonial_wrap' );
		add_shortcode( 'testimonial', 'testimonial' );
		add_shortcode( 'timeline', 'timeline' );
		add_shortcode( 'event_group_title', 'event_group_title' );
		add_shortcode( 'event', 'event' );
		add_shortcode( 'slider', 'slider' );
		add_shortcode( 'slide', 'slide' );
		add_shortcode( 'quote', 'quote' );
		add_shortcode( 'link_wrap', 'link_wrap' );
		add_shortcode( 'aside_wrap', 'aside_wrap' );
		add_shortcode( 'media_wrap', 'media_wrap' );
		add_shortcode( 'theme_video', 'theme_video' );
		add_shortcode( 'theme_audio', 'theme_audio' );
		add_shortcode( 'drop_cap', 'drop_cap' );
		add_shortcode( 'tagline', 'tagline' );
		add_shortcode( 'portflio_field', 'portflio_field' );
		add_shortcode( 'tag_wrap', 'tag_wrap' );
		add_shortcode( 'tag', 'tag' );
		add_shortcode( 'full_width_image', 'full_width_image' );
		
		
		// Do the shortcode ( only the one above is registered )
		$content = do_shortcode( $content );
		
		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
		
		
		return $content;
	}
	
	add_filter( 'the_content', 'pixelwars_theme_run_shortcode', 7 );


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	// https://github.com/franz-josef-kaiser/Easy-Pagination-Deamon
	// https://github.com/marke123/Easy-Pagination-Deamon
	
	
	if ( ! class_exists('WP') ) 
	{
		header( 'Status: 403 Forbidden' );
		header( 'HTTP/1.1 403 Forbidden' );
		exit;
	}
	
	
	/**
	 * TEMPLATE TAG
	 * 
	 * A wrapper/template tag for the pagination builder inside the class.
	 * Write a call for this function with a "range" 
	 * inside your template to display the pagination.
	 * 
	 * @param integer $range
	 */
	
	function oxo_pagination( $args ) 
	{
		return new oxoPagination( $args );
	}
	
	
	if ( ! class_exists( 'oxoPagination' ) ) 
	{
		class oxoPagination 
		{
			/**
			 * Plugin root path
			 * @var unknown_type
			 */
			protected $path;
			
			/**
			 * Plugin version
			 * @var integer
			 */
			protected $version;
			
			/**
			 * Default arguments
			 * @var array
			 */
			protected $defaults = array( 'classes'			=> ""
										,'range'			=> 5
										,'wrapper'			=> 'li' // element in which we wrap the link 
										,'highlight'		=> 'current' // class for the current page
										,'before'			=> ""
										,'after'			=> ""
										,'link_before'		=> ""
										,'link_after'		=> ""
										,'next_or_number'	=> 'number'
										,'nextpagelink'		=> 'Next'
										,'previouspagelink'	=> 'Prev'
										,'pagelink'			=> '%'
										# only for attachment img pagination/navigation
										,'attachment_size'	=> 'thumbnail'
										,'show_attachment'	=> true );

			/**
			 * Input arguments
			 * @var array
			 */
			protected $args;
			
			/**
			 * Constant for the texdomain (i18n)
			 */
			const LANG = 'read';
			
			
			public function __construct( $args ) 
			{
				// Set root path variable
				$this->path = $this->get_root_path();

				// Set version
				# $this->version = get_plugin_data();

				# >>>> defaults & arguments

					// apply the "wp_list_pages_args" wordpress native filter also to the custom "page_links" function.
					$this->defaults = apply_filters( 'wp_link_pages_args', $this->defaults );

					// merge defaults with input arguments
					$this->args = wp_parse_args( $args, $this->defaults );

				# <<<< defaults & arguments

				// Help placing the template tag at the right position (inside/outside loop).
				$this->help();

				// Css
				$this->register_styles();
				// Load stylesheet into the 'wp_head()' hook of your theme.
				add_action( 'wp_head', array( &$this, 'print_styles' ) );

				// RENDER
				$this->render( $this->args );
			}


			/**
			 * Plugin root
			 */
			function get_root_path() 
			{
				$path = trailingslashit( WP_PLUGIN_URL.'/'.str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ) );
				$path = apply_filters( 'config_pagination_url', $path );

				return $this->path = $path;
			}


			/**
			 * Return plugin comment data
			 * 
			 * @since 0.1.3.3
			 * 
			 * @param $value string | default = 'Version' (Other input values: Name, PluginURI, Version, Description, Author, AuthorURI, TextDomain, DomainPath, Network, Title)
			 * 
			 * @return string
			 */
			private function get_plugin_data( $value = 'Version' )
			{	
				$plugin_data = get_plugin_data( __FILE__ );

				return $plugin_data[ $value ];
			}

			/**
			 * Register styles
			 */
			function register_styles() 
			{
				if ( ! is_admin() )
				{
					// Search for a stylesheet
					$name = '/pagination.css';

					if ( file_exists( get_stylesheet_directory() . $name ) )
					{
						$file = get_stylesheet_directory() . $name;
					}
					elseif ( file_exists( get_template_directory() . $name ) )
					{
						$file = get_template_directory() . $name;
					}
					elseif ( file_exists( $this->path.$name ) )
					{
						$file = $this->path.$name;
					}
					else 
					{
						return;
					}

					// try to avoid caching stylesheets if they changed
					$version = filemtime( $file );
					
					// If no change was found, use the plugins version number
					if ( ! $version )
						$version = $this->version;

					wp_register_style( 'pagination', $file, false, $version, 'screen' );
				}
			}

			/**
			 * Print styles
			 */
			function print_styles() 
			{
				if ( ! is_admin() )
				{
					wp_enqueue_style( 'pagination' );
				}
			}

			/**
			 * Help with placing the template tag right
			 */
			function help() 
			{
				/*
				if ( is_single() && ! in_the_loop() )
				{
					$output = sprintf( __( 'You should place the %1$s template tag inside the loop on singular templates.', self::LANG ), __CLASS__ );
				}
				else

				_doing_it_wrong( 'Class: '.__CLASS__.' function: '.__FUNCTION__, 'error message' );
				*/
				if ( ! is_single() && in_the_loop() )
				{
					$output = sprintf( __( 'You shall not place the %1$s template tag inside the loop on list/archives/search/etc templates.', self::LANG ), __CLASS__ );
				}

				if ( ! isset( $output ) )
					return;

				// error
				$message = new WP_Error( 
					 __CLASS__
					,$output 
				);

				// render
				if ( is_wp_error( $message ) ) 
				{ 
				?>
					<div id="oxo-error-<?php echo $message->get_error_code(); ?>" class="error oxo-error prepend-top clear">
						<strong>
							<?php echo $message->get_error_message(); ?>
						</strong>
					</div>
				<?php 
				}
			}


			/**
			 * Replacement for the native wp_link_page() function
			 * 
			 * @author original version: Thomas Scholz (toscho.de)
			 * @link http://wordpress.stackexchange.com/questions/14406/how-to-style-current-page-number-wp-link-pages/14460#14460
			 * 
			 * @param (mixed) array $args
			 */
			public function page_links( $args )
			{
				global $page, $numpages, $multipage, $more, $pagenow;

				$args = wp_parse_args( $args, $this->defaults );
				extract( $args, EXTR_SKIP );

				if ( ! $multipage )
					return;

				# ============================================== #

				# >>>> css classes wrapper
				$start_classes = isset( $classes ) ? ' class="' : '';
				$end_classes = isset( $classes ) ? '"' : '';
				# <<<< css classes wrapper

				$output  = $before;
				
				switch ( $next_or_number ) 
				{
					case 'next' :
					
						if ( $more ) 
						{
							# >>>> [prev]
							$i = $page - 1;
							if ( $i && $more ) 
							{
								# >>>> <li class="custom-class">
								$output .= '<'.$wrapper.$start_classes.$classes.$end_classes.'>';
									$output .= _wp_link_page( $i ).$link_before.$previouspagelink.$link_after.'</a>';
								$output .= '</'.$wrapper.'>';
								# <<<< </li>
							}
							# <<<< [prev]

							# >>>> [next]
							$i = $page + 1;
							if ( $i <= $numpages && $more ) 
							{
								# >>>> <li class="custom-class">
								$output .= '<'.$wrapper.$start_classes.$classes.$end_classes.'>';
									$output .= _wp_link_page( $i ).$link_before.$nextpagelink.$link_after.'</a>';
								$output .= '</'.$wrapper.'>';
								# <<<< </li>
							}
							# <<<< [next]
						}
						
						break;

					case 'number' :
					
						for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
						{
							$classes = isset( $this->args['classes'] ) ? $this->args['classes'] : '';
							
							if ( $page === $i && isset( $this->args['highlight'] ) )
								 $classes .= ' '.$this->args['highlight'];

							# >>>> <li class="current custom-class">
							$output .= '<'.$wrapper.$start_classes.$classes.$end_classes.'>';

								# >>>> [1] [2] [3] [4]
								$j = str_replace( '%', $i, $pagelink );

								if ( $page !== $i || ( ! $more && $page == true ) )
								{
									$output .= _wp_link_page( $i ).$link_before.$j.$link_after.'</a>';
								}

								// the current page must not have a link to itself
								else
								{
									$output .= $link_before.'<span>'.$j.'</span>'.$link_after;
								}
								# <<<< [next]/[prev] | [1] [2] [3] [4]

							$output .= '</'.$wrapper.'>';
							# <<<< </li>
						}
						
						break;

					default :
					
						// in case you can imagine some funky way to paginate
						do_action( 'hook_pagination_next_or_number', $page_links, $classes );
						break;
				}
				
				$output .= $after;

				return $output;
			}


			/**
			 * Navigation for image attachments
			 * 
			 * @param unknown_type $args
			 */
			public function attachment_links( $args )
			{
				global $post, $page;

				$args = wp_parse_args( $args, $this->defaults );
				extract( $args, EXTR_SKIP );

				# ============================================== #

				$attachments = array_values( get_children( array( 
					 'post_parent'		=> $post->post_parent
					,'post_status'		=> 'inherit'
					,'post_type'		=> 'attachment'
					,'post_mime_type'	=> 'image'
					,'order'			=> 'ASC'
					,'orderby'			=> 'menu_order ID' 
				) ) );

				// setup the keys for our links
				foreach ( $attachments as $key => $attachment ) {
					if ( $attachment->ID == $post->ID )
						break;
				}

				# ============================================== #
				# @todo implement rel="next/prev" for links

				# >>>> css classes wrapper
				$start_classes = isset( $classes ) ? ' class="' : '';
					$classes = isset( $classes ) ? ' '.$classes : '';
				$end_classes = isset( $classes ) ? '"' : '';
				# <<<< css classes wrapper

				$output  = $before;
					# >>>> [prev]
					if ( isset( $attachments[ $key - 1 ] ) )
					{
						$prev_href = get_attachment_link( $attachments[ $key - 1 ]->ID );

						$prev_title = str_replace( "_", " ", $attachments[ $key - 1 ]->post_title );
						$prev_title = str_replace( "-", " ", $prev_title );

						if ( $show_attachment === true )
						{
							if ( ( is_int( $attachment_size ) && $attachment_size != 0 ) || ( is_string( $attachment_size ) && $attachment_size != 'none' ) || $attachment_size != false )
								$prev_img = wp_get_attachment_image( $attachments[ $key - 1 ]->ID, $attachment_size, false );
						}

						# >>>> <li class="custom-class">
						$output .= '<'.$wrapper. $start_classes.$classes.$end_classes .'>';
							$output .= $link_before.'<a href="'.$prev_href.'" title="'.esc_attr( $prev_title ).'" rel="attachment prev">'.$prev_img.$previouspagelink.'</a>'.$link_after;
						$output .= '</'.$wrapper.'>';
						# <<<< </li>
					}
					# <<<< [prev]

					# >>>> [next]
					if ( isset( $attachments[ $key + 1 ] ) )
					{
						$next_href = get_attachment_link( $attachments[ $key + 1 ]->ID );

						$next_title = str_replace( "_", " ", $attachments[ $key + 1 ]->post_title );
						$next_title = str_replace( "-", " ", $next_title );

						if ( $show_attachment === true )
						{
							if ( ( is_int( $attachment_size ) && $attachment_size != 0 ) || ( is_string( $attachment_size ) && $attachment_size != 'none' ) || $attachment_size != false )
								$next_img = wp_get_attachment_image( $attachments[ $key + 1 ]->ID, $attachment_size, false );
						}

						# >>>> <li class="custom-class">
						$output .= '<'.$wrapper. $start_classes.$classes.$end_classes .'>';
							$output .= $link_before.'<a href="'.$next_href.'" title="'.esc_attr( $next_title ).'" rel="attachment prev">'.$next_img.$nextpagelink.'</a>'.$link_after;
						$output .= '</'.$wrapper.'>';
						# <<<< </li>
					}
					# <<<< [next]
				$output .= $after;

				#echo '<pre>';print_r($k);echo '</pre>';
				return $output;
			}


			/**
			 * Wordpress pagination for archives/search/etc.
			 * 
			 * Semantically correct pagination inside an unordered list
			 * 
			 * Displays: [First] [<<] [1] [2] [3] [4] [>>] [Last]
			 *	+ First/Last only appears if not on first/last page
			 *	+ Shows next/previous links [<<]/[>>]
			 * 
			 * Accepts a range attribute (default = 5) to adjust the number
			 * of direct page links that link to the pages above/below the current one.
			 * 
			 * @param (integer) $range
			 */
			function render( $args = array( 'classes', 'range' ) ) 
			{
				// $paged - number of the current page
				global $wp_query, $paged, $numpages;

				extract( $args, EXTR_SKIP );

				# ============================================== #

				// How much pages do we have?
				$max_page = (int) $wp_query->max_num_pages;

				// We need the pagination only if there is more than 1 page
				if ( $max_page > (int) 1 )
					$paged = ! $wp_query->query_vars['paged'] ? (int) 1 : $wp_query->query_vars['paged'];

				$classes = isset( $classes ) ? ' '.$classes : '';
				?>

				<ul class="pagination">

					<?php 
					// *******************************************************
					// To the first / previous page
					// On the first page, don't put the first / prev page link
					// *******************************************************
					if ( $paged !== (int) 1 && $paged !== (int) 0 && ! is_page() ) 
					{
						?>
						<li class="pagination-first <?php echo $classes; ?>">
							<?php
							$first_post_link = get_pagenum_link( 1 ); 
							?>
							<a href=<?php echo $first_post_link; ?> rel="first">
								<?php _e( 'First', 'read' ); ?>
							</a>
						</li>

						<li class="pagination-prev <?php echo $classes; ?>">
							<?php 
								# let's use the native fn instead of the previous_/next_posts_link() alias
								# get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true )

								// Get the previous post object
								$in_same_cat	= is_category() || is_tag() || is_tax() ? true : false;
								$prev_post_obj	= get_adjacent_post( $in_same_cat );
								// Get the previous posts ID
								$prev_post_ID	= isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';

								// Set title & link for the previous post
								if ( is_single() )
								{
									if ( isset( $prev_post_obj ) )
									{
										$prev_post_link		= get_permalink( $prev_post_ID );
										$prev_post_title	= '&laquo;';
										// $prev_post_title	= __( 'Prev', self::LANG ) . ': ' . mb_substr( $prev_post_obj->post_title, 0, 6 );
									}
								}
								else
								{
									$prev_post_link		= home_url().'/?s='.get_search_query().'&paged='.( $paged-1 );
									$prev_post_title	= '&laquo;';
								}
								?>
							<!-- Render Link to the previous post -->
							<a href="<?php echo $prev_post_link; ?>" rel="prev">
								<?php echo $prev_post_title; ?>
							</a>
							<?php # previous_posts_link(' &laquo; '); // ?>
						</li>
						<?php 
					}

					// Render, as long as there are more posts found, than we display per page
					if ( ! $wp_query->query_vars['posts_per_page'] < $wp_query->found_posts )
					{

						// *******************************************************
						// We need the sliding effect only if there are more pages than is the sliding range
						// *******************************************************
						if ( $max_page > $range ) 
						{
							// When closer to the beginning
							if ( $paged < $range ) 
							{
								for ( $i = 1; $i <= ( $range+1 ); $i++ ) 
								{ 
									$current = '';
									// Apply the css class "current" if it's the current post
									if ( $paged === (int) $i )
									{
										$current = ' current';
										# echo _wp_link_page( $i ).'</a>';
									}
									?>
									<li class="pagination-num<?php echo $classes.$current; ?>">
										<!-- Render page number Link -->
										<a href="<?php echo get_pagenum_link( $i ); ?>">
											<?php echo $i; ?>
										</a>
									</li>
									<?php 
								}
							}
							// When closer to the end
							elseif ( $paged >= ( $max_page - ceil ( $range/2 ) ) ) 
							{
								for ( $i = $max_page - $range; $i <= $max_page; $i++ )
								{ 
									$current = '';
									// Apply the css class "current" if it's the current post
									$current = ( $paged === (int) $i ) ? ' current' : '';

									?>
									<li class="pagination-num<?php echo $classes.$current; ?>">
										<!-- Render page number Link -->
										<a href="<?php echo get_pagenum_link( $i ); ?>">
											<?php echo $i; ?>
										</a>
									</li>
									<?php 
								}
							}
							// Somewhere in the middle
							elseif ( $paged >= $range && $paged < ( $max_page - ceil( $range/2 ) ) ) 
							{
								for ( $i = ( $paged - ceil( $range/2 ) ); $i <= ( $paged + ceil( $range/2 ) ); $i++ ) 
								{
									$current = '';
									// Apply the css class "current" if it's the current post
									$current = ( $paged === (int) $i ) ? ' current' : '';

									?>
									<li class="pagination-num<?php echo $classes.$current; ?>">
										<!-- Render page number Link -->
										<a href="<?php echo get_pagenum_link( $i ); ?>">
											<?php echo $i; ?>
										</a>
									</li>
									<?php 
								}
							}
						}
						// Less pages than the range, no sliding effect needed
						else 
						{
							for ( $i = 1; $i <= $max_page; $i++ ) 
							{
								$current = '';
								// Apply the css class "current" if it's the current post
								$current = ( $paged === (int) $i ) ? ' current' : '';

								?>
								<li class="pagination-num<?php echo $classes.$current; ?>">
									<!-- Render page number Link -->
									<a href="<?php echo get_pagenum_link( $i ); ?>">
										<?php echo $i; ?>
									</a>
								</li>
								<?php 
							}
						} // endif;
					} // endif; there are more posts found, than we display per page 


					// *******************************************************
					// to the last / next page of a paged post
					// This only get's used on posts/pages that use the <!--nextpage--> quicktag
					// *******************************************************
					if ( is_singular() )
					{
						$echo = false;

						if ( wp_attachment_is_image() === true )
						{ 
							echo $this->attachment_links( $this->args );
						}
						elseif ( $numpages > 1 )
						{
							echo $this->page_links( $this->args );
						}
					}


					// *******************************************************
					// to the last / next page
					// On the last page: don't show the link to the last/next page
					// *******************************************************
					if ( $paged !== (int) 0 && $paged !== (int) $max_page && $max_page !== (int) 0 && ! is_page() )
					{
						?>
						<li class="pagination-next<?php echo $classes; ?>">
							<?php 
							# let's use the native fn instead of the previous_/next_posts_link() alias
							# get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true )

							// Get the next post object
							$in_same_cat	= is_category() || is_tag() || is_tax() ? true : false;
							$next_post_obj	= get_adjacent_post( $in_same_cat, '', false );
							// Get the next posts ID
							$next_post_ID	= isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';

							// Set title & link for the next post
							if ( is_single() )
							{
								if ( isset( $next_post_obj ) )
								{
									# $next_post_link = get_next_posts_link();
									# $next_post_paged_link = get_next_posts_page_link();
									$next_post_link		= get_permalink( $next_post_ID );
									$next_post_title	= '&raquo;';
									// $next_post_title	= __( 'Next', self::LANG ) . mb_substr( $next_post_obj->post_title, 0, 6 );
								}
							}
							else 
							{
								$next_post_link		= home_url().'/?s='.get_search_query().'&paged='.( $paged+1 );
								$next_post_title	= '&raquo;';
							}

							if ( isset ( $next_post_obj ) )
							{
								?>
								<!-- Render Link to the next post -->
								<a href="<?php echo $next_post_link; ?>" rel="next">
									<?php echo $next_post_title; ?>
								</a>
								<?php
							} 
							else 
							{
								next_posts_link(' &raquo; ');
							}
							?>
						</li>

						<li class="pagination-last<?php echo $classes; ?>">
							<?php
							$last_post_link = get_pagenum_link( $max_page ); 
							?>
							<!-- Render Link to the last post -->
							<a href="<?php echo $last_post_link; ?>" rel="last">
								<?php _e( 'Last', 'read' ); ?>
							</a>
						</li>
						<?php 
					}
					// endif;
				?>
				</ul>
				<?php
			}
		}
	}


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	if ( is_admin() )
	{
		include_once 'theme-options.php';
	}


/* ============================================================================================================================================= */


	include_once 'shortcode-generator.php';


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	function pixelwars_theme_customize_register( $wp_customize )
	{
		/* ================================================== */
		/* ================================================== */
		
		
		$wp_customize->add_section( 'section_colors' , array( 'title' => __( 'Colors', 'read' ), 'priority' => 30 ) );
		
		
		/* ========================= */
		
		
		$wp_customize->add_setting( 'setting_link_color', array( 'default' => '#333333', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'control_link_color', array( 'label' => __( 'Link Color', 'read' ),
																												'section' => 'section_colors',
																												'settings' => 'setting_link_color' ) ) );
		
		
		/* ================================================== */
		/* ================================================== */
		
		
		$wp_customize->add_section( 'section_fonts' , array( 'title' => __( 'Fonts', 'read' ), 'priority' => 31 ) );
		
		
		/* ========================= */
		
		
		include_once 'fonts.php';
		
		
		/* ========================= */
		
		
		$wp_customize->add_setting( 'setting_content_font', array( 'default' => 'Noticia Text', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_content_font', array(	'label' => 'Content Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_content_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
		
		
		/* ================================================== */
		/* ================================================== */
		
		
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		
		
		$wp_customize->get_setting( 'setting_link_color' )->transport = 'postMessage';
		
		
		$wp_customize->get_setting( 'setting_content_font' )->transport = 'postMessage';
	}
	
	add_action( 'customize_register', 'pixelwars_theme_customize_register' );
	
	
	function pixelwars_theme_customize_css()
	{
		global $pixelwars_subset;
		
		$extra_font_styles = get_option( 'extra_font_styles', 'No' );
		
		if ( $extra_font_styles == 'Yes' )
		{
			$font_styles = ':300,400,600,700,800,900,300italic,400italic,600italic,700italic,800italic,900italic';
		}
		else
		{
			$font_styles = ':300,400,300italic,400italic';
		}
		
		?>

<?php
	$setting_content_font = get_theme_mod( 'setting_content_font', "" );
	
	if ( $setting_content_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' . $setting_content_font . $font_styles . $pixelwars_subset . '">';
	}
?>

<style type="text/css">
<?php
	$setting_link_color = get_theme_mod( 'setting_link_color', "" );
	
	if ( $setting_link_color != "" )
	{
		echo '.entry-content > p > a:not(.button) { color: ' . $setting_link_color . '; }' . "\n";
	}
?>

<?php
	$setting_content_font = get_theme_mod( 'setting_content_font', "" );
	
	if ( $setting_content_font != "" )
	{
		echo 'body, input, textarea, select, button { font-family: "' . $setting_content_font . '"; }' . "\n";
	}
?>
</style>
		<?php
	}
	
	add_action( 'wp_head', 'pixelwars_theme_customize_css' );
	
	
	function pixelwars_theme_customize_preview_js()
	{
		wp_enqueue_script( 'pixelwars_theme_customizer', get_template_directory_uri() . '/js/wp-theme-customizer.js', null, null, true );
	}
	
	add_action( 'customize_preview_init', 'pixelwars_theme_customize_preview_js' );


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	function pixelwars_options_wp_head()
	{
		?>
			<!--[if lt IE 9]>
				<script src="<?php echo get_template_directory_uri(); ?>/js/ie.js"></script>
			<![endif]-->
		<?php
		
		
		$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
	
		if ( $custom_css != "" )
		{
			echo '<style type="text/css">' . "\n";
			
				echo $custom_css;
			
			echo "\n" . '</style>' . "\n";
		}
		
		
		$external_css = stripcslashes( get_option( 'external_css', "" ) );
		echo $external_css;
		
		
		$tracking_code_head = stripcslashes( get_option( 'tracking_code_head', "" ) );
		echo $tracking_code_head;
	}
	
	add_action( 'wp_head', 'pixelwars_options_wp_head' );


/* ============================================================================================================================================= */


	function pixelwars_options_wp_footer()
	{
		$external_js = stripcslashes( get_option( 'external_js', "" ) );
		echo $external_js;
		
		
		$tracking_code_body = stripcslashes( get_option( 'tracking_code_body', "" ) );
		echo $tracking_code_body;
	}
	
	add_action( 'wp_footer', 'pixelwars_options_wp_footer' );


/* ============================================================================================================================================= */


?>