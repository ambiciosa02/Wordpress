/**
 * Customizer notification system
 */

(function (api) {

	api.sectionConstructor['shopcozi-customizer-notify-section'] = api.Section.extend(
		{

			// No events for this type of section.
			attachEvents: function () {
			},

			// Always make the section active.
			isContextuallyActive: function () {
				return true;
			}
		}
	);

})( wp.customize );

jQuery( document ).ready( function () {

		jQuery( '.shopcozi-customizer-notify-dismiss-recommended-action' ).click(
			function () {

				var id = jQuery( this ).attr( 'id' ),
				action = jQuery( this ).attr( 'data-action' );
				jQuery.ajax(
					{
						type: 'GET',
						data: {
							action: 'shopcozi_customizer_notify_dismiss_action', 
							id: id, 
							todo: action
						},
						dataType: 'html',
						url: shopcoziCustomizercompanionObject.ajaxurl,
						beforeSend: function () {
							jQuery( '#' + id ).parent().append( '<div id="temp_load" style="text-align:center"><img src="' + shopcoziCustomizercompanionObject.base_path + '/images/spinner-2x.gif" /></div>' );
						},
						success: function (data) {
							var container          = jQuery( '#' + data ).parent().parent();
							var index              = container.next().data( 'index' );
							var recommended_section = jQuery( '#accordion-section-shopcozi_customizer_notify_recomended_actions' );
							var actions_count      = recommended_section.find( '.shopcozi-customizer-plugin-notify-actions-count' );
							var section_title      = recommended_section.find( '.section-title' );
							jQuery( '.shopcozi-customizer-plugin-notify-actions-count .current-index' ).text( index );
							container.slideToggle().remove();
							if (jQuery( '.shopcozi-theme-recomended-actions_container > .epsilon-recommended-actions' ).length === 0) {

								actions_count.remove();

								if (jQuery( '.shopcozi-theme-recomended-actions_container > .epsilon-recommended-plugins' ).length === 0) {
									jQuery( '.control-section-ti-customizer-notify-recomended-actions' ).remove();
								} else {
									section_title.text( section_title.data( 'plugin_text' ) );
								}

							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
						}
					}
				);
			}
		);

		jQuery( '.shopcozi-customizer-notify-dismiss-button-recommended-plugin' ).click(
			function () {
				var id = jQuery( this ).attr( 'id' ),
				action = jQuery( this ).attr( 'data-action' );
				jQuery.ajax(
					{
						type: 'GET',
						data: { 
							action: 'shopcozi_customizer_notify_dismiss_recommended_plugins', 
							id: id, 
							todo: action
						},
						dataType: 'html',
						url: shopcoziCustomizercompanionObject.ajaxurl,
						beforeSend: function () {
							jQuery( '#' + id ).parent().append( '<div id="temp_load" style="text-align:center"><img src="' + shopcoziCustomizercompanionObject.base_path + '/images/spinner-2x.gif" /></div>' );
						},
						success: function (data) {
							console.log(data);
							var container = jQuery( '#' + data ).parent().parent();
							var index     = container.next().data( 'index' );
							jQuery( '.shopcozi-customizer-plugin-notify-actions-count .current-index' ).text( index );
							container.slideToggle().remove();

							if (jQuery( '.shopcozi-theme-recomended-actions_container > .epsilon-recommended-plugins' ).length === 0) {
								jQuery( '.control-section-shopcozi-customizer-notify-section' ).remove();
							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
						}
					}
				);
			}
		);

		// Remove activate button and replace with activation in progress button.
		jQuery( document ).on(
			'DOMNodeInserted','.activate-now', function () {
				var activateButton = jQuery( '.activate-now' );
				if (activateButton.length) {
					var url = jQuery( activateButton ).attr( 'href' );
					if (typeof url !== 'undefined') {
						// Request plugin activation.
						jQuery.ajax(
							{
								beforeSend: function () {
									jQuery( activateButton ).replaceWith( '<a class="button updating-message">' + shopcoziCustomizercompanionObject.activating_string + '...</a>' );
								},
								async: true,
								type: 'GET',
								url: url,
								success: function () {
									// Reload the page.
									location.reload();
								}
							}
						);
					}
				}
			}
		);

		jQuery( 'body' ).on('click',' .shopcozi-install-plugin ', function () {
				var slug = jQuery( this ).attr( 'data-slug' );
				wp.updates.installPlugin({
						slug: slug
					}
				);
				return false;
			}
		);

		jQuery( '.activate-now' ).on('click', function (e) {			
				var activateButton = jQuery( this );
				e.preventDefault();
				if (jQuery( activateButton ).length) {
					var url = jQuery( activateButton ).attr( 'href' );

					if (typeof url !== 'undefined') {
						// Request plugin activation.
						jQuery.ajax({
								beforeSend: function () {
									jQuery( activateButton ).replaceWith( '<a class="button updating-message">' + shopcoziCustomizercompanionObject.activating_string + '...</a>' );
								},
								async: true,
								type: 'GET',
								url: url,
								success: function () {
									// Reload the page.
									location.reload();
								}
							}
						);
					}
				}
			}
		);
	}
);