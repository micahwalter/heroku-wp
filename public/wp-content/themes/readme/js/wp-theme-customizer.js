(function($)
{


// ====================================================================================================================
// ====================================================================================================================


	wp.customize( 'blogname', function( value )
	{
		value.bind( function( to )
		{
			$( 'header.header h1' ).html( to );
		});
	});


	wp.customize( 'blogdescription', function( value )
	{
		value.bind( function( to )
		{
			$( 'header.header p' ).html( to );
		});
	});


// ====================================================================================================================
// ====================================================================================================================


	wp.customize( 'setting_link_color', function( value )
	{
		value.bind( function( to )
		{
			// $( 'a' ).css( 'color', to );
			
			
			var styleCss = '<style type="text/css">' + 
								
								'.entry-content > p > a:not(.button) { color: ' + to + ' }' +
								
							'</style>';
			
			$( 'body' ).append( styleCss );
		});
	});


// ====================================================================================================================
// ====================================================================================================================


 	wp.customize( 'setting_content_font', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + '">' );
			
			
			// $( 'body, input, textarea, select, button' ).css( 'font-family', '"' + to + '"' );
			
			
			var styleCss = '<style type="text/css">' + 
								
								'body, input, textarea, select, button { font-family: "' + to + '", Georgia, serif; }' +
								
							'</style>';
			
			$( 'body' ).append( styleCss );
		});
	});


// ====================================================================================================================
// ====================================================================================================================


})(jQuery);