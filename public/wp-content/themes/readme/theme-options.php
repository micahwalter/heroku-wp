<?php


/* ============================================================================================================================================ */


	function create_tabs( $current = 'general' )
	{
		$tabs = array(  'general' => 'General',
						'blog' => 'Blog',
						'style' => 'Style',
						'portfolio' => 'Portfolio',
						'gallery' => 'Gallery',
						'sidebar' => 'Sidebar',
						'seo' => 'SEO' );
		
		?>
			<h2 class="nav-tab-wrapper">
				<div id="icon-themes" class="icon32"></div>
				
				<div>
					<h2>Theme Options</h2>
				</div>
				
				<?php
					foreach ( $tabs as $tab => $name )
					{
						$class = ( $tab == $current ) ? ' nav-tab-active' : "";
						
						echo "<a class='nav-tab$class' href='?page=theme-options&tab=$tab'>$name</a>";
					}
				?>
			</h2>
		<?php
	}


/* ============================================================================================================================================ */


	function theme_options_page()
	{
		global $pagenow;
		
		?>
			<div class="wrap wrap2">
				<div class="status">
					<img alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif">
					
					<strong></strong>
				</div>
				
				
				<script>
					jQuery(document).ready(function($)
					{
					// -------------------------------------------------------------------------
					
						var uploadID = '',
							uploadImg = '';

						jQuery( '.upload-button' ).click(function()
						{
							uploadID = jQuery(this).prev( 'input' );
							uploadImg = jQuery(this).next( 'img' );
							formfield = jQuery( '.upload' ).attr( 'name' );
							tb_show( "", 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
							return false;
						});
						
						window.send_to_editor = function( html )
						{
							imgurl = jQuery( 'img', html ).attr( 'src' );
							uploadID.val( imgurl );
							uploadImg.attr('src', imgurl);
							tb_remove();
						}
					
					
					// -------------------------------------------------------------------------
					
					
						$( ".alert-success p" ).click(function()
						{
							$(this).fadeOut( "slow", function()
							{
								$( ".alert-success" ).slideUp( "slow" );
							});
						});
					
					
					// -------------------------------------------------------------------------
					
					
						$( '.color' ).change( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
						
						
						$( '.color' ).keypress( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
					
					
					// -------------------------------------------------------------------------
					
					
						$( 'form.ajax-form' ).submit(function()
						{
							$.ajax(
							{
								data: $( this ).serialize(),
								type: "POST",
								beforeSend: function()
								{
									$( '.status' ).removeClass( 'status-done' );
									$( '.status img' ).show();
									$( '.status strong' ).html( 'Saving...' );
									$( '.status' ).fadeIn();
								},
								success: function(data)
								{
									$( '.status img' ).hide();
									$( '.status' ).addClass( 'status-done' );
									$( '.status strong' ).html( 'Done.' );
									$( '.status' ).delay( 1000 ).fadeOut();
								}
							});
							
							return false;
						});
					
					
					// -------------------------------------------------------------------------
					});
				</script>
				
				
				<?php
					
					if ( isset( $_GET['tab'] ) )
					{
						create_tabs( $_GET['tab'] );
					}	
					else
					{
						create_tabs( 'general' );
					}
					
				?>
				
				
				<div id="poststuff">
					<?php
					
						// theme options page
						if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
						{
							// tab from url
							if ( isset( $_GET['tab'] ) )
							{
								$tab = $_GET['tab'];
							}
							else
							{
								$tab = 'general'; 
							}
							
							
							switch ( $tab )
							{
								case 'general' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form method="post" class="ajax-form" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Logo Type</h4>
																
																<?php
																	$logo_type = get_option( 'logo_type', 'Text Logo' );
																?>
																<select id="logo_type" name="logo_type" style="width: 100%;">
																	<option <?php if ( $logo_type == 'Text Logo' ) { echo 'selected="selected"'; } ?>>Text Logo</option>
																	
																	<option <?php if ( $logo_type == 'Image Logo' ) { echo 'selected="selected"'; } ?>>Image Logo</option>
																</select>
															</td>
															
															<td class="option-right">
																Select logo type.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Image Logo</h4>
																
																<?php
																	$logo_image = get_option( 'logo_image' );
																?>
																<input type="text" id="logo_image" name="logo_image" class="upload code2" style="width: 100%;" value="<?php echo $logo_image; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $logo_image; ?>">
															</td>
															
															<td class="option-right">
																Upload a logo or specify an image address of your online logo.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Text Logo</h4>
																
																<?php
																	$select_text_logo = get_option( 'select_text_logo', 'WordPress Site Title' );
																?>
																<select id="select_text_logo" name="select_text_logo" style="width: 100%;">
																	<option <?php if ( $select_text_logo == 'WordPress Site Title' ) { echo 'selected="selected"'; } ?>>WordPress Site Title</option>
																	
																	<option <?php if ( $select_text_logo == 'Theme Site Title' ) { echo 'selected="selected"'; } ?>>Theme Site Title</option>
																</select>
																
																<h4>Theme Site Title</h4>
																
																<?php
																	$theme_site_title = stripcslashes( get_option( 'theme_site_title', "" ) );
																?>
																<textarea id="theme_site_title" name="theme_site_title" rows="1" cols="50"><?php echo $theme_site_title; ?></textarea>
															</td>
															
															<td class="option-right">
																Site title.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Tagline</h4>
																
																<?php
																	$select_tagline = get_option( 'select_tagline', 'WordPress Tagline' );
																?>
																<select id="select_tagline" name="select_tagline" style="width: 100%;">
																	<option <?php if ( $select_tagline == 'WordPress Tagline' ) { echo 'selected="selected"'; } ?>>WordPress Tagline</option>
																	
																	<option <?php if ( $select_tagline == 'Theme Tagline' ) { echo 'selected="selected"'; } ?>>Theme Tagline</option>
																</select>
																
																<h4>Theme Tagline</h4>
																
																<?php
																	$theme_tagline = stripcslashes( get_option( 'theme_tagline', "" ) );
																?>
																<textarea id="theme_tagline" name="theme_tagline" rows="2" cols="50"><?php echo $theme_tagline; ?></textarea>
															</td>
															
															<td class="option-right">
																In a few words, explain what this site is about.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Login Logo</h4>
																
																<?php
																	$logo_login = get_option( 'logo_login' );
																?>
																<input type="text" id="logo_login" name="logo_login" class="upload code2" style="width: 100%;" value="<?php echo $logo_login; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $logo_login; ?>">
																
																<br>
																
																<?php
																	$logo_login_hide = get_option( 'logo_login_hide', false );
																?>
																<label><input type="checkbox" id="logo_login_hide" name="logo_login_hide" <?php if ( $logo_login_hide ) { echo 'checked="checked"'; } ?>> Hide Login Logo Module</label>
															</td>
															
															<td class="option-right">
																A PNG image.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Favicon</h4>
																
																<?php
																	$favicon = get_option( 'favicon', "" );
																?>
																<input type="text" id="favicon" name="favicon" class="upload code2" style="width: 100%;" value="<?php echo $favicon; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 16px;" align="right" alt="" src="<?php echo $favicon; ?>">
															</td>
															
															<td class="option-right">
																(16x16)px ICO, PNG or GIF format.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Apple Touch Icon</h4>
																
																<?php
																	$apple_touch_icon = get_option( 'apple_touch_icon', "" );
																?>
																<input type="text" id="apple_touch_icon" name="apple_touch_icon" class="upload code2" style="width: 100%;" value="<?php echo $apple_touch_icon; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $apple_touch_icon; ?>">
															</td>
															
															<td class="option-right">
																A PNG image that will represent your website's favicon for Apple devices such as the iPod Touch, iPhone and iPad, as well as some Android devices.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Copyright Text</h4>
																
																<?php
																	$copyright_text = stripcslashes( get_option( 'copyright_text', "" ) );
																?>
																<textarea id="copyright_text" name="copyright_text" rows="5" cols="50"><?php echo $copyright_text; ?></textarea>
															</td>
															
															<td class="option-right">
																Copyright text in the footer.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'style' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Fonts and Colors</h4>
																
																<?php
																	echo '<a href="' . admin_url( 'customize.php' ) . '">Customize</a>';
																?>
															</td>
															
															<td class="option-right">
																Select from theme customizer.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Character Sets</h4>
																
																<label><input type="checkbox" id="char_set_latin" name="char_set_latin" <?php if ( get_option( 'char_set_latin', true ) ) { echo 'checked="checked"'; } ?>> Latin</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_latin_ext" name="char_set_latin_ext" <?php if ( get_option( 'char_set_latin_ext' ) ) { echo 'checked="checked"'; } ?>> Latin Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_cyrillic" name="char_set_cyrillic" <?php if ( get_option( 'char_set_cyrillic' ) ) { echo 'checked="checked"'; } ?>> Cyrillic</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_cyrillic_ext" name="char_set_cyrillic_ext" <?php if ( get_option( 'char_set_cyrillic_ext' ) ) { echo 'checked="checked"'; } ?>> Cyrillic Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_greek" name="char_set_greek" <?php if ( get_option( 'char_set_greek' ) ) { echo 'checked="checked"'; } ?>> Greek</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_greek_ext" name="char_set_greek_ext" <?php if ( get_option( 'char_set_greek_ext' ) ) { echo 'checked="checked"'; } ?>> Greek Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_vietnamese" name="char_set_vietnamese" <?php if ( get_option( 'char_set_vietnamese' ) ) { echo 'checked="checked"'; } ?>> Vietnamese</label>
															</td>
															
															<td class="option-right">
																Select any of them to include to the Google Fonts if the selected fonts have ones of them in their family.
																<br>
																<br>
																To see the supported character sets visit Google Fonts online.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Font Styles</h4>
																
																<?php
																	$extra_font_styles = get_option( 'extra_font_styles', 'No' );
																?>
																<select id="extra_font_styles" name="extra_font_styles" style="width: 100%;">
																	<option <?php if ( $extra_font_styles == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $extra_font_styles == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Bold and italic styles.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Fixed Header</h4>
																
																<?php
																	$fixed_header = get_option( 'fixed_header', 'Yes' );
																?>
																<select id="fixed_header" name="fixed_header" style="width: 100%;">
																	<option <?php if ( $fixed_header == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $fixed_header == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Mobile Zoom</h4>
																
																<?php
																	$mobile_zoom = get_option( 'mobile_zoom', 'Yes' );
																?>
																<select id="mobile_zoom" name="mobile_zoom" style="width: 100%;">
																	<option <?php if ( $mobile_zoom == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $mobile_zoom == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Footer Widget Locations</h4>
																
																<?php
																	$footer_widget_locations = get_option( 'footer_widget_locations', 'No' );
																?>
																<select id="footer_widget_locations" name="footer_widget_locations" style="width: 100%;">
																	<option <?php if ( $footer_widget_locations == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $footer_widget_locations == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Page Comments</h4>
																
																<?php
																	$page_comments = get_option( 'page_comments', 'No' );
																?>
																<select id="page_comments" name="page_comments" style="width: 100%;">
																	<option <?php if ( $page_comments == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $page_comments == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Allow page comments.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Blog Masonry Item Width (px)</h4>
																
																<?php
																	$blog_masonry_item_width = get_option( 'blog_masonry_item_width', '340' );
																?>
																<input type="text" id="blog_masonry_item_width" name="blog_masonry_item_width" style="width: 100%;" value="<?php echo $blog_masonry_item_width; ?>">
															</td>
															
															<td class="option-right">
																Item width.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Blog Masonry Alternate Item Width (px)</h4>
																
																<?php
																	$blog_masonry_alternate_item_width = get_option( 'blog_masonry_alternate_item_width', '440' );
																?>
																<input type="text" id="blog_masonry_alternate_item_width" name="blog_masonry_alternate_item_width" style="width: 100%;" value="<?php echo $blog_masonry_alternate_item_width; ?>">
															</td>
															
															<td class="option-right">
																Item width.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Custom CSS</h4>
																
																<?php
																	$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
																?>
																<textarea id="custom_css" name="custom_css" class="code2" rows="8" cols="50"><?php echo $custom_css; ?></textarea>
															</td>
															
															<td class="option-right">
																Quickly add custom css.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>External CSS</h4>
																
																<?php
																	$external_css = stripcslashes( get_option( 'external_css', "" ) );
																?>
																<textarea id="external_css" name="external_css" class="code2" rows="8" cols="50"><?php echo $external_css; ?></textarea>
															</td>
															
															<td class="option-right">
																Add your custom external (.css) file.
																<br>
																<br>
																Sample (.css):
																<br>
																<br>
																<span class="code2">&lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;</span>
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>External JS</h4>
																
																<?php
																	$external_js = stripcslashes( get_option( 'external_js', "" ) );
																?>
																<textarea id="external_js" name="external_js" class="code2" rows="8" cols="50"><?php echo $external_js; ?></textarea>
															</td>
															
															<td class="option-right">
																Add your custom external (.js) file.
																<br>
																<br>
																Sample (.js):
																<br>
																<br>
																<span class="code2">&lt;script src="yourscript.js"&gt;&lt;/script&gt;</span>
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								
								break;
								
								
								case 'portfolio' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Item Width (px)</h4>
																
																<?php
																	$portfolio_columns = get_option( 'portfolio_columns', '340' );
																?>
																<input type="text" id="portfolio_columns" name="portfolio_columns" style="width: 100%;" value="<?php echo $portfolio_columns; ?>">
															</td>
															
															<td class="option-right">
																Portfolio item width.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Layout</h4>
																
																<?php
																	$portfolio_layout = get_option( 'portfolio_layout', 'masonry' );
																?>
																<select id="portfolio_layout" name="portfolio_layout" style="width: 100%;">
																	<option <?php if ( $portfolio_layout == 'masonry' ) { echo 'selected="selected"'; } ?>>masonry</option>
																	
																	<option <?php if ( $portfolio_layout == 'fitRows' ) { echo 'selected="selected"'; } ?>>fitRows</option>
																</select>
															</td>
															
															<td class="option-right">
																Portfolio page layout.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								
								case 'gallery' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Item Width (px)</h4>
																
																<?php
																	$gallery_columns = get_option( 'gallery_columns', '340' );
																?>
																<input type="text" id="gallery_columns" name="gallery_columns" style="width: 100%;" value="<?php echo $gallery_columns; ?>">
															</td>
															
															<td class="option-right">
																Gallery item width.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Layout</h4>
																
																<?php
																	$gallery_layout = get_option( 'gallery_layout', 'masonry' );
																?>
																<select id="gallery_layout" name="gallery_layout" style="width: 100%;">
																	<option <?php if ( $gallery_layout == 'masonry' ) { echo 'selected="selected"'; } ?>>masonry</option>
																	
																	<option <?php if ( $gallery_layout == 'fitRows' ) { echo 'selected="selected"'; } ?>>fitRows</option>
																</select>
															</td>
															
															<td class="option-right">
																Gallery page layout.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								
								case 'sidebar' :
								
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										$no_sidebar_name = get_option( 'no_sidebar_name' );
										
										if ( $no_sidebar_name == "" )
										{
											echo '<div class="alert-success" title="Click to close"><p><strong>Enter a text for new sidebar name.</strong></p></div>';
										}
										else
										{
											echo '<div class="alert-success" title="Click to close"><p><strong>Created.</strong></p></div>';
										}
										// end if
									}
									elseif ( esc_attr( @$_GET['deleted'] ) == 'true' )
									{
										delete_option( 'sidebars_with_commas' );
										
										echo '<div class="alert-success" title="Click to close"><p><strong>Deleted.</strong></p></div>';
									}
									// end if
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$wp_admin_url = admin_url( 'themes.php?page=theme-options&tab=sidebar' );
												?>
												
												<form method="post" action="<?php echo $wp_admin_url; ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>New Sidebar</h4>
																
																<input type="text" id="new_sidebar_name" name="new_sidebar_name" required="required" style="width: 100%;" value="">
															</td>
															
															<td class="option-right">
																Enter a text for a new sidebar name.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Create">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																Create new sidebar.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Sidebars</h4>
																
																<select id="sidebars" name="sidebars" style="width: 100%;" size="10" disabled="disabled">
																	<?php
																		$sidebars_with_commas = get_option( 'sidebars_with_commas' );
																		
																		if ( $sidebars_with_commas != "" )
																		{
																			$sidebars = preg_split("/[\s]*[,][\s]*/", $sidebars_with_commas);

																			foreach ( $sidebars as $sidebar_name )
																			{
																				echo '<option>' . $sidebar_name . '</option>';
																			}
																			// end for
																		}
																		// end if
																	?>
																</select>
															</td>
															
															<td class="option-right">
																New sidebar name must be different from created sidebar names.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<?php
																	$wp_admin_url = admin_url( 'themes.php?page=theme-options&tab=sidebar&deleted=true' );
																?>
																<a href="<?php echo $wp_admin_url; ?>" class="button button-primary button-large" style="margin-top: 20px;">Delete</a>
															</td>
															
															<td class="option-right">
																Remove.
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'blog' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Blog Type</h4>
																
																<?php
																	$blog_type = get_option( 'blog_type', 'Regular' );
																?>
																<select id="blog_type" name="blog_type" style="width: 100%;">
																	<option <?php if ( $blog_type == 'Regular' ) { echo 'selected="selected"'; } ?>>Regular</option>
																	
																	<option <?php if ( $blog_type == 'Simple' ) { echo 'selected="selected"'; } ?>>Simple</option>
																	
																	<option <?php if ( $blog_type == 'Alternate' ) { echo 'selected="selected"'; } ?>>Alternate</option>
																	
																	<option <?php if ( $blog_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																	
																	<option <?php if ( $blog_type == 'Masonry Alternate' ) { echo 'selected="selected"'; } ?>>Masonry Alternate</option>
																</select>
															</td>
															
															<td class="option-right">
																Select layout type.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Category Archive Type</h4>
																
																<?php
																	$category_archive_type = get_option( 'category_archive_type', 'Regular' );
																?>
																<select id="category_archive_type" name="category_archive_type" style="width: 100%;">
																	<option <?php if ( $category_archive_type == 'Regular' ) { echo 'selected="selected"'; } ?>>Regular</option>
																	
																	<option <?php if ( $category_archive_type == 'Simple' ) { echo 'selected="selected"'; } ?>>Simple</option>
																	
																	<option <?php if ( $category_archive_type == 'Alternate' ) { echo 'selected="selected"'; } ?>>Alternate</option>
																	
																	<option <?php if ( $category_archive_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																	
																	<option <?php if ( $category_archive_type == 'Masonry Alternate' ) { echo 'selected="selected"'; } ?>>Masonry Alternate</option>
																</select>
															</td>
															
															<td class="option-right">
																Select layout type.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Tag Archive Type</h4>
																
																<?php
																	$tag_archive_type = get_option( 'tag_archive_type', 'Regular' );
																?>
																<select id="tag_archive_type" name="tag_archive_type" style="width: 100%;">
																	<option <?php if ( $tag_archive_type == 'Regular' ) { echo 'selected="selected"'; } ?>>Regular</option>
																	
																	<option <?php if ( $tag_archive_type == 'Simple' ) { echo 'selected="selected"'; } ?>>Simple</option>
																	
																	<option <?php if ( $tag_archive_type == 'Alternate' ) { echo 'selected="selected"'; } ?>>Alternate</option>
																	
																	<option <?php if ( $tag_archive_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																	
																	<option <?php if ( $tag_archive_type == 'Masonry Alternate' ) { echo 'selected="selected"'; } ?>>Masonry Alternate</option>
																</select>
															</td>
															
															<td class="option-right">
																Select layout type.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Author Archive Type</h4>
																
																<?php
																	$author_archive_type = get_option( 'author_archive_type', 'Regular' );
																?>
																<select id="author_archive_type" name="author_archive_type" style="width: 100%;">
																	<option <?php if ( $author_archive_type == 'Regular' ) { echo 'selected="selected"'; } ?>>Regular</option>
																	
																	<option <?php if ( $author_archive_type == 'Simple' ) { echo 'selected="selected"'; } ?>>Simple</option>
																	
																	<option <?php if ( $author_archive_type == 'Alternate' ) { echo 'selected="selected"'; } ?>>Alternate</option>
																	
																	<option <?php if ( $author_archive_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																	
																	<option <?php if ( $author_archive_type == 'Masonry Alternate' ) { echo 'selected="selected"'; } ?>>Masonry Alternate</option>
																</select>
															</td>
															
															<td class="option-right">
																Select layout type.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Date Archive Type</h4>
																
																<?php
																	$date_archive_type = get_option( 'date_archive_type', 'Regular' );
																?>
																<select id="date_archive_type" name="date_archive_type" style="width: 100%;">
																	<option <?php if ( $date_archive_type == 'Regular' ) { echo 'selected="selected"'; } ?>>Regular</option>
																	
																	<option <?php if ( $date_archive_type == 'Simple' ) { echo 'selected="selected"'; } ?>>Simple</option>
																	
																	<option <?php if ( $date_archive_type == 'Alternate' ) { echo 'selected="selected"'; } ?>>Alternate</option>
																	
																	<option <?php if ( $date_archive_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																	
																	<option <?php if ( $date_archive_type == 'Masonry Alternate' ) { echo 'selected="selected"'; } ?>>Masonry Alternate</option>
																</select>
															</td>
															
															<td class="option-right">
																Select layout type.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Search Result Type</h4>
																
																<?php
																	$search_result_type = get_option( 'search_result_type', 'Regular' );
																?>
																<select id="search_result_type" name="search_result_type" style="width: 100%;">
																	<option <?php if ( $search_result_type == 'Regular' ) { echo 'selected="selected"'; } ?>>Regular</option>
																	
																	<option <?php if ( $search_result_type == 'Simple' ) { echo 'selected="selected"'; } ?>>Simple</option>
																	
																	<option <?php if ( $search_result_type == 'Alternate' ) { echo 'selected="selected"'; } ?>>Alternate</option>
																	
																	<option <?php if ( $search_result_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																	
																	<option <?php if ( $search_result_type == 'Masonry Alternate' ) { echo 'selected="selected"'; } ?>>Masonry Alternate</option>
																</select>
															</td>
															
															<td class="option-right">
																Select layout type.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Main Slider</h4>
																
																<?php
																	$main_slider = get_option( 'main_slider', 'No' );
																?>
																<select id="main_slider" name="main_slider" style="width: 100%;">
																	<option <?php if ( $main_slider == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $main_slider == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Blog Sidebar</h4>
																
																<?php
																	$blog_sidebar = get_option( 'blog_sidebar', 'Yes' );
																?>
																<select id="blog_sidebar" name="blog_sidebar" style="width: 100%;">
																	<option <?php if ( $blog_sidebar == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $blog_sidebar == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Post Sidebar</h4>
																
																<?php
																	$post_sidebar = get_option( 'post_sidebar', 'Yes' );
																?>
																<select id="post_sidebar" name="post_sidebar" style="width: 100%;">
																	<option <?php if ( $post_sidebar == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $post_sidebar == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Excerpt</h4>
																
																<?php
																	$theme_excerpt = get_option( 'theme_excerpt', 'No' );
																?>
																<select id="theme_excerpt" name="theme_excerpt" style="width: 100%;">
																	<option <?php if ( $theme_excerpt == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $theme_excerpt == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																	
																	<option <?php if ( $theme_excerpt == 'standard' ) { echo 'selected="selected"'; } ?> value="standard">Only for standard format</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Post Featured Image (for Single)</h4>
																
																<?php
																	$post_featured_image_style = get_option( 'post_featured_image_style', 'Full-width' );
																?>
																<select id="post_featured_image_style" name="post_featured_image_style" style="width: 100%;">
																	<option <?php if ( $post_featured_image_style == 'Full-width' ) { echo 'selected="selected"'; } ?>>Full-width</option>
																	
																	<option <?php if ( $post_featured_image_style == 'Fixed' ) { echo 'selected="selected"'; } ?>>Fixed</option>
																</select>
															</td>
															
															<td class="option-right">
																Select image style.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Numbered Pagination</h4>
																
																<?php
																	$pagination = get_option( 'pagination', 'No' );
																?>
																<select id="pagination" name="pagination" style="width: 100%;">
																	<option <?php if ( $pagination == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $pagination == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Use numbered pagination instead of Older-Newer links.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>About The Author Module</h4>
																
																<?php
																	$about_the_author_module = get_option( 'about_the_author_module', 'Yes' );
																?>
																<select id="about_the_author_module" name="about_the_author_module" style="width: 100%;">
																	<option <?php if ( $about_the_author_module == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $about_the_author_module == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
										</div>
									<?php
								break;
								
								case 'seo' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Open Graph Protocol</h4>
																
																<?php
																	$pixelwars_theme_og_protocol = stripcslashes( get_option( 'pixelwars_theme_og_protocol', 'No' ) );
																?>
																<select id="pixelwars_theme_og_protocol" name="pixelwars_theme_og_protocol" style="width: 100%;">
																	<option <?php if ( $pixelwars_theme_og_protocol == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $pixelwars_theme_og_protocol == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable built-in open graph functionality.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Theme SEO Fields</h4>
																
																<?php
																	$pixelwars_theme_seo_fields = stripcslashes( get_option( 'pixelwars_theme_seo_fields', 'No' ) );
																?>
																<select id="pixelwars_theme_seo_fields" name="pixelwars_theme_seo_fields" style="width: 100%;">
																	<option <?php if ( $pixelwars_theme_seo_fields == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $pixelwars_theme_seo_fields == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable built-in seo fields.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Description</h4>
																
																<?php
																	$site_description = stripcslashes( get_option( 'site_description', "" ) );
																?>
																<textarea id="site_description" name="site_description" style="outline: none; width: 100%;" rows="3" cols="50"><?php echo $site_description; ?></textarea>
															</td>
															
															<td class="option-right">
																For loop pages. (Blog, Archives etc.)
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Keywords</h4>
																
																<?php
																	$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
																?>
																<textarea id="site_keywords" name="site_keywords" style="outline: none; width: 100%;" rows="3" cols="50"><?php echo $site_keywords; ?></textarea>
															</td>
															
															<td class="option-right">
																Separate keywords with commas.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Tracking Code (/head)</h4>
																
																<?php
																	$tracking_code_head = stripcslashes( get_option( 'tracking_code_head' ) );
																?>
																<textarea id="tracking_code_head" name="tracking_code_head" class="code2" rows="8" cols="50"><?php echo $tracking_code_head; ?></textarea>
															</td>
															
															<td class="option-right">
																Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Tracking Code (/body)</h4>
																
																<?php
																	$tracking_code_body = stripcslashes( get_option( 'tracking_code_body' ) );
																?>
																<textarea id="tracking_code_body" name="tracking_code_body" class="code2" rows="8" cols="50"><?php echo $tracking_code_body; ?></textarea>
															</td>
															
															<td class="option-right">
																Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
							}
							// end tab content
						}
						// end settings page
					?>
				</div>
				<!-- end #poststuff -->
			</div>
			<!-- end .wrap2 -->
		<?php
	}
	// end theme_options_page


/* ============================================================================================================================================ */


	function theme_save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'general';
			}
			
			
			switch ( $tab )
			{
				case 'general' :
				
					update_option( 'logo_type', $_POST['logo_type'] );
					
					update_option( 'logo_image', $_POST['logo_image'] );
					
					update_option( 'select_text_logo', $_POST['select_text_logo'] );
					update_option( 'theme_site_title', $_POST['theme_site_title'] );
					
					update_option( 'select_tagline', $_POST['select_tagline'] );
					update_option( 'theme_tagline', $_POST['theme_tagline'] );
					
					update_option( 'logo_login', $_POST['logo_login'] );
					update_option( 'logo_login_hide', $_POST['logo_login_hide'] );
					
					update_option( 'favicon', $_POST['favicon'] );
					update_option( 'apple_touch_icon', $_POST['apple_touch_icon'] );
					
					update_option( 'copyright_text', $_POST['copyright_text'] );
				
				break;
				
				
				case 'style' :
				
					update_option( 'char_set_latin', $_POST['char_set_latin'] );
					update_option( 'char_set_latin_ext', $_POST['char_set_latin_ext'] );
					update_option( 'char_set_cyrillic', $_POST['char_set_cyrillic'] );
					update_option( 'char_set_cyrillic_ext', $_POST['char_set_cyrillic_ext'] );
					update_option( 'char_set_greek', $_POST['char_set_greek'] );
					update_option( 'char_set_greek_ext', $_POST['char_set_greek_ext'] );
					update_option( 'char_set_vietnamese', $_POST['char_set_vietnamese'] );
					
					update_option( 'extra_font_styles', $_POST['extra_font_styles'] );
					update_option( 'fixed_header', $_POST['fixed_header'] );
					update_option( 'mobile_zoom', $_POST['mobile_zoom'] );
					update_option( 'footer_widget_locations', $_POST['footer_widget_locations'] );
					update_option( 'page_comments', $_POST['page_comments'] );
					update_option( 'blog_masonry_item_width', $_POST['blog_masonry_item_width'] );
					update_option( 'blog_masonry_alternate_item_width', $_POST['blog_masonry_alternate_item_width'] );
					
					update_option( 'custom_css', $_POST['custom_css'] );
					update_option( 'external_css', $_POST['external_css'] );
					update_option( 'external_js', $_POST['external_js'] );
				
				break;
				
				
				case 'portfolio' :
				
					update_option( 'portfolio_columns', $_POST['portfolio_columns'] );
					update_option( 'portfolio_layout', $_POST['portfolio_layout'] );
				
				break;
				
				
				case 'gallery' :
				
					update_option( 'gallery_columns', $_POST['gallery_columns'] );
					update_option( 'gallery_layout', $_POST['gallery_layout'] );
				
				break;
				
				
				case 'sidebar' :
				
					update_option( 'no_sidebar_name', esc_attr( $_POST['new_sidebar_name'] ) );
					
					if ( esc_attr( $_POST['new_sidebar_name'] ) != "" )
					{
						$sidebars_with_commas = get_option( 'sidebars_with_commas', "" );
						
						if ( $sidebars_with_commas == "" )
						{
							update_option( 'sidebars_with_commas', esc_attr( $_POST['new_sidebar_name'] ) );
						}
						else
						{
							update_option( 'sidebars_with_commas', get_option( 'sidebars_with_commas' ) . ',' . esc_attr( $_POST['new_sidebar_name'] ) );
						}
					}
				
				break;
				
				
				case 'blog' :
				
					update_option( 'blog_type', $_POST['blog_type'] );
					update_option( 'category_archive_type', $_POST['category_archive_type'] );
					update_option( 'tag_archive_type', $_POST['tag_archive_type'] );
					update_option( 'author_archive_type', $_POST['author_archive_type'] );
					update_option( 'date_archive_type', $_POST['date_archive_type'] );
					update_option( 'search_result_type', $_POST['search_result_type'] );
					update_option( 'main_slider', $_POST['main_slider'] );
					update_option( 'blog_sidebar', $_POST['blog_sidebar'] );
					update_option( 'post_sidebar', $_POST['post_sidebar'] );
					update_option( 'theme_excerpt', $_POST['theme_excerpt'] );
					update_option( 'post_featured_image_style', $_POST['post_featured_image_style'] );
					update_option( 'pagination', $_POST['pagination'] );
					update_option( 'about_the_author_module', $_POST['about_the_author_module'] );
				
				break;
				
				
				case 'seo' :
				
					update_option( 'pixelwars_theme_og_protocol', $_POST['pixelwars_theme_og_protocol'] );
					update_option( 'pixelwars_theme_seo_fields', $_POST['pixelwars_theme_seo_fields'] );
					update_option( 'site_description', $_POST['site_description'] );
					update_option( 'site_keywords', $_POST['site_keywords'] );
					update_option( 'tracking_code_head', $_POST['tracking_code_head'] );
					update_option( 'tracking_code_body', $_POST['tracking_code_body'] );
				
				break;
			}
		}
	}


/* ============================================================================================================================================ */


	function load_settings_page()
	{
		if ( isset( $_POST["settings-submit"] ) == 'Y' )
		{
			check_admin_referer( "settings-page" );
			
			theme_save_settings();
			
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			
			wp_redirect( admin_url( 'themes.php?page=theme-options&' . $url_parameters ) );
			
			exit;
		}
	}


/* ============================================================================================================================================ */


	function my_theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'theme-options',
										'theme_options_page' );
		
		add_action( "load-{$settings_page}", 'load_settings_page' );
	}
	
	add_action( 'admin_menu', 'my_theme_menu' );


/* ============================================================================================================================================ */


?>