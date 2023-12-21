<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://-
 * @since      1.0.0
 *
 * @package    Sh_Plugin
 * @subpackage sh-plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sh_Plugin
 * @subpackage sh-plugin/admin
 * @author     gj <kingzjoker@gmail.com>
 */
class Sh_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sh_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sh_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sh-plugin-admin.css', array(), $this->version, 'all' );
		
		wp_enqueue_style('wp-color-picker');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sh_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sh_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sh-plugin-admin.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( $this->plugin_name. '_color_picker', plugin_dir_url(__FILE__) . 'js/color-picker.js', array('wp-color-picker'), false, true);

	}

	public function sh_plugin_admin_filters(){
		add_filter('wp_colorpicker_settings', 'sh_plugin_wp_colorpicker_settings');
		function Sh_Plugin_wp_colorpicker_settings($settings){
		$settings['palettes'] = true;
		$settings['mode'] = 'hex';
		$settings['type'] = 'text';
		return $settings;
		}
	}

	public function sh_plugin_register_settings(){
		register_setting('sh_plugin_options_group','bg_container');
		register_setting('sh_plugin_options_group','bg_btn');
		register_setting('sh_plugin_options_group','bg_btn_hover');
		register_setting('sh_plugin_options_group','color_text_btn');
		register_setting('sh_plugin_options_group','color_text_msg');
		register_setting('sh_plugin_options_group','color_text_number');

	}

	public function sh_plugin_setting_page(){
		add_options_page('Sh Plugin', 'Sh Plugin Setting', 'manage_options', 'sh_plugin_options_group', array($this,'sh_plugin_html'));
	}

	public function sh_plugin_html(){
	?>
<div class="wrap">
    <h1>Sh Plugin Design Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('sh_plugin_options_group');
        do_settings_sections('sh_plugin_options_group');
      ?>
        <h3>Design Settings</h3>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="bg_container">สีตัวหนังสือ งวดวันที่'</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="bg_container" id="bg_container"
                    value="<?php echo get_option('bg_container'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="bg_btn">สีพื้นหลัง งวดวันที่</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="bg_btn" id="bg_btn"
                    value="<?php echo get_option('bg_btn'); ?>"></td>
            	</tr>
            <tr>
                <th scope="row"><label for="bg_btn_hover">สีตัวหนังสือ ปี วัน/เดือน</label></th>
				<td>
					<input type="color" class="wp-color-picker" name="bg_btn_hover" id="bg_btn_hover"
					value="<?php echo get_option('bg_btn_hover'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="color_text_btn">สีตัวอักษรในปุ่ม</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_btn" id="color_text_btn"
                    value="<?php echo get_option('color_text_btn'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="color_text_msg">สีพื้นหลังปุ่ม</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_msg" id="color_text_msg"
                    value="<?php echo get_option('color_text_msg'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="color_text_msg">สีพื้นหลังหัวข้อรางวัลที่</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_msg" id="color_text_msg"
                    value="<?php echo get_option('color_text_msg'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="color_text_msg">สีตัวอักษรรางวัลที่</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_msg" id="color_text_msg"
                    value="<?php echo get_option('color_text_msg'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="color_text_msg">สีตัวอักษรราคารางวัล</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_msg" id="color_text_msg"
                    value="<?php echo get_option('color_text_msg'); ?>">
				</td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
	}

}