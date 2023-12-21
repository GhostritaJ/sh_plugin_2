<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://-
 * @since      1.0.0
 *
 * @package    Sh_Plugin
 * @subpackage sh-plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Sh_Plugin
 * @subpackage sh-plugin/includes
 * @author     gj <kingzjoker@gmail.com>
 */
class Sub_menu {

  function __construct(){
    add_action('admin_menu',array($this,'register_sub_menu'));
    add_action('admin_menu',array($this,'wpdocs_register_my_custom_menu_page'));

    if ( defined( 'SH_PLUGIN_VERSION' ) ) {
			$this->version = SH_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'sh-plugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();		// html admin
		$this->define_public_hooks();
  }

	function register_sub_menu() {
		add_submenu_page( 
			'options-general.php', 'Sh Plugin Design', 'Sh Plugin Design', 'manage_options', 'submenu-page', array(&$this, 'submenu_page_callback')
		);
	}

	function submenu_page_callback() {
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
                <th scope="row"><label for="bg_container">สีพื้นหลัง กรอบวงล้อ</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="bg_container" id="bg_container"
                    value="<?php echo get_option('bg_container'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row"><label for="bg_btn">สีปุ่มเสี่ยงทาย</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="bg_btn" id="bg_btn"
                    value="<?php echo get_option('bg_btn'); ?>"></td>
            	</tr>
            <tr>
                <th scope="row"><label for="bg_btn_hover">สีปุ่มเสี่ยงทาย (HOVER)</label></th>
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
                <th scope="row"><label for="color_text_msg">สีตัวอักษร "เลขนำโชคของท่าน"</label></th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_msg" id="color_text_msg"
                    value="<?php echo get_option('color_text_msg'); ?>">
				</td>
            </tr>
            <tr>
                <th scope="row">
					<label for="color_text_number">สีตัวอักษรเลขนำโชค</label>
				</th>
                <td>
					<input type="color" class="wp-color-picker" name="color_text_number" id="color_text_number"
                    value="<?php echo get_option('color_text_number'); ?>">
				</td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
	}

  /* function add_menu(){
    add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callback, $icon_url:string,
    $position:integer|null )
  } */

  function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
      __( 'Custom Menu Title', 'textdomain' ),
      'custom menu',
      'manage_options',
      'myplugin/myplugin-admin.php',
      '',
      plugins_url( 'myplugin/images/icon.png' ),
      6
    );
  }

  private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-sh-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-sh-plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-sh-plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-sh-plugin-public.php';

		$this->loader = new Sh_Plugin_Loader();

	}

  private function set_locale() {

		$plugin_i18n = new Sh_Plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

  private function define_admin_hooks() {

		$plugin_admin = new Sh_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_init',$plugin_admin,'sh_plugin_admin_filters');
		$this->loader->add_action( 'admin_init',$plugin_admin,'sh_plugin_register_settings');
		$this->loader->add_action( 'admin_menu',$plugin_admin,'sh_plugin_setting_page');
		

	}

  public function get_plugin_name() {
		return $this->plugin_name;
	}

  public function get_version() {
		return $this->version;
	}

  private function define_public_hooks() {

		$plugin_public = new Sh_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		$this->loader->add_action('init',$plugin_public,'sh_plugin_init');

	}
}