<?php
	namespace sv100;

	class sv_modules extends init {
		public function init() {
			$this->set_module_title( __( 'SV Modules', 'sv100' ) )
				 ->set_module_desc( __( 'Manages all installed theme modules.', 'sv100' ) )
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(500)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9.916 8.195h-.013v.961c-.034 1.598 4.213 1.601 4.161 0v-.96c-.123-1.511-4.042-1.52-4.148-.001zm2.08.71c-.723 0-1.311-.253-1.311-.564 0-.312.588-.564 1.311-.564.724 0 1.311.253 1.311.564 0 .311-.587.564-1.311.564zm6.421-2.155v-.96c-.124-1.511-4.042-1.52-4.148-.001h-.013v.961c-.034 1.599 4.214 1.602 4.161 0zm-2.067-1.379c.723 0 1.311.253 1.311.564s-.589.565-1.311.565c-.724 0-1.311-.253-1.311-.564s.587-.565 1.311-.565zm-10.797.418h-.013v.961c-.034 1.598 4.213 1.601 4.161 0v-.96c-.123-1.511-4.042-1.519-4.148-.001zm2.08.711c-.723 0-1.311-.253-1.311-.564s.588-.565 1.311-.565c.724 0 1.311.253 1.311.564s-.588.565-1.311.565zm2.283-2.988l-.013.201v.759c-.034 1.598 4.214 1.602 4.161 0v-.959c-.124-1.512-4.042-1.52-4.148-.001zm3.392.145c0 .311-.588.564-1.311.564-.724 0-1.311-.253-1.311-.564s.587-.564 1.311-.564c.723 0 1.311.253 1.311.564zm-1.308-3.657l-11 6 .009.019-.009-.005v12.118l11 5.868 11-5.869v-12.055l-11-6.076zm-1 21l-8-4.268v-7.133l8 4.401v7zm-8.885-14.464l9.882-5.396 9.917 5.458-9.896 5.385-9.903-5.447zm10.885 7.464l8-4.353v7.085l-8 4.268v-7z"/></svg>');

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