( function( api ) {

	// Extends our custom "interior-decor-consultation" section.
	api.sectionConstructor['interior-decor-consultation'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );