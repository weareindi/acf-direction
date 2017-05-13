<?php

/*
Plugin Name: Advanced Custom Fields: Direction
Plugin URI: https://github.com/ozpital/acf-direction
Description: A visual direction select
Version: 1.0.0
Author: Laurence Archer (@ozpital)
Author URI: https://twitter.com/ozpital
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    exit;
};

if (!class_exists('acf_plugin_direction')) {

    class acf_plugin_direction {
    	function __construct() {
    		$this->settings = array(
    			'version'	=> '1.0.0',
    			'url'		=> plugin_dir_url( __FILE__ ),
    			'path'		=> plugin_dir_path( __FILE__ )
    		);

    		add_action('acf/include_field_types', 	array($this, 'include_field_types'));
    	}

    	function include_field_types( $version = false ) {
    		if (!$version) {
                $version = 5;
            }

    		include_once('fields/acf-direction-v' . $version . '.php');
    	}
    }

    // initialize
    new acf_plugin_direction();
}
