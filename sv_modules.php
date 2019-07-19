<?php
	namespace sv100;
	
	/**
	 * @version         4.000
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_modules extends init {
		public function init() {
			$this->set_module_title( 'SV Modules' )
				 ->set_module_desc( __( 'Manages all installed theme modules.', 'sv100' ) )
				 ->load_settings()
				 ->load_scripts()
				 ->set_section_title( __( 'Theme modules', 'sv100' ) )
			     ->set_section_desc( __( 'Available modules in the SV100 theme', 'sv100' ) )
			     ->set_section_type( 'settings' )
			     ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
		}
	
		protected function load_settings(): sv_modules {
			$this->get_setting( 'all_modules' )
				 ->set_title( __( 'All modules', 'sv100' ) )
				 ->set_description( __( 'Enable or disable all modules.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'checkbox' );

			foreach ( $this->get_modules_registered() as $module_name => $module_path ) {
				$this->get_setting( $module_name )
					 ->set_default_value( 1 )
					 ->load_type( 'checkbox' );
			}
	
			return $this;
		}
	
		protected function load_scripts(): sv_modules {
			// Register Styles
			$this->get_script( 'default_js' )
				 ->set_path( 'lib/backend/js/default.js' )
				 ->set_is_backend()
				 ->set_type( 'js' )
				 ->set_deps( array(  'jquery' ) )
				 ->set_is_enqueued();
	
			return $this;
		}
	}