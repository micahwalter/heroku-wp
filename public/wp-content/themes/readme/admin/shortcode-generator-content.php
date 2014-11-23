<form class="shortcodes-wrap">
	<br>
	<label for="shortcodes_list">Shortcodes:</label>
	<br>
	
	
	<select id="shortcodes_list" name="shortcodes_list" class="widefat shortcodes-list" style="width: 50%;">
	
		<option></option>
		
		
		<option value="[row]column shortcode here.[/row]">row</option>
		
		<option value="[column width=&quot;&quot;]Content here.[/column]">column</option>
		
		<option value="[section_title text=&quot;&quot;]">section_title</option>
		
		<option value="[button text=&quot;&quot; url=&quot;&quot;]">button</option>
		
		<option value="[launch_button]button shortcode here.[/launch_button]">launch_button</option>
		
		<option value="[call_to_action title=&quot;&quot; text=&quot;&quot;]button shortcode here.[/call_to_action]">call_to_action</option>
		
		<option value="[project_action]button shortcode here.[/project_action]">project_action</option>
		
		<option value="[social_icon_wrap]social_icon shortcode here.[/social_icon_wrap]">social_icon_wrap</option>
		
		<option value="[social_icon type=&quot;&quot; url=&quot;&quot;]">social_icon</option>
		
		<option value="[portflio_field]Content here.[/portflio_field]">portflio_field</option>
		
		<option value="[lightbox_wrap thumbnail=&quot;&quot;]lightbox_image shortcode here.[/lightbox_wrap]">lightbox_wrap</option>
		
		<option value="[lightbox_image first_item=&quot;&quot; url=&quot;&quot;]">lightbox_image</option>
		
		<option value="[lightbox_audio title=&quot;&quot; url=&quot;&quot;]">lightbox_audio</option>
		
		<option value="[lightbox_video title=&quot;&quot; url=&quot;&quot;]">lightbox_video</option>
		
		<option value="[portfolio_lightbox_image first_item=&quot;&quot; title=&quot;&quot; url=&quot;&quot;]">portfolio_lightbox_image</option>
		
		<option value="[portfolio_lightbox_audio first_item=&quot;&quot; title=&quot;&quot; url=&quot;&quot;]">portfolio_lightbox_audio</option>
		
		<option value="[portfolio_lightbox_video first_item=&quot;&quot; title=&quot;&quot; url=&quot;&quot;]">portfolio_lightbox_video</option>
		
		<option value="[intro image=&quot;&quot;]Text here.[/intro]">intro</option>
		
		<option value="[tagline]Text here.[/tagline]">tagline</option>
		
		<option value="[drop_cap]Text here.[/drop_cap]">drop_cap</option>
		
		<option value="[quote align=&quot;&quot; name=&quot;&quot;]Text here.[/quote]">quote</option>
		
		<option value="[full_width_image]Image here.[/full_width_image]">full_width_image</option>
		
		<option value="[rotate_words titles=&quot;&quot;]">rotate_words</option>
		
		<option value="[alert title=&quot;&quot;]Text here.[/alert]">alert</option>
		
		<option value="[contact_form to=&quot;&quot; subject=&quot;&quot;]">contact_form</option>
		
		<option value="[latest_from_the_blog]">latest_from_the_blog</option>
		
		<option value="[slider]slide shortcode here.[/slider]">slider</option>
		
		<option value="[slide image=&quot;&quot;]">slide</option>
		
		<option value="[tab_wrap titles=&quot;&quot; active=&quot;&quot;]tab shortcode here.[/tab_wrap]">tab_wrap</option>
		
		<option value="[tab]Text here.[/tab]">tab</option>
		
		<option value="[accordion_wrap]accordion shortcode here.[/accordion_wrap]">accordion_wrap</option>
		
		<option value="[accordion title=&quot;&quot;]Text here.[/accordion]">accordion</option>
		
		<option value="[toggle_wrap]toggle shortcode here.[/toggle_wrap]">toggle_wrap</option>
		
		<option value="[toggle title=&quot;&quot;]Text here.[/toggle]">toggle</option>
		
		<option value="[service icon=&quot;&quot; title=&quot;&quot; text=&quot;&quot;]">service</option>
		
		<option value="[fun_fact icon=&quot;&quot; text=&quot;&quot;]">fun_fact</option>
		
		<option value="[skill_wrap]skill shortcode here.[/skill_wrap]">skill_wrap</option>
		
		<option value="[skill title=&quot;&quot; percent=&quot;&quot;]">skill</option>
		
		<option value="[testimonial_wrap]testimonial shortcode here.[/testimonial_wrap]">testimonial_wrap</option>
		
		<option value="[testimonial image=&quot;&quot; title=&quot;&quot; sub_title=&quot;&quot;]Text here.[/testimonial]">testimonial</option>
		
		<option value="[tag_wrap]tag shortcode here.[/tag_wrap]">tag_wrap</option>
		
		<option value="[tag text=&quot;&quot;]">tag</option>
		
		<option value="[link_wrap]Link here.[/link_wrap]">link_wrap</option>
		
		<option value="[aside_wrap]Text here.[/aside_wrap]">aside_wrap</option>
		
		<option value="[timeline]event shortcode here.[/timeline]">timeline</option>
		
		<option value="[event_group_title icon=&quot;&quot; text=&quot;&quot;]">event_group_title</option>
		
		<option value="[event date=&quot;&quot; title=&quot;&quot; sub_title=&quot;&quot;]Text here.[/event]">event</option>
		
		<option value="[media_wrap]iframe code here.[/media_wrap]">media_wrap</option>
		
		<option value="[media_wrap][theme_audio url=&quot;&quot; poster=&quot;&quot;][/media_wrap]">theme_audio</option>
		
		<option value="[media_wrap][theme_video url=&quot;&quot; poster=&quot;&quot;][/media_wrap]">theme_video</option>
	
	</select>
	
	
	<br>
	<br>
	
	<button type="button" class="button button-primary button-large button-insert-shortcode">Insert Shortcode</button>
</form>


<script>
	jQuery(document).ready(function($)
	{
		var selected_shortcode = "";
		
		
		$( '.shortcodes-list' ).change( function()
		{
			selected_shortcode = $( '.shortcodes-list' ).val();
		});
		
		
		$( '.button-insert-shortcode' ).click( function()
		{
			// add shortcode to content editor
			if ( window.tinyMCE )
			{
				var tmce_ver = window.tinyMCE.majorVersion;
				
				if ( tmce_ver < "4" )
				{
					window.tinyMCE.execInstanceCommand( 'content', 'mceInsertContent', false, selected_shortcode );
				}
				else
				{
					parent.tinyMCE.execCommand( 'mceInsertContent', false, selected_shortcode );
				}
				
				
				tb_remove();
			}
			// end add shortcode to content editor
		});
	});
</script>