<?php

if (!defined('ABSPATH')) {
    exit;
};

if (!class_exists('acf_field_direction')) {
    
    class acf_field_direction extends acf_field {
    	function __construct( $settings ) {
    		$this->name = 'direction';
    		$this->label = __('Direction', 'acf-direction');
    		$this->category = 'choice';
    		$this->defaults = array(
    			'value'	=> 'center'
    		);
    		$this->settings = $settings;

        	parent::__construct();
    	}

        /**
         * Render admin view
         */
    	function render_field( $field ) {
            // Options
            $options = [
                'up-left'       => 'Up Left',
                'up-center'     => 'Up Center',
                'up-right'      => 'Up Right',
                'left'          => 'Left',
                'center'        => 'Center',
                'right'         => 'Right',
                'down-left'     => 'Down Left',
                'down-center'   => 'Down Center',
                'down-right'    => 'Down Right'
            ];

            // View
            echo '<div class="acf-direction">';

                foreach ($options as $value => $label) {

                    $checked = '';
                    if ($value === $field['value']) {
                        $checked = 'checked="checked"';
                    }

                    echo '<input type="radio" name="'.esc_attr($field['name']).'" value="'.$value.'" id="acf-direction--'.$value.'" class="acf-direction__switch" '.$checked.' />';
                }

                echo '<div class="acf-direction__buttons">';
                foreach ($options as $value => $label) {
                    echo '<label for="acf-direction--'.$value.'" class="acf-direction__button acf-direction__button--'.$value.'">';
                    echo '<span class="acf-direction__icon"></span>';
                    echo '<span class="acf-direction__label">'.$label.'</span>';
                    echo '</label>';
                }
                echo '</div>';

            echo '</div>';
    	}

        /**
         * Enqueue scripts
         */
    	function input_admin_enqueue_scripts() {
    		$url = $this->settings['url'];
    		$version = $this->settings['version'];

    		// register & include CSS
    		wp_register_style( 'acf-input-direction', "{$url}assets/css/style.css", array('acf-input'), $version );
    		wp_enqueue_style('acf-input-direction');
    	}
    }

    // initialize
    new acf_field_direction( $this->settings );
}
