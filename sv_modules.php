<?php
namespace sv_100;

/**
 * @version         1.0
 * @author			straightvisions GmbH
 * @package			sv_100
 * @copyright		2017 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_modules extends init {
	public function __construct() {

	}

	public function init() {
		// Module Info
		$this->set_module_title( 'SV Modules' );
		$this->set_module_desc( __( 'This module manages all installed theme modules.', $this->get_module_name() ) );

		// Section Info
		$this->set_section_title( 'Modules' );
		$this->set_section_desc( __( 'Available Modules in SV 100 Theme.', $this->get_module_name() ) );
		$this->set_section_type( 'settings' );
		$this->get_root()->add_section( $this );

		// Loads Scripts
		static::$scripts->create( $this )
		                ->set_source( $this->get_file_url( 'lib/js/backend.js' ), $this->get_file_path( 'lib/js/backend.js' ) )
		                ->set_is_backend()
		                ->set_type( 'js' );

		// Loads Settings
		$this->load_settings();
	}

	public function load_settings() {
		if ( count( $this->s ) === 0 ) {
			$this->s['all_modules'] =
				static::$settings->create( $this )
				                 ->set_ID( 'all_modules' )
				                 ->set_title( __( 'All Modules', $this->get_module_name() ) )
				                 ->set_description( __( 'Enable or disable all modules.', $this->get_module_name() ) )
				                 ->set_default_value( 1 )
				                 ->load_type( 'checkbox' );

			foreach ( $this->get_modules_registered() as $module_name => $module_path ) {
				$s = static::$settings->create( $this )
				                      ->set_ID( $module_name )
				                      ->set_default_value( 1 )
				                      ->load_type( 'checkbox' );

				$this->s[ $module_name ] = $s;
			}
		}
	}
}