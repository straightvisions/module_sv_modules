jQuery( document ).on( 'click', '#sv_100_sv_modules_settings_all_modules', function() {
	jQuery( '.sv_form_field:not(:disabled)' ).prop( 'checked', jQuery( this ).prop( 'checked' ) );
} );