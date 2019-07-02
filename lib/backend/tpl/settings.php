<?php
	if ( current_user_can( 'activate_plugins' ) ) {
    ?>
    <div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>

    <?php
		$setting_pos        = 1;
		$required_modules   = array();

		// Outputs setting for all modules and required Modules
        foreach ( $module->s as $module_name => $module_path ) {
            if ( $module_name === 'all_modules' ) {
                echo '<h3 class="divider">' . __( 'Deactivate all modules', 'sv100' ) . '</h3>';
                echo '<div class="sv_setting_flex">';
	            echo $module->get_settings()[ $module_name ]->run_type()->form();
	            echo '</div>';
	            echo '<h3 class="divider">' . __( 'Modules', 'sv100' ) . '</h3>';
	            echo '<div>';
            }

            if ( $module->get_settings()[ $module_name ]->get_disabled() !== 'disabled' ) {
	            switch ( $setting_pos ) {
		            case 1:
			            echo '<div class="sv_setting_flex">';
			            echo $module->get_settings()[ $module_name ]->run_type()->form();

			            $setting_pos++;
			            break;
		            case 2:
			            echo $module->get_settings()[ $module_name ]->run_type()->form();

			            $setting_pos++;
			            break;
		            case 3:
			            echo $module->get_settings()[ $module_name ]->run_type()->form();
			            echo '</div>';

			            $setting_pos = 1;
			            break;
	            }
            } else {
                $required_modules[ $module_name ] = $module->get_settings()[ $module_name ]->run_type()->form();
            }
        }

        if ( $setting_pos < 3 ) {
            echo '</div>';
        }

		$setting_pos        = 1;

        echo '</div>';
		echo '<h3 class="divider">' . __( 'Required modules', 'sv100' ) . '</h3>';
		echo '<div>';

        // Outputs non-required modules
        foreach ( $required_modules as $module_form ) {
	        switch ( $setting_pos ) {
		        case 1:
			        echo '<div class="sv_setting_flex">';
			        echo $module_form;

			        $setting_pos++;
			        break;
		        case 2:
			        echo $module_form;

			        $setting_pos++;
			        break;
		        case 3:
			        echo $module_form;
			        echo '</div>';

			        $setting_pos = 1;
			        break;
	        }
        }

		if ( $setting_pos < 3 ) {
			echo '</div>';
		}

		echo '</div>';
	}