( function( api ) {

	// Extends our custom "supermarket-shopping" section.
	api.sectionConstructor['supermarket-shopping'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );