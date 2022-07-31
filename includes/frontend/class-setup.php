<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Theme_Name
 * @subpackage Theme_Name\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Theme_Name\Frontend;

use Theme_Name\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Assets class.
 *
 * @codeCoverageIgnore
 */
class Setup {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function hooks() {
		$this->action( 'after_setup_theme', 'after_setup_theme' );
	}

	/**
	 * After setup theme.
	 */
	public function after_setup_theme() {
		add_theme_support( 'wp-block-styles' );

		require_once( THEME_NAME_PATH . '/vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();

		new \Theme_Name\Blocks\Blocks();
		new \Theme_Name\Shortcodes();
	}
}
