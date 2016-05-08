( function( $ ) {
	
	$( document ).ready( function() {
		
		var primaryMenuToggle = $( '#primary-menu-toggle' ),
		    primaryMenu       = $( '#primary-menu' );
		
		primaryMenuToggle.click( function( e ) {
			if( primaryMenu.is( ':visible' ) ) {
				primaryMenu.slideUp();
			}
			else {
				primaryMenu.slideDown();
			}
			
			e.preventDefault();
		} );
		
	} );
	
} )( jQuery );