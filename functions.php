<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FSE
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme_Name class.
 *
 * @class Main class of the plugin.
 */
final class Theme_Name {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Holds various class instances.
	 *
	 * @var array
	 */
	private $container = [];

	/**
	 * The single instance of the class.
	 *
	 * @var Theme_Name
	 */
	protected static $instance = null;

	/**
	 * Initialize.
	 */
	public function init() {
		register_sidebar(
			[
				'id'   => 'test-menu',
				'name' => __( 'Test menu widget', 'textdomain' ),
			]
		);
	}

	/**
	 * Retrieve main Theme_Name instance.
	 *
	 * Ensure only one instance is loaded or can be loaded.
	 *
	 * @see rank_math()
	 * @return Theme_Name
	 */
	public static function get() {
		if ( is_null( self::$instance ) && ! ( self::$instance instanceof Theme_Name ) ) {
			self::$instance = new Theme_Name();
			self::$instance->setup();
		}

		return self::$instance;
	}

	/**
	 * Instantiate the plugin.
	 */
	private function setup() {
		// Define plugin constants.
		$this->define_constants();

		// Include required files.
		$this->includes();

		// Instantiate classes.
		$this->instantiate();

		// Loaded action.
		do_action( 'theme_name/loaded' );
	}

	/**
	 * Define the plugin constants.
	 */
	private function define_constants() {
		define( 'THEME_NAME_VERSION', $this->version );
		define( 'THEME_NAME_FILE', __FILE__ );
		define( 'THEME_NAME_PATH', dirname( THEME_NAME_FILE ) . '/' );
		define( 'THEME_NAME_URL', get_template_directory_uri() . '/' );
	}

	/**
	 * Include the required files.
	 */
	private function includes() {
		include dirname( __FILE__ ) . '/vendor/autoload.php';
	}

	/**
	 * Instantiate classes.
	 */
	private function instantiate() {
		// Just init without storing it in the container.
		new Theme_Name\Frontend\Frontend();
		new Theme_Name\Admin\Admin_Init();

		// Initialize the action and filter hooks.
		$this->init_actions();
	}

	/**
	 * Initialize WordPress action and filter hooks.
	 */
	private function init_actions() {
		add_action( 'init', [ $this, 'init' ] );
	}
}

/**
 * Returns the main instance of Theme_Name to prevent the need to use globals.
 *
 * @return Theme_Name
 */
function theme_name() {
	return Theme_Name::get();
}

// Start it.
theme_name();
