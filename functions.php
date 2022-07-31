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
 * Academy class.
 *
 * @class Main class of the plugin.
 */
final class Academy {

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
	 * @var Academy
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
	 * Retrieve main Academy instance.
	 *
	 * Ensure only one instance is loaded or can be loaded.
	 *
	 * @see rank_math()
	 * @return Academy
	 */
	public static function get() {
		if ( is_null( self::$instance ) && ! ( self::$instance instanceof Academy ) ) {
			self::$instance = new Academy();
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
		do_action( 'academy/loaded' );
	}

	/**
	 * Define the plugin constants.
	 */
	private function define_constants() {
		define( 'ACADEMY_VERSION', $this->version );
		define( 'ACADEMY_FILE', __FILE__ );
		define( 'ACADEMY_PATH', dirname( ACADEMY_FILE ) . '/' );
		define( 'ACADEMY_URL', get_template_directory_uri() . '/' );
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
		new Academy\Frontend\Frontend();
		new Academy\Admin\Admin_Init();

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
 * Returns the main instance of Academy to prevent the need to use globals.
 *
 * @return Academy
 */
function academy() {
	return Academy::get();
}

// Start it.
academy();
