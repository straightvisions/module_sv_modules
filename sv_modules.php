<?php
	namespace sv100;

	class sv_modules extends init {
		public function init() {
			$this->set_module_title( __( 'SV Modules', 'sv100' ) )
				 ->set_module_desc( __( 'Manages all installed theme modules.', 'sv100' ) )
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_type( 'settings' )
				->set_section_template_path()
				->set_section_order(500);

			if($this->get_is_expert_mode()) {
				$this->get_root()->add_section( $this );
			}
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
	}