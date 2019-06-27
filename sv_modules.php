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
	public function init() {
		// Module Info
		$this->set_module_title( 'SV Modules' );
		$this->set_module_desc( __( 'This module manages all installed theme modules.', 'straightvisions-100' ) );

		// Section Info
		$this->set_section_title( __( 'Modules', 'straightvisions-100' ) );
		$this->set_section_desc( __( 'Available Modules in the straightvisions 100 Theme.', 'straightvisions-100' ) );
		$this->set_section_type( 'settings' );
		$this->get_root()->add_section( $this );

		// Loads Settings
		$this->load_settings()->load_scripts();
	}

	public function load_settings() :sv_modules {
		if ( count( $this->s ) === 0 ) {
			$this->s['all_modules'] =
				static::$settings
					->create( $this )
					->set_ID( 'all_modules' )
					->set_title( __( 'All Modules', 'straightvisions-100' ) )
					->set_description( __( 'Enable or disable all modules.', 'straightvisions-100' ) )
					->set_default_value( 1 )
					->load_type( 'checkbox' );

			foreach ( $this->get_modules_registered() as $module_name => $module_path ) {
				$s = static::$settings
					->create( $this )
					->set_ID( $module_name )
					->set_default_value( 1 )
					->load_type( 'checkbox' );

				$this->s[ $module_name ] = $s;
			}
		}

		return $this;
	}

	protected function load_scripts() :sv_modules {
		// Register Styles
		$this->scripts_queue['default_js']        = static::$scripts
			->create( $this )
			->set_ID( 'default_js' )
			->set_path( 'lib/backend/js/default.js' )
			->set_is_backend()
			->set_type( 'js' )
			->set_deps( array(  'jquery' ) )
			->set_is_enqueued();

		return $this;
	}
}