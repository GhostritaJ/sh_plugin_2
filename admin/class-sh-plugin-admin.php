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
		register_setting('sh_plugin_options_group','bg_color_checker');
		register_setting('sh_plugin_options_group','div1_text_color');
		register_setting('sh_plugin_options_group','div1_bg');
		register_setting('sh_plugin_options_group','div2_text_color');
		register_setting('sh_plugin_options_group','month_year_select_bg');
		register_setting('sh_plugin_options_group','month_year_select_color');
		register_setting('sh_plugin_options_group','month_year_bg');
		register_setting('sh_plugin_options_group','label_text_color');
		register_setting('sh_plugin_options_group','lottery');
		register_setting('sh_plugin_options_group','lottery_input');
		register_setting('sh_plugin_options_group','lottery_input_bg');
		
		register_setting('sh_plugin_options_group','button_text');
		register_setting('sh_plugin_options_group','button_checker_radius');
		register_setting('sh_plugin_options_group','button_checker_bg');
		register_setting('sh_plugin_options_group','button_checker_bg_point');
		register_setting('sh_plugin_options_group','button_checker_bg_active');
		
		//for shower
		register_setting('sh_plugin_options_group','bg_color_show');
		register_setting('sh_plugin_options_group','myBox_text_color');
		register_setting('sh_plugin_options_group','myBox_bg');
		register_setting('sh_plugin_options_group','select_date_color');
		//register_setting('sh_plugin_options_group','select_date_bg');
		register_setting('sh_plugin_options_group','head_date');
		register_setting('sh_plugin_options_group','btnsh_color');
		register_setting('sh_plugin_options_group','btnsh_bg');
		register_setting('sh_plugin_options_group','md_text');
		register_setting('sh_plugin_options_group','sm_text');
		register_setting('sh_plugin_options_group','myDivH_bg');
		
		//register_setting('sh_plugin_options_group','td_myDiv_text');
		register_setting('sh_plugin_options_group','td_myDiv_text_not');
		//register_setting('sh_plugin_options_group','td_myDiv_text_not2');
		//register_setting('sh_plugin_options_group','td_myDiv_bg');
		register_setting('sh_plugin_options_group','td_myDiv_bg_not');
		//register_setting('sh_plugin_options_group','td_myDiv_bg_not2');
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
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<style>
        #gradient-container {
            width: 300px;
            height: 50px;
            border-radius: 5px;
        }
    	</style>
		<script>
			$(document).ready(function () {
				var gradientContainer = $('#gradient-container');
				var gradientSlider = $('#gradient-slider');

				gradientSlider.on('input', function () {
					var gradientValue = 'linear-gradient(to right, hsl(' + $(this).val() + ', 100%, 50%) 0%, hsl(' + ($(this).val() + 30) + ', 100%, 50%) 100%)';
					gradientContainer.css('background', gradientValue);
					// นำค่าสีมากำหนดให้กับ input
					$('#bg_container').val(gradientValue);
				});
			});
		</script>
		<h3><b>Design Settings Checker</b></h3><br>
        <h3><b>เอกสารแนะนำการใช้งานส่วน Checker<br>
			1. การเพิ่ม shortcode <br>
			- เพื่อเพิ่มส่วน checker(เลขที่ถูกรางวัล) ให้เพิ่ม [showhouy2 height="800"]<br>
			- เลข 800 สามารถเปลี่ยนเป็นเลขอื่นได้ เพื่อกำหนดความสูง<br>
			2. ช่องว่างที่เอาไว้ใส่ข้อความ มีไว้เพิ่ม css จะเพิ่มแบบธรรมดาหรือแบบ Gradient ก็ได้ เช่น<br>
			- background: white; หรือ background: #000000; หรือ<br>
			background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);
		</b></h3>
        <table class="form-table">
			<tr>
                <th scope="row"><label for="bg_color_checker">สีพื้นหลัง<br>สีพื้นหลังของ iframe</label></th>
                <td>
					<input type="textbox" name="bg_color_checker" id="bg_color_checker" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('bg_color_checker', '#000000'); ?>">
				</td>
            </tr>
			<tr>
				
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/checker01.png">
				</td>
			</tr>
            <tr>
                <th scope="row"><label for="div1_text_color">สีตัวอักษร ตรวจผลสลากกินแบ่งรัฐบาล</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="div1_text_color" id="div1_text_color"
                    value="<?php echo get_option('div1_text_color', '#FFFFFF'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="div1_bg">สีพื้นหลัง ตรวจผลสลากกินแบ่งรัฐบาล</label></th>
				<td>
					<input type="textbox" name="div1_bg" id="div1_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('div1_bg', 'background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(197,128,61,1) 50%, rgba(0,0,0,1) 100%);'); ?>">
				</td>
            </tr>
			<tr>
				
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/checker02.png">
				</td>
			</tr>
            <tr>
                <th scope="row"><label for="div2_text_color">สีตัวอักษร ตรวจผลรางวัล จากหมายเลขสลากงวดประจำวันที่</label></th>
				<td>
					<input type="color" class="wp-color-picker" name="div2_text_color" id="div2_text_color"
					value="<?php echo get_option('div2_text_color', '#ffc894'); ?>">
				</td>
            </tr>
			<!--tr>
                <th scope="row"><label for="div2_bg">สีพื้นหลัง ตรวจผลสลากกินแบ่งรัฐบาล</label></th>
				<td>
					<input type="textbox" name="div2_bg" id="div2_bg" style="width: 800px; height: 50px;"
                    value="<!--?php echo get_option('div2_bg'); ?>">
				</td>
            </tr-->
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/checker03.png"></td>
			</tr>
			<tr>
                <th scope="row"><label for="month_year_select_color">สีตัวอักษร ช่องโปรดเลือก พ.ศ./วัน-เดือน</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="month_year_select_color" id="month_year_select_color"
                    value="<?php echo get_option('month_year_select_color', '#7c7c7c'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="month_year_select_bg">สีพื้นหลัง ช่องโปรดเลือก พ.ศ./วัน-เดือน</label></th>
				<td>
					<input type="textbox" name="month_year_select_bg" id="month_year_select_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('month_year_select_bg', '#000000'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="label_text_color">สีตัวอักษร พ.ศ./วัน-เดือน</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="label_text_color" id="label_text_color"
                    value="<?php echo get_option('label_text_color', '#7c7c7c'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="month_year_bg">สีพื้นหลัง พ.ศ./วัน-เดือน</label></th>
				<td>
					<input type="textbox" name="month_year_bg" id="month_year_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('month_year_bg', 'background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);'); ?>">
				</td>
            </tr>
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/checker04.png">
				</td>
			</tr>
			<tr>
                <th scope="row"><label for="lottery">สีตัวอักษร เลขสลาก 1,2,3</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="lottery" id="lottery"
                    value="<?php echo get_option('lottery', '#7c7c7c'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="lottery_input">สีตัวอักษร กรอกเลขสลาก6หลัก</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="lottery_input" id="lottery_input"
                    value="<?php echo get_option('lottery_input', '#FFFFFF'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="lottery_input_bg">สีพื้นหลัง กรอกเลขสลาก6หลัก</label></th>
				<td>
					<input type="textbox" name="lottery_input_bg" id="lottery_input_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('lottery_input_bg', 'background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);'); ?>">
				</td>
			</tr>
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/checker05.png">
				</td>
			</tr>
			<tr>
                <th scope="row"><label for="button_text">สีตัวอักษร ในปุ่ม</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="button_text" id="button_text"
                    value="<?php echo get_option('button_text', '#FFFFFF'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row">
					<label for="button_checker_radius">เรเดียส ขอบมน ของปุ่ม</label>
					<br>(กรอกเฉพาะตัวเลขและหน่วย เช่น 100px)
				</th>
                <td>
					<input type="textbox" name="button_checker_radius" id="button_checker_radius" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('button_checker_radius', '100px'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="button_checker_bg">สีพื้นหลัง ในปุ่ม</label></th>
                <td>
					<input type="textbox" name="button_checker_bg" id="button_checker_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('button_checker_bg', 'background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="button_checker_bg_point">สีพื้นหลัง ในปุ่ม ตอนชี้</label></th>
                <td>
					<input type="textbox" name="button_checker_bg_point" id="button_checker_bg_point" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('button_checker_bg_point', 'background: rgb(187, 255, 253); 			background: linear-gradient(297deg, rgba(187, 255, 253, 1) 11%, rgba(41, 132, 180, 1) 31%, rgba(0, 95, 181, 1) 64%, rgba(46, 184, 200, 1) 100%);'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="button_checker_bg_active">สีพื้นหลัง ในปุ่ม ตอนกด</label></th>
                <td>
					<input type="textbox" name="button_checker_bg_active" id="button_checker_bg_active" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('button_checker_bg_active', 'background: rgb(187, 255, 253); 			background: linear-gradient(297deg, rgba(187, 255, 253, 1) 11%, rgba(41, 132, 180, 1) 31%, rgba(0, 95, 181, 1) 64%, rgba(46, 184, 200, 1) 100%);'); ?>">
				</td>
            </tr>
			
        </table>
		<br>
		<h3>--------------------------------------------------------------------------------------------------------------------------------------------</h3>
		<h3><b>Design Settings Shower</b></h3><br>
		<h3><b>เอกสารแนะนำการใช้งานส่วน Shower<br>
			1. การเพิ่ม shortcode <br>
			- เพื่อเพิ่มส่วน show(เลขที่ถูกรางวัล) ให้เพิ่ม [showhouy1 height="800"]<br>
			- เลข 800 สามารถเปลี่ยนเป็นเลขอื่นได้ เพื่อกำหนดความสูง<br>
			2. ช่องว่างที่เอาไว้ใส่ข้อความ มีไว้เพิ่ม css จะเพิ่มแบบธรรมดาหรือแบบ Gradient ก็ได้ เช่น<br>
			- background: white; หรือ background: #000000; หรือ<br>
			background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);
			</b>
	
		</h3>
        <table class="form-table">
			<tr>
                <th scope="row"><label for="bg_color_show">สีพื้นหลัง'</label></th>
                <td>
					<input type="textbox" name="bg_color_show" id="bg_color_show" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('bg_color_show', '#000000'); ?>">
				</td>
            </tr>
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/show01.png">
				</td>
			</tr>
            <tr>
                <th scope="row"><label for="myBox_text_color">สีตัวอักษร งวด วันเดือนปี'</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="myBox_text_color" id="myBox_text_color"
                    value="<?php echo get_option('myBox_text_color', '#FFFFFF'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="myBox_bg">สีพื้นหลัง งวด วันเดือนปี'</label></th>
                <td>
					<input type="textbox" name="myBox_bg" id="myBox_bg"  style="width: 800px; height: 50px;"
                    value="<?php echo get_option('myBox_bg', 'background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(197,128,61,1) 50%, rgba(0,0,0,1) 100%);'); ?>">
				</td>
            </tr>
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/show02.png">
				</td>
			</tr>
			<tr>
                <th scope="row"><label for="head_date">สีตัวอักษร หัวข้อ ปี-วัน/เดือน</label></th>
				<td>
					<input type="color" class="wp-color-picker" name="head_date" id="head_date"
					value="<?php echo get_option('head_date', '#ffc894'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="select_date_color">สีตัวอักษร ตัวเลือก ปี-วัน/เดือน</label></th>
				<td>
					<input type="color" class="wp-color-picker" name="select_date_color" id="select_date_color"
					value="<?php echo get_option('select_date_color', '#000000'); ?>">
				</td>
            </tr>
			<!--tr>
                <th scope="row"><label for="select_date_bg">สีพื้นหลัง ตัวเลือก ปี-วัน/เดือน</label></th>
				<td>
					<input type="textbox" name="select_date_bg" id="select_date_bg" style="width: 800px; height: 50px;"
					value="<!-- ?php echo get_option('select_date_bg'); ?>">
				</td>
            </tr-->
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/show03.png">
				</td>
			</tr>
			<tr>
                <th scope="row"><label for="btnsh_color">สีตัวอักษร ในปุ่ม</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="btnsh_color" id="btnsh_color"
                    value="<?php echo get_option('btnsh_color', '#FFFFFF'); ?>"></td>
            </tr>
			<tr>
                <th scope="row"><label for="btnsh_bg">สีพื้นหลัง ปุ่ม</label></th>
                <td>
					<input type="textbox" name="btnsh_bg" id="btnsh_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('btnsh_bg', 'background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);'); ?>"></td>
            </tr>
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/show04.png">
				</td>
			</tr>
            <tr>
                <th scope="row"><label for="md_text">สีตัวอักษร หัวข้อ รางวัลต่างๆ</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="md_text" id="md_text"
                    value="<?php echo get_option('md_text', '#FFFFFF'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="sm_text">สีตัวอักษร จำนวนและราคารางวัล</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="sm_text" id="sm_text"
                    value="<?php echo get_option('sm_text', '#ffc894'); ?>">
				</td>
            </tr>
			<tr>
                <th scope="row"><label for="myDivH_bg">สีพื้นหลัง รางวัลที่ ...</label></th>
                <td>
					<input type="textbox" name="myDivH_bg" id="myDivH_bg" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('myDivH_bg', 'background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);'); ?>">
				</td>
            </tr>
			<tr>
				<th><h3>---------------------------</h3></th>
				<td><h3>--------------------------------------------------------------------------------------------------------------</h3>
					<img src="/wp-content/plugins/sh-plugin/img/show05.png">
				</td>
			</tr>
			<!--tr>
                <th scope="row"><label for="td_myDiv_text">สีตัวอักษร เลขสลากที่ถูกรางวัล ที่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_text" id="td_myDiv_text"
                    value="<!-- ?php echo get_option('td_myDiv_text'); ?>">
				</td>
            </tr-->
			<tr>
                <th scope="row"><label for="td_myDiv_text_not">สีตัวอักษร เลขสลากที่ถูกรางวัล</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_text_not" id="td_myDiv_text_not"
                    value="<?php echo get_option('td_myDiv_text_not'); ?>">
				</td>
            </tr>
			<!--tr>
                <th scope="row"><label for="td_myDiv_text_not2">สีตัวอักษร เลขสลากอื่นในแถวที่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="td_myDiv_text_not2" id="td_myDiv_text_not2"
                    value="<!--?php echo get_option('td_myDiv_text_not2'); ?>">
				</td>
            </tr-->
			<!--tr>
                <th scope="row"><label for="td_myDiv_bg">สีพื้นหลัง เลขสลากที่ถูกรางวัล ที่ถูกเม้าส์ชี้</label></th>
                <td>
					<input type="textbox" name="td_myDiv_bg" id="td_myDiv_bg" style="width: 800px; height: 50px;"
                    value="<!-- ?php echo get_option('td_myDiv_bg'); ?>">
				</td>
            </tr-->
			<tr>
                <th scope="row"><label for="td_myDiv_bg_not">สีพื้นหลัง เลขสลากที่ถูกรางวัล</label></th>
				<td>
					<input type="textbox" name="td_myDiv_bg_not" id="td_myDiv_bg_not" style="width: 800px; height: 50px;"
                    value="<?php echo get_option('td_myDiv_bg_not'); ?>">
				</td>
            </tr>
			<!--tr>
                <th scope="row"><label for="td_myDiv_bg_not2">สีพื้นหลัง เลขสลากอื่นในแถวที่ถูกเม้าส์ชี้</label></th>
				<td>
					<input type="textbox" name="td_myDiv_bg_not2" id="td_myDiv_bg_not2" style="width: 800px; height: 50px;"
                    value="<!--?php echo get_option('td_myDiv_bg_not2'); ?>">
				</td>
            </tr-->

        </table>
		
        <?php submit_button(); ?>
    </form>
</div>
<?php
	}

}