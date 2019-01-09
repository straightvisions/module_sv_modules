<?php
namespace sv_100;

/**
 * @author			Matthias Reuter
 * @package			sv_100
 * @copyright		2017 Matthias Reuter
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

		// Loads Settings
		$this->load_settings();

		// Action Hooks
		add_action( 'admin_init', array( $this, 'admin_init' ) );

		if ( ! is_admin() ) {
			add_action( 'init', array( $this, 'load_settings' ) );
		}
	}

	public function admin_init() {
		$this->get_root()->add_section( $this );
	}

	public function load_settings() {
		if ( count( $this->s ) === 0 ) {
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