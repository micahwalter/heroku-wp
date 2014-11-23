        <footer id="colophon" class="site-footer" role="contentinfo">
			<?php
				$footer_widget_locations = get_option( 'footer_widget_locations', 'No' );
				
				if ( $footer_widget_locations == 'Yes' )
				{
					?>
						<div id="footer-sidebar" class="footer-sidebar widget-area layout-full" role="complementary">
							<?php
								if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'pixelwars_footer_1' ) ) :
								endif;
							?>
							
							
							<?php
								if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'pixelwars_footer_2' ) ) :
								endif;
							?>
							
							
							<?php
								if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'pixelwars_footer_3' ) ) :
								endif;
							?>
							
							
							<?php
								if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'pixelwars_footer_4' ) ) :
								endif;
							?>
						</div>
					<?php
				}
			?>
			
			<div class="site-info">
				<p>
					<?php
						$copyright_text = stripcslashes( get_option( 'copyright_text', "" ) );
						
						echo $copyright_text;
					?>
				</p>
			</div>
		</footer>
	</div>
    
	
	<?php
		wp_footer();
	?>
</body>
</html>