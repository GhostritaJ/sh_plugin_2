<?php
/*
Plugin Name: sh-plugin
Description: [showhouy1 height="800"] เพิ่ม shortcode นี้ เพื่อเพิ่มตารางแสดงเลขถูกรางวัล และ [showhouy2 height="800"] เพิ่ม shortcode พร้อมระบุความสูงตามตัวอย่าง
Author: GJ
Version: 1.0.0
*/

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://-
 * @since             1.0.0
 * @package           Sh_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Sh Plugin
 * Plugin URI:        https://-
 * Description:       [showhouy1 height="800"] เพิ่ม shortcode นี้ เพื่อเพิ่มตารางแสดงเลขถูกรางวัล และ [showhouy2 height="800"] เพิ่ม shortcode พร้อมระบุความสูงตามตัวอย่าง
 * Version:           1.0.0
 * Author:            gj
 * Author URI:        https://-/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sh-plugin
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
define( 'SH_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sh-plugin-activator.php
 */
function activate_sh_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sh-plugin-activator.php';
	Sh_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sh-plugin-deactivator.php
 */
function deactivate_sh_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sh-plugin-deactivator.php';
	Sh_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sh_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_sh_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sh-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sh_plugin() {

	$plugin = new Sh_Plugin();
	$plugin->run();

}
run_sh_plugin();

?>

