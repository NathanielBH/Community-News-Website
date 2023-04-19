<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://cnsnavplugin.com
 * @since      1.0.0
 *
 * @package    Customize_Nav
 * @subpackage Customize_Nav/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Customize_Nav
 * @subpackage Customize_Nav/includes
 * @author     Nathaniel Borrok-Hoffman <nathaniel@borrok.com>
 */
class Customize_Nav_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'customize-nav',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
