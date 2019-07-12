jQuery( document ).on( 'click', 'input[name="sv100_sv_modules_settings_all_modules"]', function() {
	if ( jQuery( this ).hasClass( 'sv_input_on' ) ) {
		jQuery( 'form#sv100_sv_modules input.sv_input_off:not(:disabled)' ).prop( 'checked', false );
		jQuery( 'form#sv100_sv_modules input.sv_input_on:not(:disabled)' ).prop( 'checked', true );
	}

	if ( jQuery( this ).hasClass( 'sv_input_off' ) ) {
		jQuery( 'form#sv100_sv_modules input.sv_input_on:not(:disabled)' ).prop( 'checked', false );
		jQuery( 'form#sv100_sv_modules input.sv_input_off:not(:disabled)' ).prop( 'checked', true );
	}
} );