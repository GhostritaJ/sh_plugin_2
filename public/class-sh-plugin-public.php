<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://-
 * @since      1.0.0
 *
 * @package    Sh_Plugin
 * @subpackage sh_plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sh_Plugin
 * @subpackage Sh_Plugin/public
 * @author     gj <jamfarmer@gmail.com>
 */
class Sh_Plugin_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sh-plugin-public.css?v='.rand(), array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
	
      	wp_enqueue_script( $this->plugin_name , plugin_dir_url( __FILE__ ) . 'js/jquery.cast.min.js?r='.rand(),array(),null, true );
		
	}

	public function sh_plugin_init(){
		add_shortcode( "showhouy1", array($this,'sshowhoy1') );		//for shower
		add_shortcode( "showhouy2", array($this,'sshowhoy2') );		//for checker
	}

	public function sshowhoy1($atts, $content = null ) {
  
		$a = shortcode_atts( array(
			'width' => '100%',
			'height' => '100%',
		), $atts );
		return '<iframe src="/wp-content/plugins/sh-plugin/show.php" width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';

	}

	public function css_shower() {
		?>
		<style>
			<?php   // .myDiv : color number won prize lotto
					// .myDivH : bg color number won prize lotto
					// .myBox : box for show date month selected
					// .btnsh : color button
					// .homesh : bg color title
					// .md-text : title size
					// .sm-text : small title size
			?>
			.myDivH {
				background: rgb(0,0,0);
				background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
				padding: 10px;
				font-family: 'Kanit', sans-serif;
				width: 100%;
				
			}

			.myDiv {
				/* border: 2px outset #3b3b3b; */
				background: #000000;
				color: white;
				padding-top: 6px;
				padding-bottom: 6px;
				font-family: 'Kanit', sans-serif;
			}

			.myBox {
				font-size: 24px;
				/* color: white; */
				color: <?php echo get_option('myBox_text_color'); ?>;
				background: rgb(0,0,0);
				background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(197,128,61,1) 50%, rgba(0,0,0,1) 100%);
				padding-top: 25px;
				padding-bottom: 25px;     
				font-family: 'Kanit', sans-serif;
			}

			.select_year{
				color: <?php echo get_option('select_date_color'); ?>;
				background: <?php echo get_option('select_date_bg'); ?>;
			}

			.select_date_month{
				color: <?php echo get_option('select_date_color'); ?>;
				background: <?php echo get_option('select_date_bg'); ?>;
			}

			.btnsh{
				/* color: white; */
				color: <?php echo get_option('btnsh_color'); ?>;
				background: rgb(0,0,0);
				background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);
				font-family: 'Kanit', sans-serif;
			}

			.homesh{
				/* background: rgb(224,224,224);
				background: linear-gradient(247deg, rgba(224,224,224,1) 5%, rgba(255,255,255,1) 31%, rgba(255,255,255,1) 69%, rgba(226,226,226,1) 99%); */
				/* background: #000000; */
				background: <?php echo get_option('bg_color_show'); ?>;
				font-family: 'Kanit', sans-serif;
			}

			.md-text{
				font-size: 14px;                    /* old: 18px */
				font-family: 'Kanit', sans-serif;
				height: 6px;
				/* color: blue!important; */
				color: <?php echo get_option('md_text'); ?>!important;
				
			}

			.sm-text{
				font-size: 10px;                    /* old: 12px */
				font-family: 'Kanit', sans-serif;
				/* color: #ffc894; */
				color: <?php echo get_option('sm_text'); ?>;
				height: 24px;
			}
			select{
				font-family: 'kanit', sans-serif !important;
			}
			thead{
				/*color: #ffc894;*/
			}
			td{
				border-top: 0px!important;
			}
			tr{
				
			}
			td.myDiv:hover {
				background-color: <?php echo get_option('td_myDiv_bg'); ?>!important; 					/* สีพื้นหลังเลขที่ถูกเม้าส์ชี้ */
				color: <?php echo get_option('td_myDiv'); ?>!important; 								/* สีตัวเลขที่ถูกเม้าส์ชี้ */
			}
			td.myDiv:not(:hover) {
				background-color: <?php echo get_option('td_myDiv_bg_not'); ?>!important; 				/* สีที่ไม่ได้ถูกเม้าส์ชี้ */
				color: <?php echo get_option('td_myDiv_text_not'); ?>!important; 						/* หรือสีอื่น ๆ ที่คุณต้องการให้เหมือนตัวอย่าง */
			}
			@media (max-width: 375px) {
				.xxx{
					display: none;
				}  
			}

			thead.head-date{
				/* color: #ffc894; */
				color: <?php echo get_option('head_date'); ?>;
			}
			
		</style>
		<?php
	}

	public function sshowhoy2($atts, $content = null ) {
  
		$a = shortcode_atts( array(
			'width' => '100%',
			'height' => '100%',
		), $atts );
		return '<iframe src="/wp-content/plugins/sh-plugin/checker.php" width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
	}

	public function css_checker() {
		?>
		<style>
			.div1 {
	
			display: block;
			/* margin: auto; */
			background: rgb(0,0,0);
			background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(197,128,61,1) 50%, rgba(0,0,0,1) 100%);
			/*background: <!--?php $div1_background_color; ?-->;*/
			width: 100%;
			color: <?php echo get_option('div1_text_color'); ?>;
			padding: 0px;
			padding-top: 25px;
			padding-bottom: 25px;    
			border-width: 20px;
			border-color: #80c0ec;
			transition: all 0.2s ease-in-out;
			border-radius: 0px;
			font-family: "Kanit", sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 40px;
			line-height: 18px;
			}
	
			@media (max-width: 767px) {
			.div1 {
			width: 100%;
			font-size: 24px;
			border-width: 10px;
			}
			}
	
			.div2 {
			text-align: center;
			padding: 50px 1px 1px 1px;
			/* color: #ffc894; */
			color: <?php echo get_option('div2_text_color'); ?>;
			font-family: "Kanit", sans-serif;
			font-size: 26px;
			width: 100%;
			height: 20px;
			margin: 0px auto;
			background: rgb(0,0,0);
			background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
			}
	
			@media (max-width: 767px) {
			.div2 {
			width: 100%;
			font-size: 16px;
			border-width: 10px;
			padding: 25px 1px 1px 1px;
			}
			}
	
			.select-list {
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
			/* เพิ่ม line นี้ */
			font-family: "Kanit", sans-serif;
			font-size: 20px;
			width: 70%;
			margin: 0 auto;
			margin-top: 35px;
	
			}
	
			@media (max-width: 479px) {
			form {
			width: 100%;
			font-size: 14px;
			flex-direction: column;
			align-items: center;
			margin-top: 24px;
	
			}
			}
	
			label {
			flex-basis: 100%;
			margin-bottom: 2px;
			}
	
			input[type="number"],
			select {
			width: 50%;
			padding: 7px;
			margin-right: 50px;
			box-sizing: border-box;
			border: 2px solid #7a4c20;
			border-radius: 70px;
			font-size: 22px;
			font-family: "Kanit", sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			color: #009ab9;
	
			}
	
			lottery {
			font-size: 24px;
			/* color: #7c7c7c; */
			color: <?php echo get_option('lottery'); ?>!important;
			font: weight 200px;
			display: flex;
			align-items: center;
			justify-content: center;
			margin-right: 25px;
	
			}
	
			@media (max-width: 767px) {
			lottery {
			width: 100%;
			font-size: 18px;
			border-width: 10px;
			margin-right: 0px;
			}
			}
	
			.lottery-forms {
			display: block;
			align-items: center;
			justify-content: center;
			margin-bottom: 20px;
			}
			.lotto_formss {
			display: block;
			background: #000000
			}
	
			.lotto_formss input{
			margin: auto 0;
			text-align: center;
			}
	
			.lottery-input {
			font-size: 24px;
			/* color: #422102; */
			color: <?php echo get_option('lottery-input'); ?>!important;
			font-weight: 200;
			margin:auto;
			width: 60%;
			height: 50px;
	
			}
	
			.lottery-input input[type="text"] {
			width: 100%;
			height: 90%;
			text-align: center;
			font-size: 24px;
			font-weight: bold;
			color: #FFFFFF;
			background: rgb(0,0,0);
			background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
			font-family: "Kanit", sans-serif;
			justify-content: center;
			align-items: center;
			border: 2px solid #422102;
			border-radius: 80px;
			letter-spacing: 10px;
			}
	
			input::placeholder {
			/* color: #d1d1d1; */
			color: <?php echo get_option('lottery_input'); ?>!important;
			letter-spacing: 0px;
			}
	
			@media only screen and (max-width: 600px) {
			input::placeholder {
			font-size: 18px;
			}
			}
	
	
	
	
			#lottery-input:valid {
			background-color: #c5803d;
			color: <?php echo get_option('lottery_input'); ?>!important;
	
			}
	
			.lottery-input input[type="text"]:focus {
			outline: none;
			border: 2px solid #c5803d;				/* สีขอบตอนกดที่ text-input */
			box-shadow: 0 0 10px #c5803d;
			}
	
	
	
	
	
			.flex-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			margin: 50px 1px 40px 1px;
			}
	
			.month-select {
			/* width: 100px;
			margin-right: -10px;
			flex: 0 0 auto;
			font-size: 16px;
			color: #7c7c7c; */
			width: 150px;
			flex: 0 0 auto;
			font-size: 16px;
			/* color: #7c7c7c; */
			color: <?php echo get_option('month_year_select_color'); ?>;
			/* background-color: #000000; */
			background-color: <?php echo get_option('month_year_select_bg'); ?>;
			}
	
			@media (max-width: 767px) {
			.month-select {
			width: 57%;
			font-size: 16px;
			padding: 0;
			margin-left: -25px;
			padding: 7px;
			}
			}
	
			.label-year {
			width: 100px;
			margin-right: 10px;
			font-size: 20px;
			font-family: "Kanit", sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			color: #7c7c7c;
			flex: 0 0 auto;
			}
	
			@media (max-width: 767px) {
			.label-year {
			width: 20%;
			font-size: 16px;
			padding: 0;
			margin-left: 30px;
	
	
			}
			}
	
	
			.label-month {
			width: 100px;
			margin-right: 10px;
			font-size: 20px;
			font-family: "Kanit", sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			color: #7c7c7c;
			flex: 0 0 auto;
			}
	
			@media (max-width: 767px) {
			.label-month {
			width: 35%;
			font-size: 16px;
			padding: 0;
			margin: 10px;
			}
			}
	
			.year-select {
			width: 100px;
			flex: 0 0 auto;
			font-size: 16px;
			/* color: #7c7c7c; */
			color: <?php echo get_option('month_year_select_color'); ?>;
			/* background-color: #000000; */
			background-color: <?php echo get_option('month_year_select_bg'); ?>;
			/*background-color: #000000;*/
			}
	
			@media only screen and (max-width: 600px) {
			.year-select {
			width: 55%;
			font-size: 16px;
			padding: 7px;
			margin: 0;
	
			}
			}
	
	
			button {
			background: rgb(0,0,0);
			background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);
			/* box-shadow: 0 0 10px #9f9f9f; */
			align-items: center;
			/* color: #fff; */
			color: <?php echo get_option('button_text'); ?>;
			font-size: 28px;
			padding: 5px 70px;
			margin-bottom: 40;
			border-radius: 0px;
			font-family: "Kanit", sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			/* border-width: 4px;
			border-color: #80c0ec; */
			transition: all 0.2s ease-in-out;
			/* text-shadow: 2px 1px 8px #044263 */
			border: 0px solid black!important;
			}
	
			@media screen and (max-width: 768px) {
			button {
			font-size: 20px;
			padding: 5px 50px;
			}
	
			button:focus {
			background: rgb(187, 255, 253);
			background: linear-gradient(297deg, rgba(187, 255, 253, 1) 11%, rgba(41, 132, 180, 1) 31%, rgba(0, 95, 181, 1) 64%, rgba(46, 184, 200, 1) 100%);
			color: #ffffff;
			box-shadow: 0 0 30px #ebd58b;
			transform: scale(0.9);
			}
	
			button:hover {                                  /* สีเมื่อเมาส์ชี้ (hover) ไปที่ปุ่ม */
			background-color: #2980b9;
			}
	
			button:active {                                 /* สีเมื่อปุ่มถูกกด (active) */
			background: rgb(174,136,84);
			background: linear-gradient(45deg, rgba(174,136,84,1) 0%, rgba(235,213,139,1) 51%, rgba(142,82,10,1) 100%);
			}
	
			body {
			background-color: rgb(201, 201, 201);
			background: linear-gradient(90deg, rgba(201, 201, 201, 1) 0%, rgba(255, 255, 255, 1) 19%, rgba(255, 255, 255, 1) 49%, rgba(255, 255, 255, 1) 80%, rgba(201, 201, 201, 1) 100%);
			font-family: "Kanit", sans-serif;
			background: #ffffff;
			color: #34495e;
			}
			}
	
	
	
			@media (min-width: 200rem) {
			.column {
			float: left;
			padding-left: 1rem;
			padding-right: 1rem;
			}
	
			.column.full { width: 100%; }
			.column.two-thirds { width: 66.7%; }
			.column.half { width: 50%; }
			.column.third { width: 33.3%; }
			.column.fourth { width: 25%; }
			.column.flow-opposite { float: right; }  
			}
	
			.flex-item {
			display: flex;
			flex-direction: row;
			align-items: center;
			width: 50%;  /* Adjust as needed */
			margin: 10px 0;
			}
	
			.label-year, .label-month {
			margin-right: 20px;
			}
	
			@media (max-width: 600px) {
			.flex-item {
			width: 100%;  /* Stack items vertically on small screens */
			}
			}
	
			.swal2-header{
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 0 1em !important;
			font-family: "Kanit", sans-serif !important;
			}
	
			@media (max-width: 600px) {
			.swal2-header{
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 0 0.1em !important;
			}
	
			.swal2-content{
			font-size: 18px !important;
			padding: 0 0.1em !important;
			/*color: yellow !important;*/
			font-family: "Kanit", sans-serif !important;
			}
	
			.swal2-title{
			font-size: 22px !important;
			font-family: "Kanit", sans-serif !important;
			}
	
			.swal2-popup{
			width: 90% !important;
			}
			}
	
			pre{
			font-family: "Kanit", sans-serif !important;
			}
	
			body{
			/* background: #000000; */
			background: <?php echo get_option('bg_color_checker'); ?>;
			
			}
	
			div.flex-container{
			background: rgb(0,0,0);
			background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
			}
		</style>
		<?php
	}
}
