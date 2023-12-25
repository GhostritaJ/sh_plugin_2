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
		//for checker
		register_setting('sh_plugin_options_group','div1_text_color');
		register_setting('sh_plugin_options_group','div2_text_color');
		register_setting('sh_plugin_options_group','month_year_select_bg');
		register_setting('sh_plugin_options_group','month_year_select_color');
		register_setting('sh_plugin_options_group','label_text_color');
		register_setting('sh_plugin_options_group','lottery');
		register_setting('sh_plugin_options_group','lottery_input');
		register_setting('sh_plugin_options_group','button_text');
		register_setting('sh_plugin_options_group','button_background');

		//for shower
		register_setting('sh_plugin_options_group','myBox_text_color');
		register_setting('sh_plugin_options_group','head_date');
		register_setting('sh_plugin_options_group','btnsh_color');
		register_setting('sh_plugin_options_group','md_text');
		register_setting('sh_plugin_options_group','sm_text');
		register_setting('sh_plugin_options_group','td_myDiv_text');
		register_setting('sh_plugin_options_group','td_myDiv_text_not');
		register_setting('sh_plugin_options_group','td_myDiv_bg');
		register_setting('sh_plugin_options_group','td_myDiv_bg_not');
	}

	public function sh_plugin_setting_page(){
		add_options_page('Sh Plugin', 'Sh Plugin Setting', 'manage_options', 'sh_plugin_options_group', array($this,'sh_plugin_checker_html'));
	}

	public function sh_plugin_checker_html(){
	?>
<div class="wrap">
    <h1>Sh Plugin Design Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('sh_plugin_options_group');
        do_settings_sections('sh_plugin_options_group');
      ?>
        <h3><b>Design Settings Checker</b></h3>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="div1_text_color">สีตัวอักษร ตรวจผลสลากกินแบ่งรัฐบาล'</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="div1_text_color" id="div1_text_color"
                    value="<?php echo get_option('div1_text_color'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="div2_text_color">สีตัวอักษร ตรวจผลรางวัล จากหมายเลขสลากงวดประจำวันที่</label></th>
				<td>
					<input type="color" class="wp-color-picker" name="div2_text_color" id="div2_text_color"
					value="<?php echo get_option('div2_text_color'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="month_year_select_bg">สีพื้นหลัง ช่องโปรดเลือก พ.ศ./วัน-เดือน</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="month_year_select_bg" id="month_year_select_bg"
                    value="<?php echo get_option('month_year_select_bg'); ?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="month_year_select_color">สีตัวอักษร ช่องโปรดเลือก พ.ศ./วัน-เดือน</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="month_year_select_color" id="month_year_select_color"
                    value="<?php echo get_option('month_year_select_color'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="label_text_color">สีตัวอักษร พ.ศ./วัน-เดือน</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="label_text_color" id="label_text_color"
                    value="<?php echo get_option('label_text_color'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="lottery">สีตัวอักษร เลขสลาก 1,2,3</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="lottery" id="lottery"
                    value="<?php echo get_option('lottery'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="lottery_input">สีตัวอักษร กรอกเลขสลาก6หลัก</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="lottery_input" id="lottery_input"
                    value="<?php echo get_option('lottery_input'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="button_text">สีตัวอักษร ในปุ่ม</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="button_text" id="button_text"
                    value="<?php echo get_option('button_text'); ?>">
				</td>
            </tr>
        </table>
		<br>
		<h3><b>Design Settings Shower</b></h3>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="myBox_text_color">สีตัวอักษร งวด วันเดือนปี'</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="myBox_text_color" id="myBox_text_color"
                    value="<?php echo get_option('myBox_text_color'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="head_date">สีตัวอักษร หัวข้อ ปี-วัน/เดือน</label></th>
				<td>
					<input type="color" class="wp-color-picker" name="head_date" id="head_date"
					value="<?php echo get_option('head_date'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="btnsh_color">สีตัวอักษร ในปุ่ม</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="btnsh_color" id="btnsh_color"
                    value="<?php echo get_option('btnsh_color'); ?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="md_text">สีตัวอักษร หัวข้อ รางวัลต่างๆ</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="md_text" id="md_text"
                    value="<?php echo get_option('md_text'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="sm_text">สีตัวอักษร จำนวนและราคารางวัล</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="sm_text" id="sm_text"
                    value="<?php echo get_option('sm_text'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="td_myDiv_text">สีตัวอักษร เลขสลากที่ถูกรางวัล ที่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_text" id="td_myDiv_text"
                    value="<?php echo get_option('td_myDiv_text'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="td_myDiv_text_not">สีตัวอักษร เลขสลากที่ถูกรางวัล ที่ไม่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_text_not" id="td_myDiv_text_not"
                    value="<?php echo get_option('td_myDiv_text_not'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="td_myDiv_bg">สีพื้นหลัง เลขสลากที่ถูกรางวัล ที่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_bg" id="td_myDiv_bg"
                    value="<?php echo get_option('td_myDiv_bg'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="td_myDiv_bg_not">สีพื้นหลัง เลขสลากที่ถูกรางวัล ที่ไม่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_bg_not" id="td_myDiv_bg_not"
                    value="<?php echo get_option('td_myDiv_bg_not'); ?>">
				</td>
            </tr>
			
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
	}

}