<?php
/*
Plugin Name: sh-plugin
Description: [showhoy width="100%" height="2400"] เพิ่ม shortcode นี้ เพื่อเพิ่มตารางแสดงเลขถูกรางวัล และ [showhoy2 width="100%" height="650"] เพิ่ม shortcode นี้ การตรวจสอบผลรางวัล
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
 * Description:       [showhoy width="100%" height="2400"] เพิ่ม shortcode นี้ เพื่อเพิ่มตารางแสดงเลขถูกรางวัล และ [showhoy2 width="100%" height="650"] เพิ่ม shortcode นี้ การตรวจสอบผลรางวัล
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

function sshowhoy($atts, $content = null ) {
  
    //echo '<div id="my-plugin-value-container"></div>';
    $a = shortcode_atts( array(
        'width' => '100%',
        'height' => '650',
        'colorText' => 'red',
        'colorBgText' => 'green',
    ), $atts );
        
    return '<iframe src="/wp-content/plugins/sh-plugin/show.php" width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
    
}

function sshowhoy2($atts, $content = null ) {
  
  $a = shortcode_atts( array(
      'width' => '100%',
      'height' => '100%',
  ), $atts );
  return '<iframe src="/wp-content/plugins/sh-plugin/checker.php" width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
}

add_shortcode('showhoy', 'sshowhoy');
add_shortcode('showhoy2', 'sshowhoy2');

/* ----------------------------------------------------------------------------- */

function part_show($atts) {
    // กำหนดค่าเริ่มต้นของพารามิเตอร์
    $atts = shortcode_atts(
        array(
            'shplugin_width' => '100%',
            'shplugin_height' => '2400px',

            'myBox_background' => 'black',
            'head_date_color' => 'blue',

            'btnsh_background' => 'orange',
            'btnsh_color' => 'white',

            'myDivH_background' => 'white',
            'md_text_color' => 'black',
            'sm_text_color' => 'black',

            'myDiv_background' => 'white',
            'myDiv_color' => 'black',

            'sm_text_color' => 'black',            
        ),
        $atts,
        'shplugin'
    );

    // สร้าง inline CSS จากพารามิเตอร์
    $shplugin_inline_css = "
        width: {$atts['shplugin_width']}; 
        height: {$atts['shplugin_height']};
    ";

    ob_start(); // เริ่มต้นการเก็บเนื้อหาขึ้นมา
    ?>
    <div class="custom-shplugin" style="<?php echo esc_attr($shplugin_inline_css); ?>">
        <?php
            // นำเข้าโค้ดจากไฟล์ show.php
            include plugin_dir_path(__FILE__) . 'show.php';
        ?>
    </div>
    <?php
    $output = ob_get_clean(); // ดึงเนื้อหาที่เก็บไว้

    return $output;
}

add_shortcode('show_houy', 'part_show');

?>

