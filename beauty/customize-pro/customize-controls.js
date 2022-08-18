( function( api ) {
	// Extends our custom "massage-spa" section.
	api.sectionConstructor['massage-spa'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );