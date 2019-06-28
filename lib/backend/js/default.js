jQuery( document ).on( 'click', '#sv100_sv_modules_settings_all_modules', function() {
	jQuery( '#section_sv100_sv_modules .sv_setting input:not(:disabled)' ).prop( 'checked', jQuery( this ).prop( 'checked' ) );
} );