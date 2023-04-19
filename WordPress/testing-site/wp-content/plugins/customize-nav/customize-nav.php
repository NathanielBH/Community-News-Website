<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://vtcommunitynews.org
 * @since             1.0.0
 * @package           Customize_Nav
 *
 * @wordpress-plugin
 * Plugin Name:       CNS Nav Plugin
 * Plugin URI:        https://vtcommunitynews.org
 * Description:       This is a plugin for the header nav menu on the CNS website
 * Version:           1.0.0
 * Author:            Nathaniel Borrok-Hoffman
 * Author URI:        https://vtcommunitynews.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       customize-nav
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOMIZE_NAV_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-customize-nav-activator.php
 */
function activate_customize_nav() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customize-nav-activator.php';
	Customize_Nav_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-customize-nav-deactivator.php
 */
function deactivate_customize_nav() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customize-nav-deactivator.php';
	Customize_Nav_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_customize_nav' );
register_deactivation_hook( __FILE__, 'deactivate_customize_nav' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-customize-nav.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_customize_nav() {

	$plugin = new Customize_Nav();
	$plugin->run();

}
run_customize_nav();
